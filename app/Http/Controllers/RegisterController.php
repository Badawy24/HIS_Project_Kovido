<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function registration(Request $request)
    {
        $doc = DB::select('select * from doctor where doc_email = ?', [$request->pat_email]);
        if ($doc) {
            return back()->with('fail', 'Email Was Registered in Doctor Data');
        } else {
            $request->validate([
                'pat_fname' => 'required',
                'pat_lname' => 'required',
                'pat_SSN' => 'required|size:14|unique:patient',
                'pat_email' => 'required|email|unique:patient',
                'p_pass' => 'required|min:8',
                'password_confirmation' => 'required_with:p_pass|same:p_pass',
                'pat_address' => 'required',
                'pat_phone' => 'required|size:11',
                'pat_DOF' => 'required',
            ]);

            $age = Carbon::parse($request->pat_DOF)->diff(Carbon::now())->y;
            $password = Hash::make($request->p_pass);

            $user = DB::insert(
                'insert into patient(
                pat_fname,
                pat_lname,
                pat_SSN,
                pat_email,
                patient_password,
                pat_address,
                pat_phone,
                pat_age,
                pat_DOF)
            values(?,?,?,?,?,?,?,?,?)',
                [
                    $request->pat_fname,
                    $request->pat_lname,
                    $request->pat_SSN,
                    $request->pat_email,
                    $password,
                    $request->pat_address,
                    $request->pat_phone,
                    $age,
                    $request->pat_DOF,
                ]
            );

            if ($user) {
                session(['Logged_In' => True]);
                $user_id = DB::select('select pat_id from patient where pat_email = ?', [$request->pat_email]);
                session(['user_id' => $user_id[0]->pat_id]);
                return redirect('/profile');
            } else {
                return back()->with('fail', 'Something wrong');
            }
        }
    }
}
