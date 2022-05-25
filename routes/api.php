<?php

use App\Helpers\MyTokenManager;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Mail\CloudHostingProduct;
use App\Mail\DoctortContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test',function(){
    return [
        'msg' => 'congratulation 🎉🎈, successful get request',
    ];
});


// handle register POST request             [tested]
Route::post('/register',function(Request $request){

    // get request body
    $patient_first_name = $request->patient_first_name;
    $patinet_last_name = $request->patient_last_name;
    $patinet_age = $request->patient_age;
    $patinet_address = $request->patinet_address;
    $patient_phone = $request->patient_phone;
    $patient_email = $request->patient_email;
    $patient_date_of_birth = $request->patient_date_of_birth;
    $patient_SSN = $request->patient_SSN;
    $patient_password = $request->patient_password;

    // check if SSN or email exist
    $query = DB::select('select pat_id from patient where pat_SSN = ? or pat_email = ?',
    [$patient_SSN,$patient_email]);

    if($query){
        return [
            'msg' => 'this email or social security number is already registered before'
        ];
    }

    $result = DB::insert('insert into patient (pat_fname,pat_lname,pat_age,pat_address,pat_phone,pat_email,pat_DOF,pat_SSN,patient_password)
    VALUES (?,?,?,?,?,?,?,?,?)',[
        $patient_first_name,$patinet_last_name,$patinet_age,$patinet_address, $patient_phone, $patient_email,
        $patient_date_of_birth, $patient_SSN, $patient_password
    ]);

    if($result){
        return response([
            'msg' => 'successful registeration'
        ],200);
    }
    else {
        return response([
            'msg' => 'error, unsuccessful registeration'
        ],424);
    }
});


// handle login process                     [tested and documented]
Route::post('/login',function(Request $request){

    // receive email and password from user
    $email = $request->email;
    $password = $request->password;

    // search for patient in DB
    $result = DB::select('select * from patient where pat_email = ? and patient_password = ?',
    [$email,$password]);

    // if patient exist [correct email and password ]
    if($result){
        // because the result is a list of only one element, we store that element in patient variable
        $patient = $result[0];

        // create new token for patient
        $token = MyTokenManager::createPatientToken($patient->pat_id);



        // return token like  [3|dkjfbvjfkbvdfkjbv89yrhfb]
        return [
            'msg' => 'logged In successfully',
            'token' => $token,
        ];
    }
    // if patient does not exist [0 rows returned]
    else{
        return [
            'error'=> 'wrong email or password'
        ];
    }

});

