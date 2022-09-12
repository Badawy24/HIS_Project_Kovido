@extends('admin.admin-dashbord-temp')
@section('content')
    <!-- ////////////// -->
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data ">

                <p class="head">Update Reservation of Patient:
                    <span>{{ $resv_tests->pat_fname . ' ' . $resv_tests->pat_lname }}</span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>

            </div>

            <form action="/update_testres_data" method="post">
                @csrf

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif



                <div class="row">

                    <input type="hidden" value="{{ $resv_tests->res_id }}" name="res_id">

                    <div class="col-md-6 update-inp">
                        <label for="patient_name">Patient Name </label>
                        <input class="form-control" name="patient_name" type="text" aria-label="default input example"
                            value="{{ $resv_tests->pat_fname . ' ' . $resv_tests->pat_lname }}" disabled>
                        @error('patient_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>



                    <div class="col-md-6 update-inp">
                        <label for="test name">Test Name </label>
                        <select class="form-select" aria-label="Default select example" name="test_name">
                            <option selected hidden value="{{ $resv_tests->test_id }}">{{ $resv_tests->test_name }}
                            </option>
                            @foreach ($alltes as $testes)
                                <option value="{{ $testes->test_id }}">{{ $testes->test_name }}</option>
                            @endforeach
                        </select>

                        @error('test_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror

                    </div>



                    <div class="col-md-6 update-inp">
                        <label for="test_date">Test Date </label>
                        <input class="form-control" name="test_date" type="date" placeholder="test_date"
                            aria-label="default input example" value="{{ $resv_tests->pat_test_date }}"
                            min="<?php echo date('Y-m-d'); ?>">

                        @error('test_date')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror

                    </div>


                    <div class="col-md-6 update-inp">
                        <label for="test_time">Test Time </label>
                        <input class="form-control" name="test_time" type="time" placeholder="test_time"
                            aria-label="default input example" value="{{ $resv_tests->pat_test_time }}">

                        @error('test_time')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror

                    </div>



                    <div class="col-md-6 update-inp">
                        <label for="hc_name">Health Care Center </label>
                        <select class="form-select" aria-label="Default select example" name="hc_name">

                            <option selected hidden value="{{ $resv_tests->hc_id }}">{{ $resv_tests->hc_name }}</option>
                            @foreach ($hecs as $hc)
                                <option value="{{ $hc->hc_id }}">{{ $hc->hc_name }} [
                                    {{ $hc->hc_address }} ]
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
