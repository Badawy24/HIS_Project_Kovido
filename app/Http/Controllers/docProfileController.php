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
}
