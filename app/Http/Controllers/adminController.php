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
        if($doctors) {
            session(['doctors' => $doctors]);
            return view('admin.admin_doc_data');
        } else {
            session(['msg' => 'There is No Doctor In This System!']);
            return view('admin.admin_doc_data');
        }
    }
    public function admin_doc_msg()
    {
        return view('admin.admin_doc_msg');
    }

    public function admin_dose_data()
    {
        return view('admin.admin_dose_data');
    }
    public function admin_test_data()
    {
        return view('admin.admin_test_data');
    }


}
