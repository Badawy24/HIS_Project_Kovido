<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\BookDoseController;
use App\Http\Controllers\ForgetPassController;
use App\Http\Controllers\Login_Controller;
use App\Http\Controllers\ContactDocController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestFormController;
use App\Http\Controllers\MyTestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\docProfileController;
use App\Http\Controllers\LiveController;
//use App\Http\Controllers\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

/*=========================================================================================================================== */
/*=========================================================================================================================== */

Route::get('/', function () {
    return view('welcome');
});

/*Start Login Routes */
Route::get('/login', [Login_Controller::class, 'showLogin'])->middleware('logoutmiddle');
Route::post('/login', [Login_Controller::class, 'login']);
Route::get('/logout', [Login_Controller::class, 'logout']);
/*End Login Routes */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*Start Register Routes */
Route::get('/register', function () {
    return view('register');
})->middleware('logoutmiddle');
Route::post('/register', [RegisterController::class, 'registration'])->name('register');
/*End Register Routes */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*Start Forget Password Routes */
Route::get('/forgetPassword', function () {
    return view('forget-send-mail');
});
Route::post('/forgetsend', [ForgetPassController::class, 'forgetSendMail']);
Route::get('/resetpass', [ForgetPassController::class, 'showResetPassword']);
Route::post('/reset', [ForgetPassController::class, 'ResetPassword']);
/*End Forget Password Routes */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*Start Contact Routes */
Route::view('contact_us', 'contact_us')->name('contact_us');
Route::post('/send', 'App\Http\Controllers\ContactController@send')->name('send.email');
/*End Contact Routes */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* Start Reset password Api*/
Route::get('/reset-password_api/{email}', function ($pat_email) {
    $email = $pat_email;
    return view('reset_passpword_api', ['email' => $email]);
});
Route::post('/submit-new-passord-api', function () {
    $email = request('email');
    $password = request('password');
    $result = DB::update('update patient set patient_password = ?', [$password, $email]);
    return $result;
});
/* End Reset password Api*/

/*=========================================================================================================================== */
/*=========================================================================================================================== */

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/*=========================================================================================================================== */
/*=========================================================================================================================== */
/* Start Admin Routes */

