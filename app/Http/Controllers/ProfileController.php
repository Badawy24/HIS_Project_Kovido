<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getData()
    {
        $pat_id = session('user_id');
        $patient = DB::select('select * from patient where pat_id = ?', [$pat_id]);
        return view('profile')->with('patients', $patient);
    }
    public function getEditData()
    {
        $pat_id = session('user_id');
        $patient = DB::select('select * from patient where pat_id = ?', [$pat_id]);
        return view('Editprofile')->with('patients', $patient);
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'pat_email' => 'required|email',
            'pat_address' => 'required',
            'pat_phone' => 'required|size:11',
            'birthday' => 'required',
        ]);
        $age = Carbon::parse($request->birthday)->diff(Carbon::now())->y;

        $pat_id = session('user_id');
        DB::update('update patient set pat_email = ?, pat_address =? , pat_phone =? , pat_DOF = ? , pat_age = ? where pat_id = ?', [$request->pat_email, $request->pat_address, $request->pat_phone, $request->birthday, $age, $pat_id]);
        $patient = DB::select('select * from patient where pat_id = ?', [$pat_id]);
        return redirect('profile')->with(['patients' => $patient, 'success' => 'Your Data Updated']);
    }

    public function change_pass_form($pat_id)
    {
        $patient_id = $pat_id;
        return view('change_pass_patient')->with('pat_id', $patient_id);
    }

    public function change_pass(Request $request, $pat_id)
    {
        $request->validate([
            'old_pass' => 'required',
        ]);
        $old_password =DB::select('select patient_password from patient where pat_id = ?', [$pat_id]);
        if(Hash::check($request->old_pass, $old_password[0]->patient_password)){
            $request->validate([
                'new_pass' => 'required|min:8',
                'password_confirmation' => 'required_with:new_pass|same:new_pass',
            ]);
            $password = Hash::make($request->new_pass);
            $reset = DB::update('update patient set patient_password = ?', [$password]);
            if($reset){
                return redirect('change_pass_patient\\'. $pat_id)->with('success', 'Password Reset Succesfully');
            } else{
                return redirect('change_pass_patient\\'. $pat_id)->with('fail', 'Something Wrong');
            }
        } else {
            return redirect('change_pass_patient\\'. $pat_id)->with('not_same', 'Password Can\'t match Old Password');
        }
            
    }
}
