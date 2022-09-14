@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data ">
                <p class="head">Update Live Consultation of Patient:
                    <span>{{ $con_data->pat_fname . ' ' . $con_data->pat_lname }}</span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>
            </div>
            <form action="/admin_con_update/{{ $con_data->con_id }}" method="post">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="row">

                    {{-- <input type="hidden" value="{{ $con_data->con_id }}" name="con_id"> --}}
                    <div class="col-md-6 update-inp">
                        <label for="patient_name">Patient Name </label>
                        <input class="form-control" name="patient_name" type="text" aria-label="default input example"
                            value="{{ $con_data->pat_fname . ' ' . $con_data->pat_lname }}" disabled>
                        @error('patient_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="doc_name">Doctor Name </label>
                        <select class="form-select" aria-label="Default select example" name="doc_name">
                            <option hidden value="{{ $con_data->doc_id }}">
                                {{ $con_data->doc_fname . ' ' . $con_data->doc_lname }}</option>
                            <?php $docs = DB::select('select * from doctor'); ?>
                            @foreach ($docs as $doc)
                                <option value="{{ $doc->doc_id }}">
                                    {{ $doc->doc_fname . ' ' . $doc->doc_lname }}
                                </option>
                            @endforeach
                        </select>
                        @error('doc_id')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <label for="Title">Consultation Title</label>
                        <input class="form-control" name="Title" type="text" aria-label="default input example"
                            value="{{ $con_data->con_title }}">
                        @error('Title')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 update-inp">
                        <label for="con_des">Consultation Date </label>
                        <input class="form-control" name="con_date" type="date" placeholder="con_des"
                            aria-label="default input example" value="{{ $con_data->con_date }}" min="<?php echo date('Y-m-d'); ?>">
                        @error('con_des')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <label for="con_time">Consultation Time</label>
                        <input class="form-control" name="con_time" type="time" placeholder="con_time"
                            aria-label="default input example" value="{{ $con_data->con_time }}">
                        @error('con_time')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <label for="con_meet_id">Consultation ID</label>
                        <input class="form-control" name="con_meet_id" type="text" placeholder="con_meet_id"
                            aria-label="default input example" value="{{ $con_data->con_meet_id }}" disabled>
                        @error('con_meet_id')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="con_meet_id">Consultation Description</label>
                        <textarea class="form-control" name="con_desc" placeholder="Consultation Description">{{ $con_data->con_desc }}</textarea>
                        @error('con_desc')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="submit" class="update-btn " name="submit" value="Update Consultation">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
