<?php
use Illuminate\Support\Facades\DB;
?>
@extends('admin.admin-dashbord-temp')
@section('content')
<div class='form'>
    <div class="container">
        <form action='admin_test_data' method='post' class="row">
            <div class= "col-md-8">
                @csrf
                <select class="form-select" aria-label="Default select example" name="pat_id">
                    <option selected disabled>Choose Patient Name</option>
                    @foreach  (session('pat_name') as $pat)
                    <option value= "{{$pat->pat_id}}"> {{$pat->pat_fname . ' ' . $pat->pat_lname}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary mb-3 submit" value="Search">
            </div>
        </form>
    </div>
</div>
<div class="doc-data">
    <div class="container">
        @if(Session::has('tests'))
        <p class="doc-btn">
            <button class="btn btn-primary" type="submit" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Get Message Know <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
            </button>
        </p>
        <div class="report collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <h4 class='p-2'>There is {{ count(Session::get('tests')) }} Tests For  <?php $pname = DB::select('select * from patient where pat_id = ?', [Session::get('tests')[0]->pat_id]);
                        echo $pname[0]->pat_fname . ' ' . $pname[0]->pat_lname; ?> : </h4>
                    <p class="lead"><b>Time :</b> <?php $date = date('d-m-y h:i:s'); echo $date; ?></pclass->
                    
                        @foreach (Session::get('tests') as $test)
                        <div class="doc col-12">
                            <p class="lead"><strong>Test Name : </strong><?php $tname = DB::select('select * from test where test_id = ?',[$test->test_id]);
                                echo $tname[0]->test_name; ?></p>
                            <p class="lead"><strong>Date : </strong> {{ $test->pat_test_date . ' ' . $test->pat_test_time }} </p>
                            <p class="lead"><strong>Health Care Center Name: </strong><?php $hcname = DB::select('select * from healthcare_center where hc_id = ?',[$test->test_patient_health]);
                                echo $hcname[0]->hc_name; ?></p>
                            <p class="lead"><strong>Health Care Center Address: </strong><?php echo $hcname[0]->hc_address; ?></p> 
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
