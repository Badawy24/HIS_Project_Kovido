@extends('main-template')
@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="register-form">
                        <!-- ////////////// -->
                        <h2 class="head-cards h1 py-5 text-center">Welcome <span class="user-name">
                            {{ $doctor[0]->doc_fname }}
                            </span> Can Edit Profile
                        </h2>
                        @if (Session::has('error'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div>
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    &nbsp;
                                    {{ Session::get('error') }} 
                                </div>
                                <span class="closebtn">×</span>
                            </div>
                            
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fa-regular fa-circle-check"></i>
                                &nbsp;
                                <div>
                                    {{ Session::get('success') }} 
                                </div>
                                <span class="closebtn">×</span>
                            </div>
                        @endif
                        <form action="/edit_profile_doc" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="f_name" class="form-label profile_label_style">FirstName</label>
                                    <input class=" form-control input_profile" disabled type="text"
                                        value="{{ $doctor[0]->doc_fname }}" name="doc_fname" id="f_name"
                                        aria-label="default input example">

                                </div>
                                <div class="col-md-6">
                                    <label for="l_name"
                                        class="form-label
                                            profile_label_style">Last
                                        Name</label>
                                    <input
                                        class="form-control col-auto
                                            input_profile"
                                        type="text" disabled value="{{ $doctor[0]->doc_lname }}" name="doc_lname"
                                        id="l_name" aria-label="default input example">
                                </div>
                                
                                <div class="col-lg-12">
                                    <label for="email"
                                        class="form-label
                                            profile_label_style">Email</label>
                                    <input class=" form-control edit_label" type="email" value="{{ $doctor[0]->doc_email }}"
                                        name="doc_email" id="email" aria-label="default input example">
                                    @error('doc_email')
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
                                    <input class=" form-control" type="tel" value='{{ $doctor[0]->doc_phone }}'
                                        name="doc_phone" id="phone"
                                        aria-label="default input
                                            example">
                                    @error('doc_phone')
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
                                        value="{{ $doctor[0]->doc_age }}" name="age" id="age"
                                        aria-label="default input
                                            example">
                                </div>
                            </div>
                                <input type="submit"
                                    class="btn btn-primary
                                        mb-3 submit"
                                    value="Save" name="register-user">

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
