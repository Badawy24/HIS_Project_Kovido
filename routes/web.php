<?php

use App\Http\Controllers\HomeController;
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



Route::get('/forget-password', [HomeController::class,'mail']);
