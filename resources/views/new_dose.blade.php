<!-- Badawy -->
@extends('main-template')

@section('content')
    <div class="contact_us main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="">
                        <img src="\images\service\vaccinee.png" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form register-form ">
                        {{-- @if (Session::has('error'))
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
                        @endif --}}
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>

                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                You are now on the right path to prevent corona virus
                            </div>
                        </div>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                You will experience some side effects as a result of the vaccine </div>
                        </div>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                Please stick to the time you choose </div>
                        </div>

                        <form action="" method="POST" class="row">
                            @csrf
                            <div class="col-lg-12">
                                <select class="form-select" name="dose" id="doc_name"
                                    aria-label="Default select example">
                                    <option selected>Choose Dose</option>
                                    <option value="1">Dose One</option>
                                    <option value="2">Dose Two</option>
                                    <option value="3">Dose Three</option>
                                </select>
                                @error('dose')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <select class="form-select" name="center" id="doc_name"
                                    aria-label="Default select example">
                                    <option selected>Choose Helthcare Center</option>
                                    <option value="1">Center One</option>
                                    <option value="2">Center Two</option>
                                    <option value="3">Center Three</option>
                                </select>
                                @error('center')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <input class=" form-control" type="date" name="dose_date" id="dose_date"
                                    aria-label="default input example">
                                @error('dose_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <input class=" form-control" type="time" name="dose_time" id="dose_time"
                                    aria-label="default input example">
                                @error('doc_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary mb-3 submit">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
