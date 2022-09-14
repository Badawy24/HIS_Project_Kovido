<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LiveController extends Controller
{
    public function showAvilableAppo()
    {
        $doctors = DB::select('select * from doctor');
        return view('meeting.live')->with(['doctors' => $doctors]);
    }
    public function confirm_con($doc_id)
    {
        $pat_id = session('user_id');

        $doctor = DB::select('select * from doctor where doc_id = ?', [$doc_id]);
        $patient = DB::select('select * from patient where pat_id = ?', [$pat_id]);

        return view('meeting.confirm')->with(['patient' => $patient[0], 'doctor' => $doctor[0]]);
    }
    public function confirmLive(Request $request)
    {
        $pat_id = session('user_id');

        $request->validate([
            'meetingdate' => 'required',
            'con_title' => 'required',
            'meetingDec' => 'required',
        ]);
        $checkEmpty = DB::select('select * from pat_consultation where pat_id = ?', [$pat_id]);
        if ($checkEmpty) {
            return redirect('/profile')->with('allreadyliveBokked', 'It Is Not Possible To Book More Than One consultation');
        } else {
            DB::insert(
                '
        insert into pat_consultation(
            con_title,
            con_date,
            con_meet_id,
            pat_id,
            doc_id,
            con_desc,
            con_time)
            values(?,?,?,?,?,?,?)',
                [
                    $request->con_title,
                    $request->meetingdate,
                    $request->meetinId,
                    $pat_id,
                    $request->doc_id,
                    $request->meetingDec,
                    '20:00'
                ]
            );

            return redirect('/profile')->with('liveBokked', 'Live Consultation Succesfully');
        }
    }
    public function startMeeting()
    {
        if ($this->checkInternet()) {

            $pat_id = session('user_id');
            $pat_name = DB::select('select pat_fname,pat_lname from patient where pat_id = ?', [$pat_id]);
            $meetingid = DB::select('select * from pat_consultation where pat_id = ?', [$pat_id]);
            return view('meeting.startMeeting')->with(['pat_name' => $pat_name[0], 'meetingid' => $meetingid[0]]);
        } else {
            return redirect('/profile')->with(['noInternet' => 'Check Your Internet Connection!']);
        }
    }

    public function startMeetingDoc()
    {
        $doc_id = session('doc_user_id');
        $meetingInfo = DB::select('select pat_consultation.*,
            patient.*,
            doctor.doc_fname, doctor.doc_lname
        from pat_consultation
        inner join patient on pat_consultation.pat_id = patient.pat_id
        inner join doctor on pat_consultation.doc_id = doctor.doc_id where pat_consultation.doc_id = ?', [$doc_id]);

        return view('meeting.doc_meeting')->with(['meetingInfo' => $meetingInfo, 'pat_consultation' => 'pat_consultation']);
    }
    public function joinMeetingDoc($pat_id)
    {
        if ($this->checkInternet()) {

            $doc_id = session('doc_user_id');
            $doc_name = DB::select('select doc_fname,doc_lname from doctor where doc_id = ?', [$doc_id]);
            $meeting = DB::select('select * from pat_consultation where pat_id = ? ', [$pat_id]);
            return view('meeting.startMeetingDoctor')->with(['meeting' => $meeting[0], 'doc_name' => $doc_name[0]]);
        } else {
            return view('profile')->with(['noInternet' => 'Check Your Internet Connection!']);
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
}