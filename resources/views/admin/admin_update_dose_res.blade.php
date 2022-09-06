@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data ">
                <p class="head">Update Reservation of Patient:
                    <span>{{ $dose_data->pat_fname . ' ' . $dose_data->pat_lname }}</span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>
            </div>
            <form action="/admin_update_dose" method="post">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="row">
                    <input type="hidden" value="{{ $dose_data->pat_id }}" name="pat_id">
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="patient_name" type="text" aria-label="default input example"
                            value="{{ $dose_data->pat_fname . ' ' . $dose_data->pat_lname }}" disabled>
                        @error('patient_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <select class="form-select" aria-label="Default select example" name="dose_name">
                            <option selected hidden value="{{ $dose_data->dose_id }}">{{ $dose_data->vaccine_name }}
                            </option>
                            @foreach ($doses as $dose)
                                <option value="{{ $dose->dose_id }}">{{ $dose->vaccine_name }}</option>
                            @endforeach
                        </select>
                        @error('dose_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="first_dose" type="date" placeholder="first_dose"
                            aria-label="default input example" value="{{ $dose_data->pat_dose_date }}">
                        @error('first_dose')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="time_dose" type="time" placeholder="time_dose"
                            aria-label="default input example" value="{{ $dose_data->pat_dose_time }}">
                        @error('time_dose')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="second_dose" type="date" placeholder="second_dose"
                            aria-label="default input example"
                            value="{{ date('Y-m-d', strtotime($dose_data->pat_dose_date . '+ 14 days')) }}" disabled>
                        @error('second_dose')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <select class="form-select" aria-label="Default select example" name="hc_name">
                            <option selected hidden value="{{ $dose_data->hc_id }}">{{ $dose_data->hc_name }}</option>
                            @foreach ($hecs as $hec)
                                <option value="{{ $hec->hc_id }}">{{ $hec->hc_name }} [
                                    {{ $hec->hc_address }} ]
                                </option>
                            @endforeach
                        </select>
                        @error('hc_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="update-btn " name="submit" value="Update Reservation">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
