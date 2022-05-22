@extends('forget-temp')

@section('image')
<img src="/images/Forgot password-bro.png" class="img-fluid" />
@endsection

@section('head')
<h3>Forgot Password?</h3>
<p class="lead">Enter Your Email Address Associated With Your Account.</p>
@endsection

@section('form')
@if (Session::has('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            {{ Session::get('error') }}
        </div>
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            {{ Session::get('success') }}
        </div>
    </div>
@endif
<form action='sendmailForget' method='post'>
    @csrf
    <input value = "{{ old('email')}}" name="email" class="email form-control form-control-lg" type="text" placeholder="Enter Email" aria-label=".form-control-lg example">
    @error('email')
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <div>{{$message}} </div>
    </div>
    @enderror
    <button type="submit" class="btn btn-primary mb-3 send">Send <i class="fa-solid fa-arrow-right-long"></i></button>
</form>
@endsection