Route::group(['middleware' => 'loginmiddle'], function () {
    // DashBoard Route
    Route::get('/admin-dashbord', [adminController::class, 'admin_dashbord']);

    /* Start Patient Route In Admin */
    Route::get('/admin_patient_data_show', [adminController::class, 'admin_patient_show']);
    Route::get('/admin_patient_data_show/delete_doc/{pat_id}', [adminController::class, 'admin_delete_patient']);
    Route::get('/admin_add_patient', [adminController::class, 'adminAddPatient']);
    Route::post('/admin_add_patient', [adminController::class, 'admin_registration']);
    Route::get('/update_pat/{pat_id}', [adminController::class, 'show_update_patient']);
    Route::post('/update_pat_data/{pat_id}', [adminController::class, 'update_patient']);
    /* End Patient Route In Admin */

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Doctor Route In Admin */
    Route::get('/admin_doc_data', [adminController::class, 'admin_doc_data']);
    Route::post('/admin_doc_data/{doc_id}', [adminController::class, 'update_doc_data']);
    Route::get('/admin_doc_data/{doc_id}', [adminController::class, 'delete_doc']);
    Route::get('/admin_doc_data_update/{doc_id}', [adminController::class, 'update_doc']);
    Route::get('/admin_doc_msg', [adminController::class, 'Show_admin_doc_msg']);
    Route::get('/admin_doc_msg/{msg_id}/{doc_id}', [adminController::class, 'delete_msg']);
    Route::post('/admin_doc_msg', [adminController::class, 'admin_doc_msg']);
    Route::get('/admin_add_doc', [adminController::class, 'show_admin_add_doc_form']);
    Route::post('/admin_add_doc', [adminController::class, 'admin_add_doc']);
    /* End Doctor Route In Admin */

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Dose Route In Admin */
    Route::get('/admin_add_dose', [adminController::class, 'admin_add_dose']);
    Route::post('/dose_add', [adminController::class, 'dose_add']);
    Route::get('/update_data_dose/{dose_id}', [adminController::class, 'update_data_dose']);
    Route::get('/del_data_dose/{dose_id}', [adminController::class, 'del_data_dose']);
    Route::get('/admin_dose_data', [adminController::class, 'admin_dose_data']);
    Route::get('/admin_dose_data_update/{pat_id}', [adminController::class, 'update_dose']);
    Route::post('/admin_update_dose', [adminController::class, 'update_dose_data']);
    Route::get('/admin_dose_data_del/{pat_id}', [adminController::class, 'delete_dose']);
    /* End Dose Route In Admin */

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Test Route In Admin */
    Route::get('/admin_all_tests', [adminController::class, 'admin_all_tests']);
    Route::get('/admin_test_data', [adminController::class, 'admin_test_data']);
    Route::get('/admin_test_data', [adminController::class, 'show_admin_test_data']);
    Route::post('/admin_test_data', [adminController::class, 'admin_test_data']);
    Route::get('/admin_existed_test', [adminController::class, 'admin_get_tests_names']);
    Route::get('/admin_test_del/{test_id}', [adminController::class, 'admin_delete_test']);
    Route::get('/admin_test_re_del/{res_id}', [adminController::class, 'admin_delete_test_res']);
    Route::get('/admin_add_test_details', [adminController::class, 'admin_add_new_test_view']);
    Route::post('/admin_add_test_details', [adminController::class, 'admin_add_new_test_details']);
    Route::get('/admin_test_data_update/{res_id}', [adminController::class, 'test_resv_data']);
    Route::post('/update_testres_data', [adminController::class, 'update_testres_data']);
    /* End Test Route In Admin */

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Live Consultation Route In Admin */
    Route::get('/admin_live', [adminController::class, 'admin_live']);
    Route::post('/admin_live', [adminController::class, 'admin_add_consultation']);
    /* End Live Consultation  Route In Admin */

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Live Meeting Route In Admin */
    Route::get('/admin_live_meet', [adminController::class, 'admin_live_meet']);
    Route::post('/admin_live_meet', [adminController::class, 'admin_add_meet']);
    /* End Live Meeting Route In Admin */

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
});
/* End Admin Routes */
/*=========================================================================================================================== */
/*=========================================================================================================================== */

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/*=========================================================================================================================== */
/*=========================================================================================================================== */
/* Start Login Patient Routes */
Route::group(['middleware' => 'loginmiddle'], function () {

    /* Start Profile Routes */
    Route::get('/profile', [ProfileController::class, 'getData']);
    Route::get('/Editprofile', [ProfileController::class, 'getEditData']);
    Route::post('/updateprofile', [ProfileController::class, 'updateprofile']);
    Route::get('/change_pass_patient/{pat_id}', [ProfileController::class, 'change_pass_form']);
    Route::post('/change_pass_patient/{pat_id}', [ProfileController::class, 'change_pass']);
    /* End Profile Routes */

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Service Routes */
    Route::get('/service', function () {
        return view('service');
    });
    /* End Service Routes */

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Dose Routes */
    Route::get('/new_dose', [BookDoseController::class, 'dose']);
    Route::post('/bookDose', 'App\Http\Controllers\BookDoseController@bookDose')->name('bookDose');
    /* End Dose Routes */

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Test Routes */
    Route::get('/test_option', function () {
        return view('test_option');
    });
    Route::get('/new_test', [TestFormController::class, 'new_test_display']);
    Route::post('/new_test', [TestFormController::class, 'new_test']);
    Route::get('/my_tests', [MyTestController::class, 'mytest_display']);
    Route::get('/delete/{res_id}', [MyTestController::class, 'delete']);
    Route::get('/update_test/{res_id}', [TestFormController::class, 'showdata']);
    Route::post('/update_test/{res_id}', [TestFormController::class, 'update_data']);
    /* End Test Routes */

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Contact Routes */
    Route::get('/contact_doc', function () {
        $doc_name = DB::select('select * from doctor');
        return view('contact_doc')->with('doc_names', $doc_name);
    });
    Route::post('/sendDoc', [ContactDocController::class, 'sendDoc'])->name('sendDoc.email');
    /* End Contact Routes */

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Live Routes */
    Route::get('/live_con', [LiveController::class, 'showAvilableAppo']);
    Route::get('/confirm_con/{doc_id}', [LiveController::class, 'confirm_con']);
    Route::post('/confirmLive', [LiveController::class, 'confirmLive']);
    Route::get('/startMeeting', [LiveController::class, 'startMeeting']);
    /* End Contact Routes */

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
});
/* End Login Patient Routes */
/*=========================================================================================================================== */
/*=========================================================================================================================== */

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/*=========================================================================================================================== */
/*=========================================================================================================================== */
/* Start Login Doctor Routes */
Route::group(['middleware' => 'loginmiddle'], function () {
    /* Start Profile Doctor*/
    Route::get('/doc_profile', [docProfileController::class, 'docProfile']);
    Route::get('/doc_profile_msg', [docProfileController::class, 'doc_profile_msg']);
    Route::get('/edit_profile_doc', [docProfileController::class, 'get_edit_profile_data']);
    Route::post('/edit_profile_doc', [docProfileController::class, 'edit_profile_doc_data']);
    Route::get('/change_pass_doc', [docProfileController::class, 'change_pass_doc']);
    Route::post('/change_pass_doc', [docProfileController::class, 'change_passDoc']);
    /* End Profile Doctor*/

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /* Start Replay Doctor*/
    Route::post('/saveReply/{msg_id}', [docProfileController::class, 'saveReply']);
    /* End Replay Doctor*/

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

});
/* End Login Doctor Routes */
/*=========================================================================================================================== */
/*=========================================================================================================================== */

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/*=========================================================================================================================== */
/*=========================================================================================================================== */