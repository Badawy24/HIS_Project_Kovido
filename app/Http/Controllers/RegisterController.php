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

    public function registration(Request $request){
       /* $request->validate([
            'pat_fname'=>'requird|string',
            'pat_lname'=>'requird|string',
            'pat_SSN'=>'required',
            'patient_password'=>'requird|min:3|max:5',
            'pat_email'=>'requird|email|unique',
            'pat_address'=>'requird|string',
            'pat_phone'=>'requird|string',
            'pat_age'=>'requird',
            //'pat_sex'=>'requird',
            'pat_DOF'=>'requird',
        ]);*/

        $date = $request->pat_BOF;

        $requestDate = "$date" ;

        $user = DB::insert('insert into patient(pat_fname,pat_lname,pat_SSN,patient_password,pat_email,pat_address,pat_phone,pat_age,pat_DOF)
        values(?,?,?,?,?,?,?,?,?)',[$request->pat_fname,$request->pat_lname,$request->pat_SSN,$request->patient_password,$request->pat_email,$request->pat_address,$request->pat_phone,$request->pat_age,$requestDate]);
        if($user){
            $success=true;
            return back()->with('success', 'You have registered successfully');
        }

        else{
            $success=false;
            return back()->with('fail', 'Something wrong');
        }


    }
}

// Route::post('/register-user', [UserAuthController::class, 'registration'])->name('register-user');
