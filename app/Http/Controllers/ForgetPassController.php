<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgetPassController extends Controller
{
    public function showForgetSendMail(){
        return view('forget-send-mail');
    }
    public function sendMailForgetPass(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $email = $request->get('email');
        if ($this->checkInternet()) {
            $mail_data = [
                'receiver' => $email,
                'fromEmail' => 'abdelrahman.ahmed2410@gmail.com',
                'subject' => 'Reset Your Password',
                'body' => 'http://127.0.0.1:8000/resetPass'
            ];
            Mail::send('email-forget-pass-temp', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['receiver'])
                    ->from($mail_data['fromEmail'])
                    ->subject($mail_data['subject']);
            });
            return redirect()->back()->with('success', 'Check Your Mail');
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

    public function showResetPass(){
        return view('forget-reset-pass');
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'password_confirmation'=>'required_with:password|same:password'
        ]);
        $email = $request->get('email');
        $password = $request->get('password');
        $users = DB::select('select * from patient where pat_email = ? ', [$email]);
        if($users){
            DB::update('update patient set patient_password = ?', [$password]);
            return redirect()->back()->with('success', 'Password Changed Successfuly You Can Login Know');
        } else {
            return back()->with('error', "Invalied Email");
        }
    }
}
