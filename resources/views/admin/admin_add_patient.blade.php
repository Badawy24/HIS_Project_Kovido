@extends('admin.admin-dashbord-temp')
@section('content')
<h2 style="text-align: center;">Here, you can add a petient</h2>
<form action="/admin_add_patient" method="post" class="row" id="admin_patient">
    @if (session('a_i_msg'))
    <div class="alert alert-success">Patient added successfully</div>

    @else
    <div class="alert alert-danger">The operation is unsuccessful</div>
    @endif

    @csrf
    <div class="col-md-6">
        <input class=" form-control" type="text" placeholder="First Name" name="pat_fname" value="{{ old('pat_fname') }}" id="name" aria-label="default input example">

        @error('pat_fname')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    <div class="col-md-6">
        <input class="form-control col-auto" type="text" placeholder="Last Name" name="pat_lname" value="{{ old('pat_lname') }}" id="name" aria-label="default input example">

        @error('pat_lname')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    <div class="col-lg-12">
        <input class=" form-control" type="text" placeholder="SSN" name="pat_SSN" id="ssn" aria-label="default input example">

        @error('pat_SSN')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    <div class="col-lg-12">
        <input class=" form-control" type="email" placeholder="Patient Email" name="pat_email" value="{{ old('pat_email') }}" id="email" aria-label="default input example">

        @error('pat_email')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    <div class="col-lg-12">
        <input class=" form-control" type="password" placeholder="Password" name="p_pass" id="password" aria-label="default input example">

        @error('pat_password')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    <div class="col-lg-12">
        <input class=" form-control" type="password" placeholder="Confirm Password" name="password_confirmation" id="password" aria-label="default input example">

        @error('password_confirmed')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    <div class="col-lg-12">
        <input class=" form-control" type="text" placeholder="Address" name="pat_address" value="{{ old('pat_address') }}" id="address" aria-label="default input example">

        @error('pat_address')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    <div class="col-lg-12">
        <input class=" form-control" type="tel" placeholder="Phone Number" name="pat_phone" value="{{ old('pat_phone') }}" id="phone" aria-label="default input example">

        @error('pat_phone')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    {{-- <div class="col-md-12">
                                <input class="form-control" type="number" placeholder="Age" name="pat_age"
                                    value="{{ old('pat_age') }}" id="age" aria-label="default input example">

    @error('pat_age')
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <div> {{ $message }} </div>
    </div>
    @enderror

    </div> --}}
    <div class="col-lg-12">
        <label class="head-fog">Birth Of Date</label>
        <input class=" form-control" type="date" placeholder="Birth Of Date" name="pat_DOF" id="BOD" value="{{ old('pat_BOF') }}" aria-label="default input example">

        @error('pat_BOF')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div> {{ $message }} </div>
        </div>
        @enderror

    </div>
    <input type="submit" class="btn btn-primary mb-3 submit " value="Register" name="register-user">
</form>

@endsection
