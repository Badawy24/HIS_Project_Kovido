@extends('main-template')
@section('content')
    <div class="main-div-login">
        <div class="container">
            <form action="update_data" method="POST" class="register-form test-form ">
                @csrf
                <input type="hidden" name="res_id" value="{{ $res_id }}">
                <section class="row">
                    <div class="col-md-6">

                        <div class="col-md-12">
                            <label class="card-text" style="margin-left : 300px">Test</label>
                            <input class="inp-form form-control" style="text-align: center;" disabled type="text"
                                value="{{ $my_test }}" name="test_name" id="test_name"
                                aria-label="default input example">
                        </div>

                        <div class="col-md-12">
                            <label class="card-text" style="margin-left : 250px">Health Care Center</label>
                            <input class="inp-form form-control" style="text-align: center;" disabled type="text"
                                value="{{ $my_hcc }}" name="health_cc" id="health_cc"
                                aria-label="default input example">
                        </div>



                        <div class="col-md-12">
                            <label class="card-text">Date</label>
                            <input class="inp-form form-control" type="date" value="{{ $my_date }}"
                                placeholder="test_date" name="test_date" id="test_date" aria-label="default input example"
                                min="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <div class="col-md-12">
                            <label class="card-text">Time</label>
                            <input class="form-control" type="time" value="{{ $my_time }}" name="test_time"
                                placeholder="test_time" id="test_time" aria-label="default input example">
                        </div>

                        <input type="reset" class="btn btn-primary mb-3 submit update_button_margin" value="Reset">
                        <input type="submit" class="btn btn-primary mb-3 submit update_button_margin" value="Confirm">


                    </div>

                    <div class="col-md-6">
                        <div class="login-img">
                            <img id="updateTest" src="/images/update_test.png" class="update_form_img" />
                        </div>
                    </div>

                </section>
            </form>
        </div>
    </div>
@endsection
