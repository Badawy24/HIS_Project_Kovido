<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function admin_doc_data(Request $request)
    {
        $doctors = DB::select('select * from doctor');
        if ($doctors) {
            session(['doctors' => $doctors]);
            return view('admin.admin_doc_data');
        } else {
            session(['msg' => 'There is No Doctor In This System!']);
            return view('admin.admin_doc_data');
        }
    }
    public function Show_admin_doc_msg()
    {
        $doc_name = DB::select('select * from doctor');
        session(['doc_name' => $doc_name]);
        if ($doc_name) {
            return view('admin.admin_doc_msg');
        }
    }
    public function admin_doc_msg(Request $request){
        $email = $request->get('doc_mail');
        $doc_id = DB::select('select doc_id from doctor where doc_email = ?',[$email]);
        $doc_msg = DB::select('select * from doc_pat where doc_id = ?', [$doc_id[0]->doc_id]);
        if ($doc_msg) {
            // sendsession(['doc_msg' => $doc_msg, 'doc_email' => $email]);
            return redirect()->back()->with('doc_msg', $doc_msg)->with('doc_email' , $email);
        } else {
            //session(['msg' => 'There is No Message For This Doctor!']);
            return redirect()->back()->with('message' , 'There is No Message For This Doctor!');
            
        }
    }

    public function admin_dose_data()
    {
        $dose_data = DB::select('select * from Dose_patient ORDER BY pat_dose_date DESC');
        if ($dose_data) {
            // sendsession(['doc_msg' => $doc_msg, 'doc_email' => $email]);
            session(['dose_data' => $dose_data]);
            return view('admin.admin_dose_data');
        } else {
            //session(['msg' => 'There is No Message For This Doctor!']);
            return view('admin.admin_dose_data')->with('message' , 'There is No Dose In This Date!');
            
        }
        
    }
    public function admin_test_data()
    {
        return view('admin.admin_test_data');
    }
}
