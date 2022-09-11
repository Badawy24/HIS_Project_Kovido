<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class docProfileController extends Controller
{
    public function docProfile()
    {
        $doc_id = session('doc_user_id');
        $doctor = DB::select('select * from doctor where doc_id = ?', [$doc_id]);
        return view('doc_profile')->with('doctor', $doctor);
    }

    public function saveReply(Request $request, $msg_id)
    {
        $request->validate([
            'reply' => 'required'
        ]);
        DB::update('update doc_pat set reply = ? where msg_id = ?', [$request->reply, $msg_id]);
        return redirect('doc_profile')->with(['success' => 'Your Data Updated']);
    }

    public function doc_profile_msg(){
        $doc_id = session('doc_user_id');
        $doctor = DB::select('select * from doctor where doc_id = ?', [$doc_id]);
        return view('doc_profile_msg')->with('doctor', $doctor);
    }

    public function get_edit_profile_data() {
        $doc_id = session('doc_user_id');
        $doctor = DB::select('select * from doctor where doc_id = ?', [$doc_id]);
        return view('edit_profile_doc')->with('doctor', $doctor);
    }

    public function edit_profile_doc_data(Request $request){
        $request->validate([
            'doc_email' => 'required|unique:doctor',
            'doc_phone' => 'required|size:11',
        ]);
        $doc_id = session('doc_user_id');
        $update = DB::update('update doctor set doc_email = ?, doc_phone =? where doc_id = ?', [$request->doc_email, $request->doc_phone, $doc_id]);
        if ($update){
            $doctor = DB::select('select * from doctor where doc_id = ?', [$doc_id]);
            return redirect('doc_profile')->with(['doctor' => $doctor, 'success' => 'Your Data Updated']);
        } else {
            $doctor = DB::select('select * from doctor where doc_id = ?', [$doc_id]);
            return redirect('doc_profile')->with(['doctor' => $doctor, 'fail' => 'Something Wrong']);
        }
        
    }
}
