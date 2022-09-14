<?php
use Illuminate\Support\Facades\Crypt;
?>
@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="form-doc-update">
        <div class="container">
            <div class="doc-data ">
                <p class="head">Update Data about Doctor:
                    <span>{{ $doctor->doc_fname . ' ' . $doctor->doc_lname }}</span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>
            </div>
            <form action="/admin_doc_data/{{ $doctor->doc_id }}" method="post">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="row">
                    <div class="col-md-6 update-inp">
                        <label>Doctor Name </label>
                        <input class="form-control" name="doc_name" type="text" aria-label="default input example"
                            value="{{ $doctor->doc_fname . ' ' . $doctor->doc_lname }}" disabled>
                        @error('doc_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <label>Phone Number </label>
                        <input class="form-control" name="doc_phone" type="text" aria-label="default input example"
                            value="{{ $doctor->doc_phone }}">
                        @error('doc_phone')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <label>Email </label>
                        <input class="form-control" name="doc_email" type="text" aria-label="default input example"
                            value="{{ $doctor->doc_email }}">
                        @error('doc_email')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-6 update-inp">
                    <label>password </label>
                    <input class="form-control" name="doc_pass" type="text" aria-label="default input example"
                        value="{{ $doctor->doc_pass }}">
                    @error('doc_pass')
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            <div> {{ $message }} </div>
                        </div>
                    @enderror
                </div> --}}
                    <div class="col-md-2 update-inp">
                        <label>Age </label>
                        <input class="form-control" name="doc_age" type="text" aria-label="default input example"
                            disabled value="{{ $doctor->doc_age }}">
                        @error('doc_age')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4 update-inp">
                        <label>Gender </label>
                        <select class="form-select" aria-label="Default select example" name="doc_sex">
                            <option selected hidden value="{{ $doctor->doc_sex }}">{{ $doctor->doc_sex }}
                            </option>
                            <option value="male" disabled>Male</option>
                            <option value="female" disabled>Female</option>
                        </select>
                        @error('doc_sex')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="update-btn " name="submit" value="Update Doctor Data">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
