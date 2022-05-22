<?php

use App\Helpers\MyTokenManager;
use Illuminate\Http\Request;
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
        'msg' => 'Hello world',
    ];
});


// handle register POST request
Route::post('/register',function(Request $request){

    // store in variables
    $patient_first_name = $request->patient_first_name;
    $patinet_last_name = $request->patinet_last_name;
    $patinet_age = $request->patinet_age;
    $patinet_address = $request->patinet_address;
    $patient_phone = $request->patient_phone;
    $patient_email = $request->patient_email;
    $patient_date_of_birth = $request->patient_date_of_birth;
    $patient_SSN = $request->patient_SSN;
    $patient_password = $request->patient_password;

    $result = DB::insert('insert into patient (pat_fname,pat_lname,pat_age,pat_address,pat_phone,pat_email,pat_DOF,pat_SSN,patient_password)
    VALUES (?,?,?,?,?,?,?,?,?)',[
        $patient_first_name,$patinet_last_name,$patinet_age,$patinet_address, $patient_phone, $patient_email,
        $patient_date_of_birth, $patient_SSN, $patient_password
    ]);

    if($result){
        return [
            'msg' => 'successful registeration'
        ];
    }
    else {
        return response([
            'msg' => 'error, unsuccessful registeration'
        ],424);
    }
});


// handle login process
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
        // or
        // return [
        //     'patient_id' => $patient->pat_id,
        //     'patient_first_name' => $patient->pat_fname,
        //     'patient_last_name' => $patient->pat_lname,
        //     'patient_age' => $patient->pat_age,
        //     'patient_address' => $patient->pat_address,
        //     'patient_phone' => $patient->pat_phone,
        //     'patient_email' => $patient->pat_email,
        //     'patient_data_of_birth' => $patient->pat_DOF,
        //     'patient_SSN' => $patient->pat_SSN,
        // ];
    });

    Route::get('/logout',function(Request $request){
        MyTokenManager::removePatientToken($request);
        return [
            'message' => 'logged out successfully'
        ];
    });

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
                'test-fee' => $childCat->test_fee,
            ];
        }

        // retrieve json object
        // return response()->json([ $data ]);


        // retrieve json object -> $data in not in [] because it is already an array
        return response($data,200);
    });

    Route::post('/test-reservation',function(Request $request){
        // $patient_id = $request->patient_id;
        $test_id = $request->test_id;
        $test_date = $request->test_date;
        $test_time = $request->test_time;

        // get patient data
        $patient = MyTokenManager::currentPatient($request);

        $result = DB::insert("insert into test_patient values (?,?,?,?)",
        [$patient->pat_id,$test_id,$test_date,$test_time]);

        if($result){
            return [
                'msg' => 'successful reservation'
            ];
        }
        else {
            return [
                'msg' => 'failed reservation'
            ];
        }
    });

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
                'dose_number' =>  $childCat->dose_number,
                'vaccine_name' => $childCat->vaccine_name,
            ];
        }

        // retrieve json object
        // return response()->json([ $data ]);


        // retrieve json object -> $data in not in [] because it is already an array
        return response($data,200);

    });


    Route::post('/dose-reservation',function(Request $request){
        // $patient_id = $request->patient_id;
        $dose_id = $request->dose_id;
        $dose_date = $request->dose_date;
        $dose_time = $request->dose_time;

        $patient = MyTokenManager::currentPatient($request);

        $result = DB::insert('insert into Dose_patient values (?,?,?,?)',
        [$dose_id,$patient->pat_id,$dose_date,$dose_time]);

        if($result){
            return [
                'msg' => 'successful reservation'
            ];
        }
        else {
            return [
                'msg' => 'failed reservation'
            ];
        }

    });

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
            'dose_number' =>  $childCat->dose_number,
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
            'test_fee' => $childCat->test_fee,
        ];
    }

    // retrieve json object
    // return response()->json([ $data ]);


    // retrieve json object -> $data in not in [] because it is already an array
    return response($data,200);
});






