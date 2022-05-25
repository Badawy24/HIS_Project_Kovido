<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Login_Controller extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->get('email');
        $password = $request->get('password');
        $users = DB::select('select * from patient where pat_email = ? and patient_password = ?', [$email, $password]);
        if ($users) {
            session(['Logged_In' => True]);
            session(['user_id' => $users[0]->pat_id]);
            return redirect('/service');
        } else if ($email == "admin@gmail.com" && $password == 'admin') {
            session(['adminLogin' => True]);
            return redirect('/admin_doc_data');
        } else {
            return back()->with(['cantLogin' => "Invalied Email or Password"]);
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
