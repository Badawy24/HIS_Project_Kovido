<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class adminController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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



    public function update_doc($doc_id)
    {
        $id_doc = $doc_id;
        $doctor_data = DB::select('select * from doctor where doc_id = ?', [$id_doc]);
        return view('admin.admin_doc_data_update')->with('doctor', $doctor_data[0]);
    }

    public function update_doc_data(Request $request, $doc_id)
    {
        $update_data = DB::update(
            'update doctor set
            doc_phone = ?,
            doc_email = ?,
            doc_pass = ? where doc_id = ?',
            [
                $request->doc_phone,
                $request->doc_email,
                $request->doc_pass,
                $doc_id,
            ]
        );
        if ($update_data) {
            return redirect('/admin_doc_data');
        } else {
            return redirect()->back()->with('fail', 'Something Wrong');
        }
    }



    public function show_admin_add_doc_form()
    {
        return view('admin.admin_add_doc');
    }
    public function admin_add_doc(Request $request)
    {
        $pat =  DB::select('select * from patient where pat_email = ?', [$request->email]);
        if ($pat) {
            return back()->with('fail', 'Email Was Registered in patient Data');
        } else {
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
            $password = Hash::make($request->password);

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
                    $password,
                ]
            );

            if ($doctor) {
                return back()->with('success', 'Doctor Added successfully');
            } else {
                return back()->with('fail', 'Something Wrong');
            }
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
        // $doc_name = DB::select('select * from doctor');
        // session(['doc_name' => $doc_name]);
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

    public function delete_msg($msg_id, $doc_id)
    {
        $delete_msg = DB::delete('delete from doc_pat where msg_id = ?', [$msg_id]);
        if ($delete_msg) {
            $doc_msg = DB::select('select * from doc_pat');
            $doc_email = DB::select('select doc_email from doctor where doc_id = ?', [$doc_id]);
            if ($doc_msg) {
                return redirect('admin_doc_msg')->with('doc_msg', $doc_msg)->with('doc_email', $doc_email);
            } else {
                return redirect('admin_doc_msg')->with('message', 'There is No Message For This Doctor!');
            }
        } else {
            return redirect()->back()->with('error_msg', 'Can\'t Delete This Message');
        }
    }



    // Start Functions Of Dose Reservation
    public function admin_dose_data()
    {
        $dose_data = DB::select('select Dose_patient.pat_dose_date, Dose_patient.pat_dose_time, Dose_patient.pat_id,
        patient.pat_fname, patient.pat_lname,
        dose.vaccine_name,
        healthcare_center.hc_name, healthcare_center.hc_address
        from Dose_patient
        inner join patient ON Dose_patient.pat_id = patient.pat_id
        inner join dose ON Dose_patient.dose_id = dose.dose_id
        inner join healthcare_center ON Dose_patient.dose_patient_health = healthcare_center.hc_id;');

        if ($dose_data) {
            session(['dose_data' => $dose_data]);
            return view('admin.admin_dose_data');
        } else {
            session(['message' => 'There is No Reservation In System!']);
            return view('admin.admin_dose_data');
        }
    }

    public function delete_dose($pat_id)
    {
        $delete_dose = DB::delete('delete from Dose_patient where pat_id = ?', [$pat_id]);
        if ($delete_dose) {
            $dose_data = DB::select('select * from Dose_patient');
            if ($dose_data) {
                session(['dose_data' => $dose_data]);
                return redirect('admin_dose_data');
            } else {
                session(['dose_data' => '']);
                return redirect('admin_dose_data');
            }
        } else {
            return view('admin.admin_dose_data')->with('error_msg', 'Can\'t Delete This Reservation');
        }
    }


    public function update_dose($pat_id)
    {
        $dose_data = DB::select('select Dose_patient.pat_dose_date, Dose_patient.pat_dose_time, Dose_patient.pat_id,
        patient.pat_fname, patient.pat_lname,
        dose.vaccine_name, dose.dose_id,
        healthcare_center.hc_name, healthcare_center.hc_address,healthcare_center.hc_id
        from Dose_patient
        inner join patient ON Dose_patient.pat_id = patient.pat_id
        inner join dose ON Dose_patient.dose_id = dose.dose_id
        inner join healthcare_center ON Dose_patient.dose_patient_health = healthcare_center.hc_id where Dose_patient.pat_id = ?', [$pat_id]);

        $doses = DB::select('select * from dose');
        $hec = DB::select('select * from healthcare_center');
        return view('admin.admin_update_dose_res')->with(
            [
                'dose_data' => $dose_data[0],
                'doses' => $doses,
                'hecs' => $hec,
            ]
        );
    }

    public function update_dose_data(Request $request)
    {
        DB::update(
            'update Dose_patient set
            dose_patient_health = ?,
            dose_id = ?,
            pat_dose_date = ?,
            pat_dose_time = ?
            where pat_id = ?',
            [
                $request->hc_name,
                $request->dose_name,
                $request->first_dose,
                $request->time_dose,
                $request->pat_id,
            ]
        );

        return redirect('/admin_dose_data');
    }

    public function admin_add_dose()
    {
        $dose_type = DB::select('select * from dose');
        session(['dose_type' => $dose_type]);
        return view('admin.admin_add_dose');
    }

    public function dose_add(Request $request)
    {
        $request->validate(['dose_name' => 'required']);
        $check = DB::select('select vaccine_name from dose where vaccine_name= ?', [$request->dose_name]);
        if ($check) {
            return redirect()->back()->with(['error' => 'This Vaccine Already Exists!']);
        } else {
            DB::insert('insert into dose (vaccine_name) values (?)', [$request->dose_name]);
            return redirect()->back()->with([
                'success' => 'Vaccine Added Successfuly',
            ]);
        }
    }

    public function del_data_dose($dose_id)
    {
        DB::delete('delete from dose where dose_id = ?', [$dose_id]);
        return redirect()->back()->with(['del' => 'Data Deleted Successfuly']);
    }
    // End Functions Of Dose Reservation






    public function admin_patient_show(Request $request)
    {
        $patientData = DB::select("select * from patient");
        session(['patientData' => $patientData]);
        return view('admin.patient_data_show');
    }

    public function admin_delete_patient(Request $request)
    {
        $patientId = $request->pat_id;
        DB::select("delete from patient where pat_id = ?", [$patientId]);
        return redirect()->back()->with('patient_deleted', "Patient {$patientId} deleted successfully");
    }

    public function adminAddPatient()
    {
        return view('admin.admin_add_patient');
    }

    public function show_update_patient($pat_id)
    {
        $pat_data = DB::select('select * from patient where pat_id = ?', [$pat_id]);
        return view('admin.admin_update_patient')->with(['pat' => $pat_data[0]]);
    }
    public function update_patient(Request $request, $pat_id)
    {
        $age = Carbon::parse($request->pat_DOF)->diff(Carbon::now())->y;

        DB::update(
            'update patient set
            pat_phone = ?,
            pat_email = ?,
            pat_address = ?,
            pat_DOF = ?,
            pat_age = ?
            where pat_id = ?',
            [
                $request->pat_phone,
                $request->pat_email,
                $request->pat_address,
                $request->pat_DOF,
                $age,
                $pat_id,
            ]
        );
        return redirect('/admin_patient_data_show')->with('updated', 'Patient Data Updated successfully');
    }

    public function admin_registration(Request $request)
    {

        $request->validate([
            'pat_fname' => 'required',
            'pat_lname' => 'required',
            'pat_SSN' => 'required',
            'p_pass' => 'required',
            'pat_email' => 'required|email|unique:patient',
            'password_confirmation' => 'required_with:p_pass|same:p_pass',
            'pat_address' => 'required',
            'pat_phone' => 'required',
            'pat_DOF' => 'required',
        ]);
        // return dd('aloo');

        $age = Carbon::parse($request->pat_DOF)->diff(Carbon::now())->y;

        $user = DB::insert(
            'insert into patient(
            pat_fname,
            pat_lname,
            pat_SSN,
            pat_email,
            patient_password,
            pat_address,
            pat_phone,
            pat_age,
            pat_DOF)
        values(?,?,?,?,?,?,?,?,?)',
            [
                $request->pat_fname,
                $request->pat_lname,
                $request->pat_SSN,
                $request->pat_email,
                $request->p_pass,
                $request->pat_address,
                $request->pat_phone,
                $age,
                $request->pat_DOF,
            ]
        );

        if ($user) {

            session(['added' => True]);

            $user_id = DB::select('select pat_id from patient where pat_email = ?', [$request->pat_email]);

            session(['user_id' => $user_id[0]->pat_id]);

            return redirect()->back()->with('a_i_msg', true);
        } else {
            return redirect()->back()->with('a_i_msg', false);
        }
    }








    //-----------------------------------------------------------------START ADMIN_TEST-----------------------------------------------------


    public function admin_all_tests()
    {

        $alltests = DB::table('test_patient')
            ->join('test', 'test_patient.test_id', '=', 'test.test_id')
            ->join('healthcare_center', 'test_patient.test_patient_health', '=', 'healthcare_center.hc_id')
            ->join('patient', 'test_patient.pat_id', '=', 'patient.pat_id')

            ->select(
                'test.test_name',
                'test_patient.res_id',
                'test_patient.pat_test_date',
                'test_patient.pat_test_time',
                'healthcare_center.hc_name',
                'healthcare_center.hc_address',
                'patient.pat_fname',
                'patient.pat_lname',
                'patient.pat_id'
            )

            ->orderBy('test_patient.pat_test_date', 'desc')
            ->get();

        if ($alltests) {
            session(['alltests' => $alltests]);
            return view('admin.admin_all_tests');
        } else {
            session(['message' => 'There is No Reservation In System!']);
            return view('admin.admin_all_tests');
        }
    }



    /*public function show_admin_test_data()
    {
        $pat_names = DB::select('select * from patient');

        if ($pat_names)
        {
            session(['pat_names' => $pat_names]);
            return view('admin.admin_test_data');
        }
    }*/


    /*public function admin_test_data(Request $request)
    {
        $pat_id = $request->get('pat_id');
        $pat_tests = DB::select('select * from test_patient where pat_id = ?', [$pat_id]);


        if ($pat_tests)
        {
           // session(['pat_tests' => $pat_tests]);
            //return view('admin.admin_test_data');
            return view('admin.admin_test_data')->with('pat_tests', $pat_tests);
        } else {
            session(['message' => 'There is No Reservation In System!']);
            return view('admin.admin_test_data');
        }
        //if ($tests) {
        // sendsession(['doc_msg' => $doc_msg, 'doc_email' => $email]);
        //return redirect()->back()->with('tests', $tests);
        //} else {
        //session(['msg' => 'There is No Message For This Doctor!']);
        //return redirect()->back()->with('message', 'There is No Tests For This Patient!');
        //}
    }*/



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



    public function admin_add_test()
    {
        return view('admin.admin_add_test');
    }




    public function admin_get_tests_names()
    {
        $tes_names = DB::select('select * from test');
        return view('admin.admin_existed_test')->with('tes_names', $tes_names);
    }

    public function admin_add_new_test_view()
    {
        $tes_names = DB::select('select * from test');
        return view('admin.admin_add_test_details')->with('tes_names', $tes_names);
    }



    public function admin_delete_test($test_id)
    {
        $delete_test = DB::delete('delete from test where test_id = ?', [$test_id]);
        if ($delete_test) {
            $tes_data = DB::select('select * from test');
            if ($tes_data) {
                session(['tes_data' => $tes_data]);
                return redirect('admin_existed_test');
            } else {
                session(['tes_data' => '']);
                return redirect('admin_existed_test');
            }
        } else {
            return view('admin.admin_existed_test')->with('error_msg', 'Can\'t Delete This Reservation');
        }
    }






    public function admin_add_new_test_details(request $request)
    {

        $request->validate([
            'test_name' => 'required',
        ]);


        $existed_tests = DB::select('select * from test');


        $rebeated = 0;
        foreach ($existed_tests as $test_case) {
            if ($test_case->test_name == $request->test_name) {
                $rebeated += 1;
            }
        }


        if ($rebeated <  1) {
            $test_re = DB::insert('insert into test (test_name)
            values(?)', [$request->test_name]);
        } else {
            return back()->with('fail', 'this test already exists');
        }


        // if ($hcc && $test &&  $patient_id) {
        //     $test_re = DB::insert('insert into test_patient (pat_id,test_id,pat_test_date,pat_test_time,test_patient_health)
        //     values(?,?,?,?,?)', [$patient_id, $test[0]->test_id, $request->test_date, $request->test_time, $hcc[0]->hc_id]);
        // } else
        // {
        // }

        if ($test_re) {

            return redirect('admin_existed_test')->with('success', 'You have successfully added a new test named ' . $request->test_name);
        } else {
            return redirect('admin_existed_test')->with('fail', 'Something wrong');
        }
    }




    public function admin_delete_test_res($res_id)
    {
        $delete_test_res = DB::delete('delete from test_patient where res_id = ?', [$res_id]);
        if ($delete_test_res) {
            $alltests = DB::select('select * from test_patient');
            if ($alltests) {
                session(['alltests' => $alltests]);
                return redirect('admin_all_tests');
            } else {
                session(['alltests' => '']);
                return redirect('admin_all_tests');
            }
        } else {
            return view('admin.admin_all_tests')->with('error_msg', 'Can\'t Delete This Reservation');
        }
    }




    public function test_resv_data($res_id)
    {
        /*$dose_data = DB::select('select Dose_patient.pat_dose_date, Dose_patient.pat_dose_time, Dose_patient.pat_id,
        patient.pat_fname, patient.pat_lname,
        dose.vaccine_name, dose.dose_id,
        healthcare_center.hc_name, healthcare_center.hc_address,healthcare_center.hc_id
        from Dose_patient
        inner join patient ON Dose_patient.pat_id = patient.pat_id
        inner join dose ON Dose_patient.dose_id = dose.dose_id
        inner join healthcare_center ON Dose_patient.dose_patient_health = healthcare_center.hc_id where Dose_patient.pat_id = ?', [$pat_id]);

        $doses = DB::select('select * from dose');
        $hec = DB::select('select * from healthcare_center');
        return view('admin.admin_update_dose_res')->with(
            [
                'dose_data' => $dose_data[0],
                'doses' => $doses,
                'hecs' => $hec,
            ]
        );*/


        $resv_tests = DB::table('test_patient')
            ->join('test', 'test_patient.test_id', '=', 'test.test_id')
            ->join('healthcare_center', 'test_patient.test_patient_health', '=', 'healthcare_center.hc_id')
            ->join('patient', 'test_patient.pat_id', '=', 'patient.pat_id')

            ->select(
                'test.test_name',
                'test.test_id',
                'test_patient.res_id',
                'test_patient.pat_test_date',
                'test_patient.pat_test_time',
                'healthcare_center.hc_name',
                'healthcare_center.hc_id',
                'healthcare_center.hc_address',
                'patient.pat_fname',
                'patient.pat_lname',
                'patient.pat_id'
            )
            ->where('test_patient.res_id', '=', $res_id)
            ->orderBy('test_patient.pat_test_date', 'desc')
            ->get();


        $alltes = DB::select('select * from test');
        $hecs = DB::select('select * from healthcare_center');
        return view('admin.admin_update_test_res')->with(
            [
                'resv_tests' => $resv_tests[0],
                'alltes' => $alltes,
                'hecs' => $hecs,
            ]
        );
    }

    public function update_testres_data(Request $request)
    {


        DB::update(
            'update test_patient set
                test_patient_health = ?,
                test_id = ?,
                pat_test_date = ?,
                pat_test_time = ?
                where res_id = ?',
            [
                $request->hc_name,
                $request->test_name,
                $request->test_date,
                $request->test_time,
                $request->res_id,
            ]
        );
        return redirect('/admin_all_tests');

        /*$checked=DB::table('test_patient')
                ->where('res_id', $request->res_id)
                ->update(['pat_test_date'=>$request->test_date, 'pat_test_time'=> $request->test_time, 'test_id'=> $request->test_name, 'test_patient_health'=> $request->hc_id]);

                if ($checked)
                {

                    return redirect('admin_all_tests')->with('success', 'Reservation Data Successfully Updated' );
                }
                else
                {
                    return "hello";
                }

            }*/
    }
    //---------------------------------------------------------------END ADMIN_TEST-------------------------------------------------------------







    /**Strat Live Consultation */
    public function admin_live()
    {
        $con_data = DB::select('select pat_consultation.*,
        patient.pat_fname, patient.pat_lname,
        doctor.doc_fname, doctor.doc_lname
        from pat_consultation
        inner join patient ON pat_consultation.pat_id = patient.pat_id
        inner join doctor ON pat_consultation.doc_id = doctor.doc_id');

        session(['con_data' => $con_data]);
        return view('admin.admin_live');
    }

    public function admin_add_consultation(Request $request)
    {
        $request->validate([
            'con_title' => 'required',
            'pat_id' => 'required',
            'doc_id' => 'required',
            'con_date' => 'required',
            'con_time' => 'required',
            'con_duration' => 'required',
        ]);
        $con = DB::insert(
            'insert into pat_consultation(
            con_title,
            con_date,
            con_duration,
            pat_id,
            doc_id,
            con_desc,
            con_time)
            values(?,?,?,?,?,?,?)',
            [
                $request->con_title,
                $request->con_date,
                $request->con_duration,
                $request->pat_id,
                $request->doc_id,
                $request->con_desc,
                $request->con_time,
            ]
        );
        if ($con) {
            return redirect('admin_live')->with('success', 'Data Added successfully');
        } else {
            return redirect('admin_live')->with('fail', 'Something Wrong');
        }
    }
    public function admin_live_meet()
    {
        $meet_data = DB::select('select meeting.*,
        doctor.doc_fname, doctor.doc_lname
        from meeting
        inner join doctor ON meeting.host_doc_id = doctor.doc_id');

        session(['meet_data' => $meet_data]);

        return view('admin.admin_live_meet');
    }
    public function admin_add_meet(Request $request)
    {
        $request->validate([
            'meet_duration' => 'required',
            'doc_id' => 'required',
            'meet_date' => 'required',
            'meet_time' => 'required',
            'meet_desc' => 'required',
        ]);
        $meet = DB::insert(
            'insert into meeting(
            meet_date,
            meet_duration,
            meet_desc,
            meet_time,
            host_doc_id)
            values(?,?,?,?,?)',
            [
                $request->meet_date,
                $request->meet_duration,
                $request->meet_desc,
                $request->meet_time,
                $request->doc_id,
            ]
        );
        if ($meet) {
            return redirect('admin_live_meet')->with('success', 'Data Added successfully');
        } else {
            return redirect('admin_live_meet')->with('fail', 'Something Wrong');
        }
    }
    /**End Live Consultation */
}
