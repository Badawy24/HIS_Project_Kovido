<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ForgetPassController;
use App\Http\Controllers\Login_Controller;
use Illuminate\Support\Facades\Route;


/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [Login_Controller::class , 'showLogin'])->middleware('logoutmiddle');
Route::post('/login', [Login_Controller::class , 'login']);


Route::get('/register', function () {
    return view('register');
})->middleware('logoutmiddle');

Route::get('/logout', [Login_Controller::class , 'logout']);


Route::view('contact_us', 'contact_us')->name('contact_us');
Route::post('/send', 'App\Http\Controllers\ContactController@send')->name('send.email');
// Route::get('/contact_us', function () {
//     return view('contact_us');
// });



Route::get('/service', function () {
    return view('service');
})->middleware('loginmiddle');


Route::get('/new_dose', function () {
    return view('new_dose');
});
Route::get('/new_test', function () {
    return view('new_test');
});
Route::get('/contact_doc', function () {
    return view('contact_doc');
});

Route::get('/forgetSendMail', [ForgetPassController::class, 'showForgetSendMail']);
Route::post('/sendmailForget', [ForgetPassController::class, 'sendMailForgetPass']);

Route::get('/resetPass' , [ForgetPassController::class, 'showResetPass']);
Route::post('/resetPass' , [ForgetPassController::class, 'resetPassword']);

Route::get('/admin_doc_data', [adminController::class, 'admin_doc_data'])->middleware('loginmiddle');
Route::get('/admin_doc_msg', [adminController::class, 'admin_doc_msg'])->middleware('loginmiddle');
Route::get('/admin_dose_data', [adminController::class, 'admin_dose_data'])->middleware('loginmiddle');
Route::get('/admin_test_data', [adminController::class, 'admin_test_data'])->middleware('loginmiddle');
