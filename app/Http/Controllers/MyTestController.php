<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MyTestController extends Controller
{


    public function mytest_display()
    {
        $my_tests = $this->getalltest();
        return view('my_tests')->with('my_tests',$my_tests);
    }
    public function getalltest()
    {
        $cur_user=session('user_id');
        $users = DB::table('test_patient')
            ->join('test', 'test_patient.test_id', '=', 'test.test_id')
            ->join('healthcare_center', 'test_patient.test_patient_health', '=', 'healthcare_center.hc_id')
            ->select('test_patient.res_id','test.test_name', 'test_patient.pat_test_date', 'test_patient.pat_test_time','healthcare_center.hc_name')
            ->where('test_patient.pat_id','=',session('user_id'))
            ->orderBy('test_patient.pat_test_date', 'desc')
            ->get();
        return $users;
    }
    public function delete($res_id)
    {
        $check=DB::table('test_patient')->where('res_id', $res_id)->delete();
        if ($check)
        {

            return redirect('my_tests')->with('success', 'Reservation Successfully Deleted' );
        }
        else
        {
            return redirect('my_tests')->with('fail', 'Something wrong');
        }
    }
    // public function get_tests($user_id)
    // {
    //     $all_tests=$this->get_all_tests();
    //     foreach ($all_tests as $test)
    //     {
    //         if ($test['pat_id'] == $user_id)
    //         {
    //             return $test;
    //         }
    //     }
    // }

    // private function get_all_tests()
    // {
    //     $tests=DB::select('select * from test_patient where pat_id = ? ', session('user_id'));
    //     return $tests;
    // }
}
