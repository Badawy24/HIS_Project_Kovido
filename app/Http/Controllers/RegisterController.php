<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use app\http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;


class RegisterController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function registration(Request $request)
    {
        $request->validate([
            'pat_fname' => 'required',
            'pat_lname' => 'required',
            'pat_SSN' => 'required',
            'p_pass' => 'required',
            'pat_email' => 'required|email|unique:patient',
            'password_confirmation' => 'required_with:p_pass|same:p_pass',
            'pat_age' => 'required',
            'pat_address' => 'required',
            'pat_phone' => 'required',
            'pat_DOB' => 'required',
        ]);

        $date = $request->pat_BOF;

        $requestDate = "$date";

        $user = DB::insert('insert into patient(pat_fname,pat_lname,pat_SSN,patient_password,pat_email,pat_address,pat_phone,pat_age,pat_DOF)
        values(?,?,?,?,?,?,?,?,?)', [$request->pat_fname, $request->pat_lname, $request->pat_SSN, $request->patient_password, $request->pat_email, $request->pat_address, $request->pat_phone, $request->pat_age, $requestDate]);
        if ($user) {
                        // $success = true;
                        // return back()->with('success', 'You have registered successfully');
                    session(['Logged_In' => True]);
                    $user_id = DB::select('select pat_id from patient where pat_email = ?', [$request->pat_email]);
                    session(['user_id' => $user_id[0]->pat_id]);
                    return redirect('/service');
                    // return "yes";
                    // return back()->with('success', session('user_id'));
                    }

                    else {
                        
                        return back()->with('fail', 'Something wrong');
                    //return "no";
                    //return back()->with('fail', 'Something wrong');
                    }
    }
}

// Route::post('/register-user', [UserAuthController::class, 'registration'])->name('register-user');


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// // use app\http\Controllers\Controller;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Support\Facades\DB;


// class RegisterController extends BaseController
// {
//     use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//     public function registration(Request $request)
//     {
//         $request->validate([
//             'pat_fname' => 'required|string',
//             'pat_lname' => 'required|string',
//             'pat_SSN' => 'required',
//             'patient_password' => 'required|min:3|max:5',
//             'password_confirmation' => 'required_with:patient_password|same:patient_password',
//             'pat_email' => 'required|email|unique:patient',
//             'pat_address' => 'required|string',
//             'pat_phone' => 'required',
//             'pat_age' => 'required',
//             'pat_sex' => 'required',
//             'pat_DOF' => 'required',
//         ]);

//         $date = $request->pat_BOF;

//         $requestDate = "$date";

//         $user = DB::insert('insert into patient(pat_fname,pat_lname,pat_SSN,patient_password,pat_email,pat_address,pat_phone,pat_age,pat_DOF)
//         values(?,?,?,?,?,?,?,?,?)', [$request->pat_fname, $request->pat_lname, $request->pat_SSN, $request->patient_password, $request->pat_email, $request->pat_address, $request->pat_phone, $request->pat_age, $requestDate]);
//         if ($user) {
//             $success = true;
//             return back()->with('success', 'You have registered successfully');
//         } else {
//             $success = false;
//             return back()->with('fail', 'Something wrong');
//         }
//     }
// }
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// // use app\http\Controllers\Controller;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;


// class RegisterController extends Controller
// {
//     public function registration(Request $request)
//     {
//         $request->validate([
//             'pat_fname' => 'required|string',
//             'pat_lname' => 'required|string',
//             'pat_SSN' => 'required',
//             'patient_password' => 'required|min:3|max:5',
//             'password_confirmation' => 'required_with:patient_password|same:patient_password',
//             'pat_email' => 'required|email|unique:patient',
//             'pat_address' => 'required|string',
//             'pat_phone' => 'required',
//             'pat_age' => 'required',
//             'pat_sex' => 'required',
//             'pat_DOF' => 'required',
//         ]);

//         $date = $request->pat_BOF;

//         $requestDate = "$date";

//         $user = DB::insert('insert into patient(pat_fname,pat_lname,pat_SSN,patient_password,pat_email,pat_address,pat_phone,pat_age,pat_DOF)
//         values(?,?,?,?,?,?,?,?,?)', [$request->pat_fname, $request->pat_lname, $request->pat_SSN, $request->patient_password, $request->pat_email, $request->pat_address, $request->pat_phone, $request->pat_age, $requestDate]);

//         if ($user) {
//             $success = true;
//             return back()->with('success', 'You have registered successfully');
//         // session(['Logged_In' => True]);
//         // $user_id = DB::select('select pat_id from patient where pat_email = ?', [$request->pat_email]);
//         // session(['user_id' => $user_id[0]->pat_id]);
//         // return redirect('/service');
//         //return "yes";
//         //return back()->with('success', session('user_id'));
//         }

//         else {
//             $success = false;
//             return back()->with('fail', 'Something wrong');
//         //return "no";
//         //return back()->with('fail', 'Something wrong');
//         }


//     }
// }

// Route::post('/register-user', [UserAuthController::class, 'registration'])->name('register-user'); -->