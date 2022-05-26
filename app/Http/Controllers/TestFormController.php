<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestFormController extends Controller
{
    public function new_test_display()
    {
        $tests_list=$this->grt_tests_names();
        $hc_list=$this->grt_hc_names();
        //return view('new_test',);
        return view('new_test')->with('tests_list',$tests_list)->with('hc_list',$hc_list);
    }

    public function grt_tests_names()
    {
        $t_names=DB::select('select * from test');
        return $t_names;
    }

    public function grt_hc_names()
    {
        $hc_names=DB::select('select * from healthcare_center');
        return $hc_names;
    }

    public function new_test(request $request)
    {

        $request->validate
        ([
            'test_name' => 'required',
            'health_cc' => 'required',
            'test_date' => 'required',
            'test_time' => 'required'
        ]);

        
        $test = DB::select('select * from test where test_name = ? ', [$request->test_name]);
        $hcc = DB::select('select * from healthcare_center where hc_name = ? ', [$request->health_cc]);
        $patient_id = session('user_id');

        $prev_test = DB::select('select * from test_patient where pat_id= ? ', [session('user_id')]);

        //return $prev_test;
        $rebeated = 0;
        foreach ($prev_test as $test_case)
        {
            if (($test_case->test_id == $test[0]->test_id) && ($test_case->test_patient_health == $hcc[0]->hc_id) && ($test_case->pat_test_date == $request->test_date)) 
            {
                $rebeated += 1;
            }
        }
        //return $rebeated;
        if ($rebeated <  1) 
        {
            if ($hcc && $test )//&&  $patient_id)
            {
                $test_re = DB::insert('insert into test_patient (pat_id,test_id,pat_test_date,pat_test_time,test_patient_health)
                values(?,?,?,?,?)', [$patient_id, $test[0]->test_id, $request->test_date, $request->test_time, $hcc[0]->hc_id]);
            } 
            else 
            {
                return $request;//'no such records';
            }
        }
        else
        {
            return back()->with('fail', 'You have a reservation with the same data');
        }
        // if ($hcc && $test &&  $patient_id) {
        //     $test_re = DB::insert('insert into test_patient (pat_id,test_id,pat_test_date,pat_test_time,test_patient_health)
        //     values(?,?,?,?,?)', [$patient_id, $test[0]->test_id, $request->test_date, $request->test_time, $hcc[0]->hc_id]);
        // } else 
        // {
        // }

        if ($test_re) 
        {

            return redirect('my_tests')->with('success', 'You have successfully reserved a ' . $request->test_name . ' test on ' . $request->test_date . ' at ' . $request->test_time);
        } 
        else 
        {
            return redirect('my_tests')->with('fail', 'Something wrong');
        }
        

    }
    public function showdata($res_id)
    {
       $temp=DB::select('select * from test_patient where res_id = ? ', [$res_id]);
       $test = DB::select('select * from test where test_id = ? ', [$temp[0]->test_id]);
       $hcc = DB::select('select * from healthcare_center where hc_id = ? ', [$temp[0]->test_patient_health]);
       $my_date=$temp[0]->pat_test_date;
       $my_time=$temp[0]->pat_test_time;
       $my_test=$test[0]->test_name;
       $my_hcc=$hcc[0]->hc_name;

       //to display option from database
       $tests_list=$this->grt_tests_names();
       $hc_list=$this->grt_hc_names();
        //return view('new_test',);
       //return $my_date and $my_time and $my_test and $my_hcc;
       return view('update_test')->with('my_test',$my_test)->with('my_date',$my_date)->with('my_time',$my_time)->with('my_hcc',$my_hcc)
             ->with('tests_list',$tests_list)->with('hc_list',$hc_list)->with('res_id',$res_id);

    }

    public function update_data(request $request)
    {
        //$test_id = DB::select('select test_id from test where test_name = ? ', [$request->test_name]);
        //$hcc_id= DB::select('select hc_id from healthcare_center where hc_name = ? ', [$request->health_cc]);
        //$res=DB::select('select * from  test_patient where res_id = ? ', [$request->res_id]);
        $check=DB::table('test_patient')
            ->where('res_id', $request->res_id)
            ->update(['pat_test_date'=>$request->test_date, 'pat_test_time'=> $request->test_time]);
       
       
        // DB::table('test_patient')
        //       ->where('res_id', $request->res_id)
        //       ->update(['test_id' => $test_id, 'pat_test_date'=>$request->test_date, 'pat_test_time'=> $request->test_time, 'test_patient_health'=>$hcc_id]);


        // $res[0]->test_id=$test_id;
        // $res[0]->pat_test_date=$request->test_date;
        // $res[0]->pat_test_time=$request->test_time;
        // $res[0]->test_patient_health=$hcc_id;
        // $res[0]->save();
        if ($check) 
        {

            return redirect('my_tests')->with('success', 'Reservation Data Successfully Updated' );
        } 
        else 
        {
            return redirect('m_tests')->with('fail', 'Something wrong');
        }

    }
}
