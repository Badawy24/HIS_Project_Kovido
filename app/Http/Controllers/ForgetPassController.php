<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPassController extends Controller
{
    public function checkInternet($site = "https://google.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }

    public function forgetSendMail(Request $request)
    {
        $confirm_num = rand();
        $hash_code = Hash::make($confirm_num);
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->email;
        $users = DB::select('select * from patient where pat_email = ? ', [$email]);
        if ($this->checkInternet()) {
            if ($users) {
                $mail_data = [
                    'receiver' => $email,
                    'fromEmail' => 'abdelrahman.ahmed2410@gmail.com',
                    'subject' => 'Reset Your Password',
                    'body' => $confirm_num,
                ];
                Mail::send('email-forget-pass-temp', $mail_data, function ($message) use ($mail_data) {
                    $message->to($mail_data['receiver'])
                        ->from($mail_data['fromEmail'])
                        ->subject($mail_data['subject']);
                });

                return redirect('/resetpass')->with([
                    'success' => 'Check Your Mail',
                    'confirm_num' => $confirm_num,
                    'hasing_num' => $hash_code,
                    'email' => $email,
                ]);
            } else {
                return redirect()->back()->withInput()->with('error', 'Email is Invaild');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Check Your Internet Connection');
        }
    }

    public function showResetPassword()
    {
        return view('forget-reset');
    }
    public function ResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password',
            'code' => 'required',
        ]);
        $password = Hash::make($request->password);
        if (Hash::check($request->code, $request->hash_num)) {
            DB::update('update patient set patient_password = ? where pat_email = ?', [$password, $request->email]);
            return redirect('/login')->with('updated', 'Password Changed Successfuly You Can Login Now');
        } else {
            return view('forget-send-mail')->with('error', 'Check Code In Your Email!');
        }
    }
}