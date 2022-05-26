<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BookDoseController extends Controller
{
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