Route::group(['middleware'=>'MyAuthAPI'],function(){

    // get profile function
    Route::get('/profile',function(Request $request){
        // get $patient data from DB
        $patient = MyTokenManager::currentPatient($request);
        return [
            'patient' => $patient
        ];
    });

    // get profile data
    Route::get('/logout',function(Request $request){
        MyTokenManager::removePatientToken($request);
        return [
            'message' => 'logged out successfully'
        ];
    });

    // get available tests                  [tested and documented]
    Route::get('/available-tests',function(){

        // get all tests from tests table in DB
        $result = DB::select('select * from test');

        // declare $data array
        $data = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ( $result as $childCat ) {
            $data[] =
            [
                'test_id' =>  $childCat->test_id,
                'test-name' =>  $childCat->test_name,
            ];
        }

        // retrieve json object
        // return response()->json([ $data ]);


        // retrieve json object -> $data in not in [] because it is already an array
        return response($data,200);
    });

    // post test-reservation                [tested and documented]
    Route::post('/test-reservation',function(Request $request){

        // get data from request body
        $test_name = $request->test_name;
        $test_date = $request->test_date;
        $test_time = $request->test_time;
        $test_patient_health_name = $request->test_patient_health_name;

        // search for test_id
        $test_id_array = DB::select('select test_id from test where test_name = ?',[$test_name]);
        // search for healthcare_id
        $test_patient_health_id_array = DB::select('select hc_id from healthcare_center where hc_name = ?',
        [$test_patient_health_name]);

        // get patient data from autherization header
        $patient = MyTokenManager::currentPatient($request);

        // get test_id and hc_id from arrays retrieved from DB
        $test_id = (int)$test_id_array[0]->test_id;
        $test_patient_health_id = (int)$test_patient_health_id_array[0]->hc_id;

        // insert into DB
        $result = DB::insert("insert into test_patient values (?,?,?,?,?)",
        [$patient->pat_id,$test_id,$test_date,$test_time,$test_patient_health_id]);

        // if successfully inserted
        if($result){
            return response([
                'msg' => 'successful test reservation'
            ], 200);
        }
        else {
            return response([
                'msg' => 'failed test reservation'
                ]);
        }
    });

    // get available vaccines               [tested and documented]
    Route::get('/available-vaccines',function(){

        // get all dose from doses table in DB
        $result = DB::select('select * from dose');

        // declare $data array
        $data = [];

        // for loop in every element and store its features values [dose_id, dose_number, vaccine_name] and store in $data [associative array]
        foreach ( $result as $childCat ) {
            $data[] =
            [
                'dose_id' =>  $childCat->dose_id,
                'vaccine_name' => $childCat->vaccine_name,
            ];
        }

        // retrieve json object
        // return response()->json([ $data ]);


        // retrieve json object -> $data in not in [] because it is already an array
        return response($data,200);

    });

    // post dose reservation                [tested and documented]
    Route::post('/dose-reservation',function(Request $request){

        // get data from request body
        $dose_name = $request->dose_name;
        $dose_date = $request->dose_date;
        $dose_time = $request->dose_time;
        $dose_patient_health_name = $request->dose_patient_health_name;


        // search for dose_id
        $dose_id_array = DB::select('select dose_id from dose where vaccine_name = ?',[$dose_name]);
        // search for healthcare_id
        $dose_patient_health_id_array = DB::select('select hc_id from healthcare_center where hc_name = ?',
        [$dose_patient_health_name]);


        // get dose_id and hc_id from arrays retrieved from DB
        $dose_id = (int)$dose_id_array[0]->dose_id;
        $dose_patient_health_id = (int)$dose_patient_health_id_array[0]->hc_id;

        // get patient_id from autherization header
        $patient = MyTokenManager::currentPatient($request);

        $result = DB::insert('insert into Dose_patient values (?,?,?,?,?)',
        [$dose_id,$patient->pat_id,$dose_date,$dose_time,$dose_patient_health_id]);

        if($result){
            return response(['msg' => 'successful dose reservation'],200);

        }
        else {
            return response(['msg' => 'failed dose reservation']);
        }

    });

    // get available healthcare places      [tested and documented]
    Route::get('/avaiable-healthcare-centers',function(){
        $result = DB::select('select * from healthcare_center');

        $hospitals = [];

        foreach ($result as $hosital){
            $hospitals [] = [
                "hc_id" => $hosital->hc_id,
                "hc_name" => $hosital->hc_name,
                "hc_address" => $hosital->hc_address
            ];
        }
        return response($hospitals,200);
    });

    // get available doctors                [tested and documented]
    Route::get('/available-doctors',function(){
        $result = DB::select('select * from doctor');
        // declare $data array
        $data = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ( $result as $childCat ) {
            $data[] =
            [
                'doc_id' =>  $childCat->doc_id,
                'doc_fname' =>  $childCat->doc_fname,
                'doc_lname' =>  $childCat->doc_lname,
                'doc_phone' =>  $childCat->doc_phone,
                'doc_email' =>  $childCat->doc_email,
                'doc_sex' =>  $childCat->doc_sex,
                'doc_age' =>  $childCat->doc_age,
            ];
        }


        // retrieve json object -> $data in not in [] because it is already an array
        return response($data,200);
    });

    // all tests reserved for a  user       [tested and documented]
    Route::get('/get-tests-reserved',function(Request $request){

        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $result = DB::select('select t.test_name,hc.hc_name, tp.pat_test_date, tp.pat_test_time
        from test t
        inner join test_patient tp
        on  tp.test_id = t.test_id
        inner join healthcare_center hc
        on hc.hc_id = tp.test_patient_health
        where tp.pat_id = ?',[$patientId]);

        // declare $data array
        $tests = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ( $result as $childCat ) {
            $tests[] =
            [
                'test_name' =>  $childCat->test_name,
                'pat_test_date' =>  $childCat->pat_test_date,
                'pat_test_time' =>  $childCat->pat_test_time,
                'hc_name' =>  $childCat->hc_name,
            ];
        }


        // retrieve json object -> $data in not in [] because it is already an array
        return response($tests,200);
    });

    // delete reservation                   [tested and documented]
    Route::delete('/delete-test-reservation',function(Request $request){

        // get data from request body
        $test_name = $request->test_name;

        // search for test_id
        $test_id_array = DB::select('select test_id from test where test_name = ?',[$test_name]);


        // get patient data from autherization header
        $patient = MyTokenManager::currentPatient($request);

        // get test_id and hc_id from arrays retrieved from DB
        $test_id = (int)$test_id_array[0]->test_id;


        $result = DB::delete('delete from test_patient where test_id = ? and pat_id =  ?',
        [$test_id,$patient->pat_id]);

        if($result){
            return [
                'msg' => 'deleted successfully'
            ];
        }else{
            return [
                'msg' => 'unsuccessfull operation due to that reservation does not exist'
            ];
        }

    });

    // get reservation dose for patient     [tested and documented]
    Route::get('/get-dose-reservation',function(Request $request){

        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $result = DB::select('select d.vaccine_name, dp.pat_dose_date, dp.pat_dose_time, hc.hc_name
        from dose d
        inner join Dose_patient dp
        on  d.dose_id = dp.dose_id
        inner join healthcare_center hc
        on hc.hc_id = dp.dose_patient_health
        where dp.pat_id = ?',[$patientId]);

        // declare $data array
        $tests = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ( $result as $childCat ) {
            $tests[] =
            [
                'dose_name' =>  $childCat->vaccine_name,
                'pat_test_date' =>  $childCat->pat_dose_date,
                'pat_test_time' =>  $childCat->pat_dose_time,
                'hc_name' =>  $childCat->hc_name,
            ];
        }


        // retrieve json object -> $data in not in [] because it is already an array
        return response($tests,200);
    });

    // update dose reservation
    Route::put('/update-dose-reservation',function(Request $request){

        // get patient id from autherization header
        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        // get editable user inputs
        $dose_name = $request->dose_name;
        $dose_date = $request->dose_date;
        $dose_time = $request->dose_time;
        $dose_patient_health_name = $request->dose_patient_health_name;

        // search for dose_id
        $dose_id_array = DB::select('select dose_id from dose where vaccine_name = ?',[$dose_name]);
        // search for healthcare_id
        $dose_patient_health_id_array = DB::select('select hc_id from healthcare_center where hc_name = ?',
        [$dose_patient_health_name]);


        // get dose_id and hc_id from arrays retrieved from DB
        $dose_id = (int)$dose_id_array[0]->dose_id;
        $dose_patient_health_id = (int)$dose_patient_health_id_array[0]->hc_id;

        $result = DB::update("
        update Dose_patient
        set pat_dose_date = ?,
            pat_dose_time = ?,
            dose_patient_health = ?,
            dose_id = ?
            where pat_id = ?
        ",[$dose_date,$dose_time,$dose_patient_health_id,$dose_id,$patientId]);

        if($result){
            return [
                'msg' => 'successful update'
            ];
        }
        else {
            return [
                'msg' => 'unsuccessful update'
            ];
        }
    });


    // delete dose reservation              [tested and documented]
    Route::delete('/delete-dose-reservation',function(Request $request){

        // get patient id from autherization header
        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $result = DB::delete('delete from Dose_patient where pat_id = ?',[$patientId]);

        if($result){
            return [
                'msg' => 'deleted successfully'
            ];
        }
        else {
            return [
                'msg' => 'unsuccessful operation'
            ];
        }
    });



    Route::post('/contact-with-doctor',function(Request $request){


        // get patient id from autherization header
        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $doctor_email = $request->doctor_email;
        $msg = $request->msg;

        $query = DB::select('select doc_id from doctor where doc_email = ?',[$doctor_email]);

        $doctor_id = $query[0]->doc_id;

        $result = DB::insert('insert into doc_pat VALUES (?,?,?)',[$doctor_id,$patientId,$msg]);

        Mail::to($doctor_email)->send(new DoctortContact($msg,$doctor_email));

        if($result){
            return [
                'msg' => 'successfully'
            ];
        }
        else{
            return [
                'msg' => 'unsuccessfully'
            ];
        }

    });

    //  end of middleware group
});
// ahmedmolotfycrpyto@gmail.com

Route::post('/send-reset-email',function(Request $request){
    $email = $request->email;

    $result = DB::select('select * from patient where pat_email = ?',[$email]);

    if(!$result){
        return [
            'msg' => 'this email is not registered'
        ];
    }

    Mail::to($email)->send(new CloudHostingProduct($email));

    return [
        'msg' => 'Email sent Successfully'
    ];
});


Route::get('/available-vaccines-no-middleware',function(){

    // get all tests from tests table in DB
    $result = DB::select('select * from dose');

    // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ( $result as $childCat ) {
        $data[] =
        [
            'dose_id' =>  $childCat->dose_id,
            'vaccine_name' => $childCat->vaccine_name,
        ];
    }

    // retrieve json object
    // return response()->json([ $data ]);


    // retrieve json object -> $data in not in [] because it is already an array
    return response($data,200);

});


Route::get('/available-tests-no-middleware',function(){

    // get all tests from tests table in DB
    $result = DB::select('select * from test');

    // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ( $result as $childCat ) {
        $data[] =
        [
            'test_id' =>  $childCat->test_id,
            'test_name' =>  $childCat->test_name,
        ];
    }


    // retrieve json object -> $data in not in [] because it is already an array
    return response($data,200);
});


Route::get('/all-patients-registered',function(){
    // get all tests from tests table in DB
    $result = DB::select('select * from patient');

    // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ( $result as $childCat ) {
        $data[] =
        [
            'pat_id' =>  $childCat->pat_id,
            'pat_fname' =>  $childCat->pat_fname,
            'pat_lname' =>  $childCat->pat_lname,
            'pat_age' =>  $childCat->pat_age,
            'pat_address' =>  $childCat->pat_address,
            'pat_phone' =>  $childCat->pat_phone,
            'pat_email' =>  $childCat->pat_email,
            'pat_DOF' =>  $childCat->pat_DOF,
            'pat_SSN' =>  $childCat->pat_SSN,
            'patient_password' =>  $childCat->patient_password,
        ];
    }


    // retrieve json object -> $data in not in [] because it is already an array
    return response($data,200);
});


