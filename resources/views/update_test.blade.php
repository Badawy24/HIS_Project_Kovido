@extends('main-template')
@section('content')
<div class="main-div-login">
    <div class="container">
        <form action="update_data" method="POST" class="register-form test-form ">
            @csrf
            <input type="hidden" name="res_id" value="{{$res_id}}">
            <section class="row">
                <div class="col-md-6">

                    <div class="col-md-12">
                        <label style="margin-left : 300px">Test</label>
                        <input class=" form-control" style="text-align: center;" disabled type="text" value="{{ $my_test }}" name="test_name" id="test_name" aria-label="default input example">
                    </div>

                    <div class="col-md-12">
                        <label style="margin-left : 250px">Health Care Center</label>
                        <input class=" form-control" style="text-align: center;" disabled type="text" value="{{ $my_hcc }}" name="health_cc" id="health_cc" aria-label="default input example">
                    </div>
                    
                    
                    <div class="col-md-12">
                        <!-- <label>Test</label> -->
                        <!-- <select class=" form-select update_from_select" aria-label="Default select example" name="test_name"> -->
                            <!-- <option selected disabled value="{{ $my_test }}"> {{ $my_test }}</option>
                            @foreach($tests_list as $test)
                            <option value="{{$test->test_name}}">{{ $test->test_name }}</option>
                            @endforeach -->
                            <!-- <option selected disabled> Choose test </option>
                            <option value="RT-PCR test">RT-PCR test</option>
                            <option value="Antigen test">Antigen test</option>
                            <option value="X-ray">X-ray</option>
                            <option value="CBC">CBC</option>
                            </select> -->
                    </div>


                    <div class="col-md-12">
                        <!-- <label>Health Care Center</label> -->
                        <!-- <select class="form-select update_from_select" aria-label="Default select example" name="health_cc"> -->
                            <!-- <option selected disabled value="{{ $my_hcc}}"> {{ $my_hcc}}</option> 
                            @foreach( $hc_list as $hc)
                            <option value="{{ $hc->hc_name }}">{{ $hc->hc_name }}</option>
                            @endforeach -->
                            <!-- <option selected disabled> Choose Health Care Center </option>
                            <option value="HCC">HCC</option>
                            <option value="HCC">HCC</option>
                            <option value="HCC">HCC</option>
                            <option value="HCC">HCC</option>
                        </select> -->
                    </div>

                    <div class="col-md-12">
                        <label>Date</label>
                        <input class=" form-control" type="date" value="{{ $my_date }}" placeholder="test_date" name="test_date" id="test_date" aria-label="default input example">
                    </div>

                    <div class="col-md-12">
                        <label>Time</label>
                        <input class="form-control" type="time" value="{{ $my_time }}" name="test_time" placeholder="test_time" id="test_time" aria-label="default input example">
                    </div>

                    <input type="reset" class="btn btn-primary mb-3 submit update_button_margin" value="reset">
                    <input type="submit" class="btn btn-primary mb-3 submit update_button_margin" value="Confirm">


                </div>

                <div class="col-md-6">
                    <div class="login-img">
                        <img src="/images/update_test.png" class="update_form_img" />
                    </div>
                </div>

            </section>
        </form>
    </div>
</div>
@endsection