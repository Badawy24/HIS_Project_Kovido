<?php

use App\Helpers\DoctorsTokenManager;
use App\Helpers\MyTokenManager;
use Illuminate\Http\Request;
use App\Mail\CloudHostingProduct;
use App\Mail\DoctortContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\queue;

/*
	@@ -14,6 +19,681 @@
|
*/

Route::get('/test', function () {
    return [
        'msg' => 'congratulation 🎉🎈, successful get request',
    ];
});


// handle register POST request                 [tested and documented]
Route::post('/register', function (Request $request) {

    // get request body
    $patient_first_name = $request->patient_first_name;
    $patinet_last_name = $request->patient_last_name;
    $patinet_age = $request->patient_age;
    $patinet_address = $request->patienet_address;
    $patient_phone = $request->patient_phone;
    $patient_email = $request->patient_email;
    $patient_date_of_birth = $request->patient_date_of_birth;
    $patient_SSN = $request->patient_SSN;
    $patient_password = $request->patient_password;

    $password = Hash::make($patient_password);

    // check if SSN or email exist
    $query = DB::select(
        'select pat_id from patient where pat_SSN = ? or pat_email = ?',
        [$patient_SSN, $patient_email]
    );

    if ($query) {
        return [
            'msg' => 'this email or social security number is already registered before'
        ];
    }

    $result = DB::insert('insert into patient (pat_fname,pat_lname,pat_age,pat_address,pat_phone,pat_email,pat_DOF,pat_SSN,patient_password)
    VALUES (?,?,?,?,?,?,?,?,?)', [
        $patient_first_name, $patinet_last_name, $patinet_age, $patinet_address, $patient_phone, $patient_email,
        $patient_date_of_birth, $patient_SSN, $password
    ]);

    if ($result) {
        return response([
            'msg' => 'successful registeration'
        ]);
    } else {
        return response([
            'msg' => 'error, unsuccessful registeration'
        ]);
    }
});


// handle login process                         [tested and documented]
Route::post('/login', function (Request $request) {

    // receive email and password from user
    $email = $request->email;
    $password = $request->password;

    // $password = $request->password;

    // search for patient in DB
    // $result = DB::select(
    //     'select * from patient where pat_email = ?',
    //     [$email]
    // )[0]->patient_password;



    $users = DB::select('select * from patient where pat_email = ?', [$email]);

    $doc_users = DB::select('select * from doctor where doc_email = ?', [$email]);



    // if patient exist [correct email and password ]
    if ($users) {
        // because the result is a list of only one element, we store that element in patient variable
        if(Hash::check($password, $users[0]->patient_password)){
            $token = MyTokenManager::createPatientToken($users[0]->pat_id);

        // return token like  [3|dkjfbvjfkbvdfkjbv89yrhfb]
            return [
                'msg' => 'logged In successfully',
                'user' => 'patient',
                'token' => $token,
            ];
        }
        else {
            return [
                'error' => 'wrong email or password'
            ];
        }
        // create new token for patient

    } else if ($doc_users) {
        if (Hash::check($request->password, $doc_users[0]->doc_pass)) {
            $doctorToken = DoctorsTokenManager::createDoctorToken($doc_users[0]->doc_id);

            return [
                'msg' => 'Logged In successfully',
                'user' => 'doctor',
                'token' => $doctorToken,
            ];
        } else {
            return [
                'error' => 'wrong email or password'
            ];
        }
    }
    // if patient does not exist [0 rows returned]
    else {
        return [
            'error' => 'wrong email or password'
        ];
    }

});


