<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'pat_phone' => 'required|min:11|max:11',
            'birthday' => 'required',
        ]);
        $age = Carbon::parse($request->birthday)->diff(Carbon::now())->y;

        $pat_id = session('user_id');
        DB::update('update patient set pat_email = ?, pat_address =? , pat_phone =? , pat_DOF = ? , pat_age = ? where pat_id = ?', [$request->pat_email, $request->pat_address, $request->pat_phone, $request->birthday, $age, $pat_id]);
        $patient = DB::select('select * from patient where pat_id = ?', [$pat_id]);
        return redirect('profile')->with(['patients' => $patient, 'success' => 'Your Data Updated']);
    }
}