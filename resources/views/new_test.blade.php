@extends('main-template')
@section('content')
    <div class="main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-form">
                        <form action="new_test" method="post" class="row">
                            @csrf
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            <div class="col-md-12">

                                <label>Choose test</label>
                                <select class=" form-select " aria-label="Default select example" name="test_name"
                                    value="{{ old('test') }}">
                                    <!-- <option selected disabled> Choose test </option> -->
                                    @foreach ($tests_list as $test)
                                        <option value="{{ $test->test_name }}">{{ $test->test_name }}</option>
                                    @endforeach
                                    <!-- <option value="RT-PCR">RT-PCR</option>
                                    <option value="Antigen">Antigen</option>
                                    <option value="X-ray">X-ray</option>
                                    <option value="CBC">CBC</option> -->
                                </select>
                                @error('test')
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <div> {{ $message }} </div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Choose Health Care Center</label>
                                <select class="form-select" aria-label="Default select example" name="health_cc"
                                    value="{{ old('health_cc') }}">
                                    @foreach ($hc_list as $hc)
                                        <option value="{{ $hc->hc_name }}">{{ $hc->hc_name }}</option>
                                    @endforeach
                                    <!-- <option selected disabled> Choose Health Care Center </option> -->
                                    <!-- <option value="benha">benha</option>
                                    <option value="tanta">tanta</option>
                                    <option value="giza">giza</option>
                                    <option value="cairo hcc">cairo hcc</option> -->
                                </select>
                                @error('health_cc')
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <div> {{ $message }} </div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <label>Date</label>
                                <input class=" form-control" type="date" placeholder="test_date" name="test_date"
                                    id="test_date" aria-label="default input example" value="{{ old('test_date') }}">
                                @error('test_date')
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <div> {{ $message }} </div>
                                    </div>
                                @enderror
                            </div>


                            <div class="col-lg-12">
                                <label>Time</label>
                                <input class="form-control" type="time" name="test_time" placeholder="test_time"
                                    id="test_time" aria-label="default input example" value="{{ old('test_time') }}">
                                @error('test_time')
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <div> {{ $message }} </div>
                                    </div>
                                @enderror
                            </div>


                            <input type="reset" class="btn btn-primary mb-3 submit" value="reset">
                            <input type="submit" class="btn btn-primary mb-3 submit" value="confirm">

                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-img">
                        <img src="/images/test_reservation.png" class="test_form_img" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
