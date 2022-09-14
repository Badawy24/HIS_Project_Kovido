@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data ">
                <p class="head">Update Live Meeting of Doctor:
                    <span>{{ $meet_data->doc_fname . ' ' . $meet_data->doc_lname }}</span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>
            </div>
            <form action="/admin_meet_update/{{ $meet_data->meet_id }}" method="post">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="row">

                    <input type="hidden" value="{{ $meet_data->doc_id }}" name="doc_id">
                    <div class="col-md-6 update-inp">
                        <label for="doc_name">Doctor Name </label>
                        <input class="form-control" name="doc_name" type="text" aria-label="default input example"
                            value="{{ $meet_data->doc_fname . ' ' . $meet_data->doc_lname }}" disabled>
                        @error('doc_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 update-inp">
                        <label for="meet_date">Meeting Date </label>
                        <input class="form-control" name="meet_date" type="date" placeholder="meet_date"
                            aria-label="default input example" value="{{ $meet_data->meet_date }}"
                            min="<?php echo date('Y-m-d'); ?>">
                        @error('meet_date')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <label for="meet_time">Meeting Time</label>
                        <input class="form-control" name="meet_time" type="time" placeholder="meet_time"
                            aria-label="default input example" value="{{ $meet_data->meet_time }}">
                        @error('meet_time')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <label for="meet_id">Meeting ID</label>
                        <input class="form-control" name="meet_id" type="text" placeholder="meet_id"
                            aria-label="default input example" value="{{ $meet_data->meet_admin_id }}" disabled>
                        @error('meet_id')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meet_desc">Meeting Description</label>
                        <textarea class="form-control" name="meet_desc" placeholder="Meeting Description">{{ $meet_data->meet_desc }}</textarea>
                        @error('meet_desc')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="submit" class="update-btn " name="submit" value="Update Meeting">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