Route::get('/all-patients-logined',function(){
    // inner join to show pat_name
    $result = DB::select('select pt.id, p.pat_fname, p.pat_lname, pt.patient_id, pt.token FROM patient AS p
    INNER JOIN patient_token AS pt ON pt.patient_id = p.pat_id');

    //where p.pat_id = 4


     // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ( $result as $childCat ) {
        $data[] =
        [
            'token_id' =>  $childCat->id,
            'pat_id' =>  $childCat->patient_id,
            'pat_fname' =>  $childCat->pat_fname,
            'pat_lname' =>  $childCat->pat_lname,
            'token' => $childCat->token

        ];
    }


    // retrieve json object -> $data in not in [] because it is already an array
    return response($data,200);
});

// get email , fname , lastname , test , date, time , hc_name ,test_name
Route::get('/get-all-test-reservation',function(){

    $result = DB::select('select p.pat_fname,p.pat_lname, p.pat_email, t.test_name, tp.pat_test_date , tp.pat_test_time , hc.hc_name
	from patient p
	inner join test_patient tp
    on p.pat_id = tp.pat_id
    inner join test t
    on  tp.test_id = t.test_id
    inner join healthcare_center hc
    on hc.hc_id = tp.test_patient_health');

    // declare $data array
    $tests = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ( $result as $childCat ) {
        $tests[] =
        [
            'pat_fname' =>  $childCat->pat_fname,
            'pat_lname' =>  $childCat->pat_lname,
            'pat_email' =>  $childCat->pat_email,
            'test_name' =>  $childCat->test_name,
            'pat_test_date' =>  $childCat->pat_test_date,
            'pat_test_time' =>  $childCat->pat_test_time,
            'hc_name' =>  $childCat->hc_name,
        ];
    }


    // retrieve json object -> $data in not in [] because it is already an array
    return response($tests,200);
});


Route::get('/get-all-dose-reservation',function(){

    $result = DB::select('select p.pat_fname,p.pat_lname, p.pat_email, d.vaccine_name, dp.pat_dose_date , dp.pat_dose_time , hc.hc_name
	from patient p
	inner join Dose_patient dp
    on p.pat_id = dp.pat_id
    inner join dose d
    on  d.dose_id = dp.dose_id
    inner join healthcare_center hc
    on hc.hc_id = dp.dose_patient_health');

    // declare $data array
    $tests = [];

    // for loop in every element and store its features values [test_id, test_name] and store in $data [associative array]
    foreach ( $result as $childCat ) {
        $tests[] =
        [
            'pat_fname' =>  $childCat->pat_fname,
            'pat_lname' =>  $childCat->pat_lname,
            'pat_email' =>  $childCat->pat_email,
            'vaccine_name' =>  $childCat->vaccine_name,
            'pat_dose_date' =>  $childCat->pat_dose_date,
            'pat_dose_time' =>  $childCat->pat_dose_time,
            'hc_name' =>  $childCat->hc_name,
        ];
    }


    // retrieve json object -> $data in not in [] because it is already an array
    return response($tests,200);
});
