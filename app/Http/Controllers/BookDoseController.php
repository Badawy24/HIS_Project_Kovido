<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BookDoseController extends Controller
{
    public function dose()
    {

        // $check = DB::select('select * from Dose_patient where pat_id = ?', [session('user_id')]);

        $dose_id = DB::select('select * from Dose_patient where pat_id = ?', [session('user_id')]);

        if ($dose_id) {
            $dose_name = DB::select('select * from dose where dose_id = ?', [$dose_id[0]->dose_id]);
            $hecs_name = DB::select('select * from healthcare_center where hc_id = ? ', [$dose_id[0]->dose_patient_health]);
            return view('alreadyBooked')->with(['appo' => $dose_id[0], 'hecs' => $hecs_name[0], 'dose' => $dose_name[0]]);
        } else {
            $dose_name = DB::select('select * from dose');
            $hecs_name = DB::select('select * from healthcare_center');
            return view('new_dose')->with(['doses' => $dose_name, 'hecs' => $hecs_name]);
        }
        // $dose_name = DB::select('select * from dose where dose_id = ?', [$dose_id[0]->dose_id]);

        // // $hecs_id = DB::select('select * from Dose_patient where pat_id = ? ', [session('user_id')]);

        // $hecs_name = DB::select('select * from healthcare_center where hc_id = ? ', [$dose_id[0]->dose_patient_health]);

        // if ($dose_id)
        //     return view('alreadyBooked')->with(['appo' => $dose_id[0], 'hecs' => $hecs_name[0], 'dose' => $dose_name[0]]);
        // else
        //     return view('new_dose')->with(['doses' => $dose_name, 'hecs' => $hecs_name[0]]);
    }

    public function bookDose(Request $request)
    {

        $request->validate([
            'dose' => 'required',
            'center' => 'required',
            'dose_date' => 'required',
            'dose_time' => 'required'
        ]);

        $pat_id = session('user_id');

        $pat = DB::select('select * from patient where pat_id = ?', [$pat_id]);

        $book = DB::insert('insert into Dose_patient (dose_id, pat_id, pat_dose_date, pat_dose_time ,dose_patient_health) values (?,?,?,?,?)', [$request->dose, $pat_id, $request->dose_date, $request->dose_time, $request->center]);


        if ($book) {
            return redirect()->back()->with('success', 'Booked Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Check Your Internet Connection');
        }
    }
}