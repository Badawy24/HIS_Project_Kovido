<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $doc_users = DB::select('select * from doctor where doc_email = ?', [$email]);
        $users = DB::select('select * from patient where pat_email = ?', [$email]);
        if ($users) {
            if (Hash::check($request->password, $users[0]->patient_password)) {
                session(['Logged_In' => True]);
                session(['user_id' => $users[0]->pat_id]);
                return redirect('/profile');
            } else {
                return back()->with(['cantLogin' => "Invalied Email or Password"]);
            }
        } else if ($doc_users) {
            if (Hash::check($request->password, $doc_users[0]->doc_pass)) {
                session(['doc_Logged_In' => True]);
                session(['doc_user_id' => $doc_users[0]->doc_id]);
                return redirect('/doc_profile');
            } else {
                return back()->with(['cantLogin' => "Invalied Email or Password"]);
            }
        } else if ($email == "admin@gmail.com" && $password == 'admin') {
            session(['adminLogin' => True]);
            return redirect('/admin-dashbord');
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