<?php

use App\Http\Controllers\HomeController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});



Route::view('contact_us', 'contact_us')->name('contact_us');
Route::post('/send', 'App\Http\Controllers\ContactController@send')->name('send.email');
// Route::get('/contact_us', function () {
//     return view('contact_us');
// });
Route::get('/service', function () {
    return view('service');
});
Route::get('/new_dose', function () {
    return view('new_dose');
});
Route::get('/new_test', function () {
    return view('new_test');
});
Route::get('/contact_doc', function () {
    return view('contact_doc');
});

Route::get('/reset-password_api/{email}',function($pat_email){
    $email = $pat_email;
    return view('reset_passpword_api',['email' => $email]);
});

Route::post('/submit-new-passord-api',function(){
    $email = request('email');
    $password = request('password');
    //return "$email and $password";
    //$result = DB::select('select * from patient where pat_email = ?',[$email]);
    //$result = DB::update('update patient set patient_password = ? where pat_email = ?',[$password,$email]);
    $result = DB::update('update patient set patient_password = ?',[$password,$email]);

    return $result;

});


