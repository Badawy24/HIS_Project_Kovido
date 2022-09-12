@extends('main-template')
@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="register-form">
                        <!-- ////////////// -->
                        <h2 class="head-cards h1 py-5 text-center">Welcome <span class="user-name">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_fname }}
                                @endforeach
                            </span> Can Edit Profile
                        </h2>
                        @if (Session::has('error'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div>
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    &nbsp;
                                    {{ Session::get('error') }}
                                </div>
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fa-regular fa-circle-check"></i>
                                &nbsp;
                                <div>
                                    {{ Session::get('success') }}
                                </div>
                            </div>
                        @endif
                        <form action="/updateprofile" method="POST" class="row">
                            @csrf
                            @foreach ($patients as $patient)
                                <div class="col-md-6">
                                    <label for="f_name" class="form-label profile_label_style">FirstName</label>
                                    <input class=" form-control input_profile" disabled type="text"
                                        value="{{ $patient->pat_fname }}" name="pat_fname" id="f_name"
                                        aria-label="default
                                                input example">

                                </div>
                                <div class="col-md-6">
                                    <label for="l_name"
                                        class="form-label
                                            profile_label_style">Last
                                        Name</label>
                                    <input
                                        class="form-control col-auto
                                            input_profile"
                                        type="text" disabled value="{{ $patient->pat_lname }}" name="pat_lname"
                                        id="l_name" aria-label="default input example">
                                </div>
                                <div class="col-lg-12">
                                    <label for="ssn"
                                        class="form-label
                                            profile_label_style">SSN</label>

                                    <input class=" form-control
                                            input_profile"
                                        type="text" value="{{ $patient->pat_SSN }}" name="pat_SSN" id="ssn"
                                        disabled aria-label="default input example">
                                </div>
                                <div class="col-lg-12">
                                    <label for="email"
                                        class="form-label
                                            profile_label_style">Email</label>
                                    <input class=" form-control edit_label" type="email" value="{{ $patient->pat_email }}"
                                        name="pat_email" id="email" aria-label="default input example">
                                    @error('pat_email')
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            <div>{{ $message }} </div>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <label for="address"
                                        class="form-label
                                            profile_label_style">Address</label>
                                    <input class=" form-control" type="text" value="{{ $patient->pat_address }}"
                                        name="pat_address" id="address"
                                        aria-label="default
                                            input example">
                                    @error('pat_address')
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            <div>{{ $message }} </div>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="phone"
                                        class="form-label
                                            profile_label_style">Phone</label>
                                    <input class=" form-control" type="tel" value="{{ $patient->pat_phone }}"
                                        name="pat_phone" id="phone"
                                        aria-label="default input
                                            example">
                                    @error('pat_phone')
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            <div>{{ $message }} </div>
                                        </div>
                                    @enderror
                                </div>
                                <?php
                                $dateBrith = date_create(date('Y-m-d'));
                                date_sub($dateBrith, date_interval_create_from_date_string('15 years'));
                                ?>
                                <div class="col-lg-8">
                                    <label for="birthday"
                                        class="form-label
                                profile_label_style">Birthday</label>
                                    <input class=" form-control "  type="date" value="{{ $patient->pat_DOF }}"
                                        name="birthday" id="birthday"
                                        aria-label="default input
                                example"
                                        max="<?php echo date_format($dateBrith, 'Y-m-d'); ?>">
                                    @error('birthday')
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            <div>{{ $message }} </div>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="age"
                                        class="form-label
                                            profile_label_style">Age</label>
                                    <input disabled class=" form-control input_profile" type="text"
                                        value="{{ $patient->pat_age }}" name="age" id="age"
                                        aria-label="default input
                                            example">
                                </div>
                                <input type="submit"
                                    class="btn btn-primary
                                        mb-3 submit"
                                    value="Save" name="register-user">
                            @endforeach

                        </form>
                    </div>
                </div>
                <div class="col-md-6 center-image">
                    <div class="login-img ">
                        <img id="editprof" src="/images/editprof.png" class="img-fluid" width="200px"
                            height="200px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
