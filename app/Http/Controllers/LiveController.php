<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveController extends Controller
{
    public function showAvilableAppo()
    {
        $doctors = DB::select('select * from doctor');
        return view('meeting.live')->with(['doctors' => $doctors]);
    }
    public function confirm_con($doc_id)
    {
        $pat_id = session('user_id');

        $doctor = DB::select('select * from doctor where doc_id = ?', [$doc_id]);
        $patient = DB::select('select * from patient where pat_id = ?', [$pat_id]);

        return view('meeting.confirm')->with(['patient' => $patient[0], 'doctor' => $doctor[0]]);
    }
}