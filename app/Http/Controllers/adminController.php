<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function admin_dashbord()
    {
        return view('admin.admin-dashbord');
    }
    public function admin_doc_data()
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

    public function delete_doc($doc_id)
    {
        $delete_doc = DB::delete('delete from doctor where doc_id = ?', [$doc_id]);
        if ($delete_doc) {
            $doctors = DB::select('select * from doctor');
            if ($doctors) {
                session(['doctors' => $doctors]);
                return redirect('admin_doc_data');
            } else {
                session(['doctors' => '']);
                return redirect('admin_doc_data');
            }
        } else {
            return view('admin.admin_doc_data')->with('error_msg', 'Can\'t Delete This Doctor');
        }
    }

    public function show_admin_add_doc_form()
    {
        return view('admin.admin_add_doc');
    }
    public function admin_add_doc(Request $request)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:doctor',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password',
            'phone' => 'required|size:11',
            'age' => 'required',
        ]);

        $doctor = DB::insert(
            'insert into doctor(
            doc_fname,
            doc_lname,
            doc_phone,
            doc_email,
            doc_sex,
            doc_age,
            doc_pass)
            values(?,?,?,?,?,?,?)',
            [
                $request->f_name,
                $request->l_name,
                $request->phone,
                $request->email,
                $request->gender,
                $request->age,
                $request->password,
            ]
        );

        if ($doctor) {
            return back()->with('success', 'Doctor Added successfully');
        } else {
            return back()->with('fail', 'Something Wrong');
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
    public function admin_doc_msg(Request $request)
    {
        $email = $request->get('doc_mail');
        $doc_id = DB::select('select doc_id from doctor where doc_email = ?', [$email]);
        $doc_msg = DB::select('select * from doc_pat where doc_id = ?', [$doc_id[0]->doc_id]);
        if ($doc_msg) {
            // sendsession(['doc_msg' => $doc_msg, 'doc_email' => $email]);
            return redirect()->back()->with('doc_msg', $doc_msg)->with('doc_email', $email);
        } else {
            //session(['msg' => 'There is No Message For This Doctor!']);
            return redirect()->back()->with('message', 'There is No Message For This Doctor!');
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
            return view('admin.admin_dose_data')->with('message', 'There is No Dose In This Date!');
        }
    }
    public function show_admin_test_data()
    {

        $pat_name = DB::select('select * from patient');
        session(['pat_name' => $pat_name]);
        if ($pat_name) {
            return view('admin.admin_test_data');
        }
    }
    public function admin_test_data(Request $request)
    {
        $pat_id = $request->get('pat_id');
        $tests = DB::select('select * from test_patient where pat_id = ?', [$pat_id]);
        if ($tests) {
            // sendsession(['doc_msg' => $doc_msg, 'doc_email' => $email]);
            return redirect()->back()->with('tests', $tests);
        } else {
            //session(['msg' => 'There is No Message For This Doctor!']);
            return redirect()->back()->with('message', 'There is No Tests For This Patient!');
        }
    }
}
