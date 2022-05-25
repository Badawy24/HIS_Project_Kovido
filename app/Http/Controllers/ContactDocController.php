<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Login_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactDocController extends Controller
{
    public function sendDoc(Request $request)
    {
        $request->validate([
            'doc_name' => 'required',
            'subj' => 'required',
            'msg' => 'required',
        ]);

        $pat_id = session('user_id');
        $pat = DB::select('select * from patient where pat_id = ?', [$pat_id]);
        $doc = DB::select('select * from doctor where doc_email = ?', [$request->doc_name]);

        DB::insert('insert into doc_pat (pat_id,doc_id,message) values (?,?,?)', [$pat_id, $doc[0]->doc_id, $request->msg]);


        if ($this->checkInternet()) {
            $mail_data = [
                'receiver' => $request->doc_name,
                // abdelrahman.ahmed2410@gmail.com
                // tahatalattaha95@gmail.com
                // aya55osma2001@gmail.com
                // mm4797349@gmail.com
                // ahmedhosny6688@gmail.com
                //
                'doc_name' => $doc[0]->doc_fname,
                'fromEmail' => $pat[0]->pat_email,
                'fromName' => $pat[0]->pat_fname . " " . $pat[0]->pat_lname,
                'fromPhone' => $pat[0]->pat_phone,
                'subject' => $request->subj,
                'body' => $request->msg
            ];

            Mail::send('email-temp-contact-doctor', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['receiver'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
            });





            return redirect()->back()->with('success', 'Email Send Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Check Your Internet Connection');
        }
    }

    public function checkInternet($site = "https://google.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}