// middleware of services
Route::group(['middleware' => 'MyAuthAPI'], function () {

    // get profile function                     [tested and documented]
    Route::get('/profile-patient', function (Request $request) {
        // get $patient data from DB
        $patient = MyTokenManager::currentPatient($request);
        return [
            'patient' => $patient
        ];
    });

    // get profile data                         [tested and documented]
    Route::get('/logout-patient', function (Request $request) {
        MyTokenManager::removePatientToken($request);
        return [
            'message' => 'logged out successfully'
        ];
    });

    // get available tests                      [tested and documented]
    Route::get('/available-tests', function () {

        // get all tests from tests table in DB
        $result = DB::select('select * from test');

        // declare $data array
        $data = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ($result as $childCat) {
            $data[] =
                [
                    'test_id' =>  $childCat->test_id,
                    'test-name' =>  $childCat->test_name,
                ];
        }

        // retrieve json object
        // return response()->json([ $data ]);


        // retrieve json object -> $data in not in [] because it is already an array
        return response($data, 200);
    });

    // post test-reservation                    [tested and documented]
    Route::post('/test-reservation', function (Request $request) {

        // get data from request body
        $test_name = $request->test_name;
        $test_date = $request->test_date;
        $test_time = $request->test_time;
        $test_patient_health_name = $request->test_patient_health_name;

        // search for test_id
        $test_id_array = DB::select('select test_id from test where test_name = ?', [$test_name]);
        // search for healthcare_id
        $test_patient_health_id_array = DB::select(
            'select hc_id from healthcare_center where hc_name = ?',
            [$test_patient_health_name]
        );

        // get patient data from autherization header
        $patient = MyTokenManager::currentPatient($request);

        // get test_id and hc_id from arrays retrieved from DB
        $test_id = $test_id_array[0]->test_id;
        $test_patient_health_id = $test_patient_health_id_array[0]->hc_id;

        // insert into DB
        $result = DB::insert(
            "insert into test_patient(pat_id,test_id,pat_test_date,pat_test_time,test_patient_health) values (?,?,?,?,?)",
            [$patient->pat_id, $test_id, $test_date, $test_time, $test_patient_health_id]
        );

        // if successfully inserted
        if ($result) {
            return response([
                'msg' => 'successful test reservation'
            ]);
        } else {
            return response([
                'msg' => 'failed test reservation'
            ]);
        }
    });

    // get available vaccines                   [tested and documented]
    Route::get('/available-vaccines', function () {

        // get all dose from doses table in DB
        $result = DB::select('select * from dose');

        // declare $data array
        $data = [];

        // for loop in every element and store its features values [dose_id, dose_number, vaccine_name] and store in $data [associative array]
        foreach ($result as $childCat) {
            $data[] =
                [
                    'dose_id' =>  $childCat->dose_id,
                    'vaccine_name' => $childCat->vaccine_name,
                ];
        }

        // retrieve json object
        // return response()->json([ $data ]);


        // retrieve json object -> $data in not in [] because it is already an array
        return response($data, 200);
    });

    // post dose reservation                    [tested and documented]
    Route::post('/dose-reservation', function (Request $request) {

        // get data from request body
        $dose_name = $request->dose_name;
        $dose_date = $request->dose_date;
        $dose_time = $request->dose_time;
        $dose_patient_health_name = $request->dose_patient_health_name;


        // search for dose_id
        $dose_id_array = DB::select('select dose_id from dose where vaccine_name = ?', [$dose_name]);
        // search for healthcare_id
        $dose_patient_health_id_array = DB::select(
            'select hc_id from healthcare_center where hc_name = ?',
            [$dose_patient_health_name]
        );


        // get dose_id and hc_id from arrays retrieved from DB
        $dose_id = (int)$dose_id_array[0]->dose_id;
        $dose_patient_health_id = (int)$dose_patient_health_id_array[0]->hc_id;

        // get patient_id from autherization header
        $patient = MyTokenManager::currentPatient($request);

        $result = DB::insert(
            'insert into Dose_patient values (?,?,?,?,?)',
            [$dose_id, $patient->pat_id, $dose_date, $dose_time, $dose_patient_health_id]
        );

        if ($result) {
            return response(['msg' => 'successful dose reservation']);
        } else {
            return response(['msg' => 'failed dose reservation']);
        }
    });

    // get available healthcare places          [tested and documented]
    Route::get('/avaiable-healthcare-centers', function () {
        $result = DB::select('select * from healthcare_center');

        $hospitals = [];

        foreach ($result as $hosital) {
            $hospitals[] = [
                "hc_id" => $hosital->hc_id,
                "hc_name" => $hosital->hc_name,
                "hc_address" => $hosital->hc_address
            ];
        }
        return response($hospitals, 200);
    });

    // get available doctors                    [tested and documented]
    Route::get('/available-doctors', function () {
        $result = DB::select('select * from doctor');
        // declare $data array
        $data = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ($result as $childCat) {
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
        return response($data, 200);
    });

    // all tests reserved for a  user           [tested and documented]
    Route::get('/get-tests-reserved', function (Request $request) {

        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $result = DB::select('select t.test_name,tp.res_id ,hc.hc_name, tp.pat_test_date, tp.pat_test_time
        from test t
        inner join test_patient tp
        on  tp.test_id = t.test_id
        inner join healthcare_center hc
        on hc.hc_id = tp.test_patient_health
        where tp.pat_id = ?', [$patientId]);

        // declare $data array
        $tests = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ($result as $childCat) {
            $tests[] =
                [
                    'test_name' =>  $childCat->test_name,
                    'pat_test_date' =>  $childCat->pat_test_date,
                    'pat_test_time' =>  $childCat->pat_test_time,
                    'hc_name' =>  $childCat->hc_name,
                    'res_id' => $childCat->res_id
                ];
        }


        // retrieve json object -> $data in not in [] because it is already an array
        return response($tests, 200);
    });

    // delete reservation                       [tested and documented]
    Route::delete('/delete-test-reservation', function (Request $request) {

        // get data from request body
        $res_id = $request->res_id;


        $result = DB::delete(
            'delete from test_patient where res_id = ?',
            [$res_id]
        );

        if ($result) {
            return [
                'msg' => 'deleted successfully'
            ];
        } else {
            return [
                'msg' => 'unsuccessfull operation due to that reservation does not exist'
            ];
        }
    });

    // get reservation dose for patient         [tested and documented]
    Route::get('/get-dose-reservation', function (Request $request) {

        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $result = DB::select('select d.vaccine_name, dp.pat_dose_date, dp.pat_dose_time, hc.hc_name
        from dose d
        inner join Dose_patient dp
        on  d.dose_id = dp.dose_id
        inner join healthcare_center hc
        on hc.hc_id = dp.dose_patient_health
        where dp.pat_id = ?', [$patientId]);

        // declare $data array
        $tests = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ($result as $childCat) {
            $tests[] =
                [
                    'dose_name' =>  $childCat->vaccine_name,
                    'pat_test_date' =>  $childCat->pat_dose_date,
                    'pat_test_time' =>  $childCat->pat_dose_time,
                    'hc_name' =>  $childCat->hc_name,
                ];
        }


        // retrieve json object -> $data in not in [] because it is already an array
        return response($tests, 200);
    });

    // update dose reservation
    Route::put('/update-dose-reservation', function (Request $request) {

        // get patient id from autherization header
        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        // get editable user inputs
        $dose_name = $request->dose_name;
        $dose_date = $request->dose_date;
        $dose_time = $request->dose_time;
        $dose_patient_health_name = $request->dose_patient_health_name;

        // search for dose_id
        $dose_id_array = DB::select('select dose_id from dose where vaccine_name = ?', [$dose_name]);
        // search for healthcare_id
        $dose_patient_health_id_array = DB::select(
            'select hc_id from healthcare_center where hc_name = ?',
            [$dose_patient_health_name]
        );


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
        ", [$dose_date, $dose_time, $dose_patient_health_id, $dose_id, $patientId]);

        if ($result) {
            return [
                'msg' => 'successful update'
            ];
        } else {
            return [
                'msg' => 'unsuccessful update'
            ];
        }
    });

    // check if dose reserved                   [tested and documented]
    Route::get('/if-dose-reserved', function (Request $request) {
        $patientId = MyTokenManager::currentPatient($request)->pat_id;
        // get all tests from tests table in DB
        $result = DB::select('select * from Dose_patient where pat_id = ?', [$patientId]);

        if ($result) {
            return [
                'msg' => 'yes'
            ];
        } else {
            return [
                'msg' => 'no'
            ];
        }
    });

    // delete dose reservation                  [tested and documented]
    Route::delete('/delete-dose-reservation', function (Request $request) {

        // get patient id from autherization header
        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $result = DB::delete('delete from Dose_patient where pat_id = ?', [$patientId]);

        if ($result) {
            return [
                'msg' => 'deleted successfully'
            ];
        } else {
            return [
                'msg' => 'unsuccessful operation'
            ];
        }
    });

    // contact with doctor                      [tested and documented]
    Route::post('/contact-with-doctor', function (Request $request) {

        // get patient id from autherization header
        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $doctor_email = $request->doctor_email;
        $msg = $request->msg;
        $reply = "";

        $query = DB::select('select doc_id from doctor where doc_email = ?', [$doctor_email]);



        $doctor_id = $query[0]->doc_id;

        $number_of_msg = DB::select("select count(*) as num_msgs from doc_pat");



        $result = DB::insert('insert into doc_pat VALUES (?,?,?,?,?)', [$doctor_id, $patientId, $msg, $reply, $number_of_msg[0]->num_msgs + 1]);

        Mail::to($doctor_email)->send(new DoctortContact($msg, $doctor_email));

        if ($result) {
            return [
                'msg' => 'successfully'
            ];
        } else {
            return [
                'msg' => 'unsuccessfully'
            ];
        }
    });

    Route::get('/messages_of_patient', function (Request $request) {

        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $result = DB::select("select doctor.doc_fname as doctor_first_name ,doctor.doc_lname as doctor_last_name,doc_pat.message as message,doc_pat.reply as reply
        from doc_pat , doctor
        where pat_id = ?
        and doc_pat.doc_id = doctor.doc_id", [$patientId]);

        $messagesData = [];

        foreach ($result as $msg) {
            $messagesData[] = [
                'doctor_first_name' => $msg->doctor_first_name,
                'doctor_last_name' => $msg->doctor_last_name,
                'message' => $msg->message,
                'reply' => $msg->reply,
            ];
        }

        return response($messagesData, 200);
    });

    Route::post('/meeting-with-doctor', function (Request $request) {
        // patient Id
        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        // data from form
        $con_title = $request->con_title;
        $con_date = $request->con_date;
        $con_meet_id = $request->con_meet_id;
        $doc_fname = $request->doc_fname;
        $doc_lname = $request->doc_lname;
        $con_desc = $request->con_desc;

        $doctorId = DB::select(
            "select doc_id
        from doctor where doc_fname = ?
        and doc_lname = ?",
            [$doc_fname, $doc_lname]
        )[0]->doc_id;


        $result = DB::insert("insert into pat_consultation(
            con_title,
            con_date,
            con_meet_id,
            pat_id,
            doc_id,
            con_desc,
            con_time)
            values(?,?,?,?,?,?,?)", [
            $con_title,
            $con_date,
            $con_meet_id,
            $patientId,
            $doctorId,
            $con_desc,
            '20:00',
        ]);


        if ($result) {
            return [
                'msg' => 'successfully'
            ];
        } else {
            return [
                'msg' => 'failed'
            ];
        }
    });

    Route::get('/patient-consultation', function (Request $request) {
        // patient Id
        $patientId = MyTokenManager::currentPatient($request)->pat_id;

        $result = DB::select("
        select con_title,
        con_date,
        con_meet_id,
        doctor.doc_id,
        con_desc,
        doc_fname,doc_lname,doc_email
        from pat_consultation,doctor
        where pat_consultation.doc_id = doctor.doc_id and
        pat_id = ?", [$patientId]);

        // declare $data array
        $meetings = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ($result as $childCat) {
            $meetings[] =
                [
                    'con_title' =>  $childCat->con_title,
                    'con_date' =>  $childCat->con_date,
                    'con_meet_id' =>  $childCat->con_meet_id,
                    'con_desc' =>  $childCat->con_desc,
                    'doc_fname' => $childCat->doc_fname,
                    'doc_lname' => $childCat->doc_lname,
                    'doc_email' => $childCat->doc_email,
                ];
        }
        // retrieve json object -> $data in not in [] because it is already an array
        return response($meetings, 200);
    });




    //  end of middleware group
});


Route::group(['middleware' => 'DoctorAuthAPI'], function () {
    //                                          [tested and documented]
    Route::get('/doctor_data', function (Request $request) {
        $doctor = DoctorsTokenManager::currentDoctor($request);
        return [
            'doctor' => $doctor,
        ];
    });

    //                                          [tested and documented]
    Route::get('/messages_of_doctor', function (Request $request) {
        // get doctor_id to search for his patient's messages
        $doctor_id = DoctorsTokenManager::currentDoctor($request)->doc_id;

        // retreive messages of doctor
        $msgsData = DB::select("select * from doc_pat where doc_id = ?", [$doctor_id]);

        // declare $data array
        $data = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ($msgsData as $childCat) {
            $data[] =
                [
                    'doc_id' =>  $childCat->doc_id,
                    'pat_id' =>  $childCat->pat_id,
                    'message' =>  $childCat->message,
                    'reply' =>  $childCat->reply,
                    'msg_id' =>  $childCat->msg_id,
                ];
        }
        // retrieve json object -> $data in not in [] because it is already an array
        return response($data, 200);
    });

    //                                          [tested and documented]
    Route::post('/reply_to_message', function (Request $request) {
        // get doctor_id to search for his patient's messages
        $doctor_id = DoctorsTokenManager::currentDoctor($request)->doc_id;

        // get message_id
        $msg_id = $request->msg_id;


        $result = DB::update(
            "update doc_pat
            SET reply = ?
            WHERE msg_id = ? and doc_id = ?",
            [$request->reply, $msg_id, $doctor_id]
        );

        if ($result) {

            return [
                'msg' => "successfully",
            ];
        } else {
            return [
                'msg' => 'failed',
            ];
        }
    });

    //                                          [tested and documented]
    Route::get('/doctor_logout', function (Request $request) {
        DoctorsTokenManager::removeDoctorToken($request);
        return [
            'msg' => 'doctor, loggout successfully'
        ];
    });


    Route::get('/doctor_consultation', function (Request $request) {
        // get doctor_id to search for his patient's messages
        $doctor_id = DoctorsTokenManager::currentDoctor($request)->doc_id;

        $result = DB::select("
        select con_title,
        con_date,
        con_meet_id,
        patient.pat_id,
		doc_id,
        con_desc,
        pat_fname,pat_lname,pat_age,pat_email
        from pat_consultation,patient
        where pat_consultation.pat_id = patient.pat_id and
        pat_consultation.doc_id = ?
        ",[$doctor_id]);

        // declare $data array
        $meetings = [];

        // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
        foreach ($result as $childCat) {
            $meetings[] =
                [
                    'con_title' =>  $childCat->con_title,
                    'con_date' =>  $childCat->con_date,
                    'con_meet_id' =>  $childCat->con_meet_id,
                    'con_desc' =>  $childCat->con_desc,
                    'pat_fname' => $childCat->pat_fname,
                    'pat_lname' => $childCat->pat_lname,
                    'pat_age' => $childCat->pat_age,
                    'pat_email'=> $childCat->pat_email,
                ];
        }
        // retrieve json object -> $data in not in [] because it is already an array
        return response($meetings, 200);
    });
});

//                                              [tested and documented]
Route::post('/send-reset-email', function (Request $request) {
    $email = $request->email;

    $result = DB::select('select * from patient where pat_email = ?', [$email]);

    if (!$result) {
        return [
            'msg' => 'this email is not registered'
        ];
    }

    Mail::to($email)->send(new CloudHostingProduct($email));

    return [
        'msg' => 'Email sent Successfully'
    ];
});


// ********************* GLOBAL ****************************** //
Route::get('/available-vaccines-no-middleware', function () {

    // get all tests from tests table in DB
    $result = DB::select('select * from dose');

    // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ($result as $childCat) {
        $data[] =
            [
                'dose_id' =>  $childCat->dose_id,
                'vaccine_name' => $childCat->vaccine_name,
            ];
    }

    // retrieve json object
    // return response()->json([ $data ]);


    // retrieve json object -> $data in not in [] because it is already an array
    return response($data, 200);
});

// get available doctors                    [tested and documented]
Route::get('/available-doctors', function () {
    $result = DB::select('select * from doctor');
    // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ($result as $childCat) {
        $data[] =
            [
                'doc_id' =>  $childCat->doc_id,
                'doc_fname' =>  $childCat->doc_fname,
                'doc_lname' =>  $childCat->doc_lname,
                'doc_phone' =>  $childCat->doc_phone,
                'doc_email' =>  $childCat->doc_email,
                'doc_sex' =>  $childCat->doc_sex,
                'doc_age' =>  $childCat->doc_age,
                'doc_pass' => $childCat->doc_pass,
            ];
    }


    // retrieve json object -> $data in not in [] because it is already an array
    return response($data, 200);
});

Route::get('/available-tests-no-middleware', function () {

    // get all tests from tests table in DB
    $result = DB::select('select * from test');

    // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ($result as $childCat) {
        $data[] =
            [
                'test_id' =>  $childCat->test_id,
                'test_name' =>  $childCat->test_name,
            ];
    }


    // retrieve json object -> $data in not in [] because it is already an array
    return response($data, 200);
});

// https://powerful-forest-82516.herokuapp.com/api/all-patients-registered
Route::get('/all-patients-registered', function () {
    // get all tests from tests table in DB
    $result = DB::select('select * from patient');

    // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ($result as $childCat) {
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
    return response($data, 200);
});

// https://powerful-forest-82516.herokuapp.com/api/all-patients-logined
Route::get('/all-patients-logined', function () {
    // inner join to show pat_name
    $result = DB::select('select pt.id, p.pat_fname, p.pat_lname, pt.patient_id, pt.token FROM patient AS p
    INNER JOIN patient_token AS pt ON pt.patient_id = p.pat_id');

    //where p.pat_id = 4


    // declare $data array
    $data = [];

    // for loop in every element and store its features values [test_id, test_name, test_fee] and store in $data [associative array]
    foreach ($result as $childCat) {
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
    return response($data, 200);
});

// https://powerful-forest-82516.herokuapp.com/api/get-all-test-reservation
Route::get('/get-all-test-reservation', function () {

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
    foreach ($result as $childCat) {
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
    return response($tests, 200);
});

// https://powerful-forest-82516.herokuapp.com/api/get-all-dose-reservation
Route::get('/get-all-dose-reservation', function () {

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
    foreach ($result as $childCat) {
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
    return response($tests);
});
