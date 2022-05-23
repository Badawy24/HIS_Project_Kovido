@extends('main-template')
@section('content')
    <div class="main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="register-form">
                        <!-- ////////////// -->
                        <form action="register" method="POST" class="row">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif

                            @csrf
                            <div class="col-md-6">
                                <input class=" form-control"  type="text" placeholder="First Name" name="pat_fname" value="{{old('pat_fname')}}"
                                id="name" aria-label="default input example" required>
                                <span class="text-danger">@error('pat_fname') {{$message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control col-auto"  type="text" placeholder="Last Name" name="pat_lname" value="{{old('pat_lname')}}"
                                id="name" aria-label="default input example" required>
                                <span class="text-danger">@error('pat_lname') {{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="text" placeholder="SSN" name="pat_SSN"
                                id="ssn" aria-label="default input example" required>
                                <span class="text-danger">@error('pat_SSN') {{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="email" placeholder="Patient Email" name="pat_email" value="{{old('pat_email')}}"
                                id="email" aria-label="default input example" required>
                                <span class="text-danger">@error('pat_email') {{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="password" placeholder="Password" name="patient_password"
                                id="password" aria-label="default input example" required>
                                <span class="text-danger">@error('pat_password') {{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="password" placeholder="Confirm Password" name="password_confirmation" 
                                id="password" aria-label="default input example" required>
                                <span class="text-danger">@error('password_confirmation') {{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="text" placeholder="Address" name="pat_address" value="{{old('pat_address')}}"
                                id="address" aria-label="default input example"required>
                                <span class="text-danger">@error('pat_address') {{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="tel" placeholder="Phone Number" name="pat_phone" value="{{old('pat_phone')}}"
                                id="phone" aria-label="default input example" required>
                                <span class="text-danger">@error('pat_phone') {{$message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="number" placeholder="Age" name="pat_age" value="{{old('pat_age')}}"
                                id="age" aria-label="default input example" required>
                                <span class="text-danger">@error('pat_age') {{$message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <select class=" form-select" aria-label="Default select example" name="pat_sex" value="{{old('pat_sex')}}" required>
                                    <option selected disabled>Choose Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="text-danger">@error('pat_sex') {{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-12">
                                <label>Birth Of Date</label>
                                <input class=" form-control" type="date" placeholder="Birth Of Date" name="pat_BOF"
                                id="BOD" value="{{old('pat_BOF')}}" aria-label="default input example" required>
                                <span class="text-danger">@error('pat_BOF') {{$message}} @enderror</span>
                            </div>
                            <a class="link" href="/login">allready have an account ?</a>
                            <input type="submit" class="btn btn-primary mb-3 submit" value="Register" name="register-user">
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-img">
                        <img src="/images/register-img.png" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
