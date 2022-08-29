<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subj' => 'required',
            'msg' => 'required',
        ]);

        if ($this->checkInternet()) {
            $mail_data = [
                'receiver' => 'abdelrahman.ahmed2410@gmail.com',
                // abdelrahman.ahmed2410@gmail.com
                // tahatalattaha95@gmail.com
                // aya55osma2001@gmail.com
                // mm4797349@gmail.com
                // ahmedhosny6688@gmail.com
                //

                'fromEmail' => $request->email,
                'fromName' => $request->name,
                'fromPhone' => $request->phone,
                'subject' => $request->subj,
                'body' => $request->msg
            ];

            Mail::send('email-temp', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['receiver'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
            });

            return redirect()->back()->with('success', 'Send Email Successfully');
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
