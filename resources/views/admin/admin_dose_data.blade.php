<?php 
use Illuminate\Support\Facades\DB;
?>
@extends('admin.admin-dashbord-temp')
@section('content')

<div class="doc-data">
    <div class="container">
        @if(session('dose_data'))
        <p class="doc-btn">
            <button class="btn btn-primary" type="submit" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Get Data Know <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
            </button>
        </p>
        <div class="report collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <h4 class='p-2'>There is {{ count(session('dose_data')) }} Dose Reservation : </h4>
                    <p class="lead"><b>Time :</b> <?php $date = date('d-m-y h:i:s'); echo $date; ?></pclass->
                    @foreach (session('dose_data') as $dose)
                    <div class="doc col-12">
                        <h5>Patient Name : <?php $name = DB::select('select * from patient where pat_id = ?',[$dose->pat_id]);
                        echo $name[0]->pat_fname . ' ' . $name[0]->pat_lname; ?> </h5>
                        <p class="lead"><strong>Dose Name : </strong><?php $dname = DB::select('select * from dose where dose_id = ?',[$dose->dose_id]);
                            echo $dname[0]->vaccine_name; ?></p>
                        <p class="lead"><strong>Date : </strong> {{ $dose->pat_dose_date . ' ' . $dose->pat_dose_time }} </p>
                        <p class="lead"><strong>Health Care Center Name: </strong><?php $hname = DB::select('select * from healthcare_center where hc_id = ?',[$dose->dose_patient_health]);
                            echo $hname[0]->hc_name; ?></p>
                        <p class="lead"><strong>Health Care Center Address: </strong><?php echo $hname[0]->hc_address; ?></p> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @if(Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('message')}}
        </div>
        @endif
    </div>
</div>
@endsection