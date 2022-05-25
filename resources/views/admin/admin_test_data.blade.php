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
@endsection
