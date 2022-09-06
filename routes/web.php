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
//use App\Http\Controllers\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [Login_Controller::class, 'showLogin'])->middleware('logoutmiddle');
Route::post('/login', [Login_Controller::class, 'login']);


Route::get('/register', function () {
    return view('register');
})->middleware('logoutmiddle');

Route::post('/register', [RegisterController::class, 'registration'])->name('register');

Route::get('/logout', [Login_Controller::class, 'logout']);


Route::view('contact_us', 'contact_us')->name('contact_us');
Route::post('/send', 'App\Http\Controllers\ContactController@send')->name('send.email');
// Route::get('/contact_us', function () {
//     return view('contact_us');
// });

Route::get('/profile', [ProfileController::class, 'getData'])->middleware('loginmiddle');


Route::get('/Editprofile', [ProfileController::class, 'getEditData'])->middleware('loginmiddle');
Route::post('/updateprofile', [ProfileController::class, 'updateprofile'])->middleware('loginmiddle');
// Route::get('/Editprofile', function () {
//     return view('Editprofile');
// });

Route::get('/service', function () {
    return view('service');
})->middleware('loginmiddle');


Route::get('/new_dose', [BookDoseController::class, 'dose'])->middleware('loginmiddle');

Route::post('/bookDose', 'App\Http\Controllers\BookDoseController@bookDose')->name('bookDose');


// Route::get('/new_test', function () {
//     return view('new_test');
// });
Route::get('/contact_doc', function () {
    $doc_name = DB::select('select * from doctor');
    return view('contact_doc')->with('doc_names', $doc_name);
});
Route::post('/sendDoc', [ContactDocController::class, 'sendDoc'])->name('sendDoc.email');

// Route::get('/forgetSendMail', [ForgetPassController::class, 'showForgetSendMail']);
// Route::post('/sendmailForget', [ForgetPassController::class, 'sendMailForgetPass']);

// Route::get('/resetPass', [ForgetPassController::class, 'showResetPass']);
// Route::post('/resetPass', [ForgetPassController::class, 'resetPassword']);


Route::get('/admin-dashbord', [adminController::class, 'admin_dashbord'])->middleware('loginmiddle');
Route::get('/admin_doc_data', [adminController::class, 'admin_doc_data'])->middleware('loginmiddle');
Route::get('/admin_doc_data/{doc_id}', [adminController::class, 'delete_doc'])->middleware('loginmiddle');
Route::get('/admin_doc_msg', [adminController::class, 'Show_admin_doc_msg'])->middleware('loginmiddle');
Route::post('/admin_doc_msg', [adminController::class, 'admin_doc_msg'])->middleware('loginmiddle');
Route::get('/admin_add_doc', [adminController::class, 'show_admin_add_doc_form'])->middleware('loginmiddle');
Route::post('/admin_add_doc', [adminController::class, 'admin_add_doc'])->middleware('loginmiddle');


Route::get('/admin_dose_data', [adminController::class, 'admin_dose_data'])->middleware('loginmiddle');
Route::get('/admin_dose_data_update/{pat_id}', [adminController::class, 'update_dose'])->middleware('loginmiddle');
Route::post('/admin_update_dose', [adminController::class, 'update_dose_data'])->middleware('loginmiddle');
Route::get('/admin_dose_data_del/{pat_id}', [adminController::class, 'delete_dose'])->middleware('loginmiddle');


Route::get('/admin_test_data', [adminController::class, 'admin_test_data'])->middleware('loginmiddle');


Route::get('/admin_test_data', [adminController::class, 'show_admin_test_data'])->middleware('loginmiddle');
Route::post('/admin_test_data', [adminController::class, 'admin_test_data'])->middleware('loginmiddle');




// test_forms_routs

Route::get('/new_test', [TestFormController::class, 'new_test_display']);
Route::post('/new_test', [TestFormController::class, 'new_test']);

// Route::get('/new_test', function() {
//     return view('new_test');
// });


Route::get('/my_tests', [MyTestController::class, 'mytest_display']);
Route::get('/delete/{res_id}', [MyTestController::class, 'delete']);


// Route::get('/my_tests', function()
// {
//     return view('my_tests');
// });

Route::get('/test_option', function () {
    return view('test_option');
});



Route::get('/update_test/{res_id}', [TestFormController::class, 'showdata']);
Route::post('/update_test/{res_id}', [TestFormController::class, 'update_data']);

// Route::get('/update_test/{$testcase.res_id}', function() {
//     return view('update_test');
// });

Route::get('/doc_profile', [docProfileController::class, 'docProfile'])->middleware('loginmiddle');
Route::post('/saveReply/{msg_id}', [docProfileController::class, 'saveReply'])->middleware('loginmiddle');


Route::get('/reset-password_api/{email}', function ($pat_email) {
    $email = $pat_email;
    return view('reset_passpword_api', ['email' => $email]);
});

Route::post('/submit-new-passord-api', function () {
    $email = request('email');
    $password = request('password');
    //return "$email and $password";
    //$result = DB::select('select * from patient where pat_email = ?',[$email]);
    //$result = DB::update('update patient set patient_password = ? where pat_email = ?',[$password,$email]);
    $result = DB::update('update patient set patient_password = ?', [$password, $email]);

    return $result;
});


/* Forget Password*/
Route::get('/forgetPassword', function () {
    return view('forget-send-mail');
});
Route::post('/forgetsend', [ForgetPassController::class, 'forgetSendMail']);
Route::get('/resetpass', [ForgetPassController::class, 'showResetPassword']);
Route::post('/reset', [ForgetPassController::class, 'ResetPassword']);

// admin_add_delete_show_patient
Route::group(['middleware' => 'loginmiddle'], function () {
    Route::get('/admin_patient_data_show', [adminController::class, 'admin_patient_show']);
    Route::get('/admin_patient_data_show/delete_doc/{pat_id}', [adminController::class, 'admin_delete_patient']);

    Route::get('/admin_add_patient', [adminController::class, 'adminAddPatient']);
    Route::post('/admin_add_patient', [adminController::class, 'admin_registration']);
});
Route::post('/reset', [ForgetPassController::class, 'ResetPassword']);