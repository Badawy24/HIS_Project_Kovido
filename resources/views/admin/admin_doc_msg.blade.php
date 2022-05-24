<?php 
use Illuminate\Support\Facades\DB;
?>
@extends('admin.admin-dashbord-temp')
@section('content')
<div class='form'>
    <div class="container">
        <form action='admin_doc_msg' method='post' class="row">
            <div class= "col-md-8">
                @csrf
                <select class="form-select" aria-label="Default select example" name="doc_mail">
                    <option selected disabled>Choose Doctor Name</option>
                    @foreach  (session('doc_name') as $doc)
                    <option value= "{{$doc->doc_email}}"> {{$doc->doc_fname . ' ' . $doc->doc_lname}} </option>
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
        @if(Session::has('doc_msg'))
        <p class="doc-btn">
            <button class="btn btn-primary" type="submit" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Get Message Know <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
            </button>
        </p>
        <div class="report collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <h4 class='p-2'>There is {{ count(Session::get('doc_msg')) }} Message For Doctor <?php $dname = DB::select('select * from doctor where doc_email = ?', [Session::get('doc_email')]);
                        echo $dname[0]->doc_fname . ' ' . $dname[0]->doc_lname; ?> : </h4>
                    <p class="lead"><b>Time :</b> <?php $date = date('d-m-y h:i:s'); echo $date; ?></pclass->
                    
                    @foreach (Session::get('doc_msg') as $doc)
                        <div class="doc col-12">
                            <h5>Patient Name : <?php $name = DB::select('select * from patient where pat_id = ?',[$doc->pat_id]);
                            echo $name[0]->pat_fname . ' ' . $name[0]->pat_lname; ?> </h5>
                            <p class="lead"> {{ $doc->message }} </p>
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
