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
        $doc_name = DB::select('select * from doctor');
        session(['doc_name' => $doc_name]);
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

    public function delete_msg($msg_id)
    {
        $delete_msg = DB::delete('delete from doc_pat where msg_id = ?', [$msg_id]);
        if ($delete_msg) {
            $doc_msg = DB::select('select * from doc_pat');
            $doc_name = DB::select('select * from doctor');
            session(['doc_name' => $doc_name]);
            if ($doc_msg) {
                return redirect('admin_doc_msg')->with('doc_msg', $doc_msg);
            }
        } else {
            return view('admin.admin_doc_msg')->with('error_msg', 'Can\'t Delete This Message');
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
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
}