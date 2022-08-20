@extends('forget-temp')

@section('image')
    <img id="img-reset-pass" src="/images/Reset password.gif" class="img-fluid" />
@endsection

@section('head')
    <h3 class="head-cards">Reset Password</h3>
@endsection

@section('form')
    <form action='/resetPass' method='post'>
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
                <div>
                    <i class="fa-regular fa-circle-check"></i>
                    &nbsp;
                    {{ Session::get('success') }}
                    <a href='login'>Login</a>
                </div>
            </div>
        @endif
        @csrf

        <input class="inp-form pass form-control form-control-lg" name="password" type="password"
            placeholder="Enter Password" aria-label=".form-control-lg example">
        @error('password')
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>{{ $message }} </div>
            </div>
        @enderror
        <input class="inp-form pass form-control form-control-lg" name="password_confirmation" type="password"
            placeholder="Confirm Password" aria-label=".form-control-lg example">
        @error('password_confirmation')
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>{{ $message }} </div>
            </div>
        @enderror
        <input class="inp-form email form-control form-control-lg" name="code" type="text" placeholder="Enter code"
            aria-label=".form-control-lg example">
        @error('code_confirmation')
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>{{ $message }} </div>
            </div>
        @enderror
        <button type="submit" class="btn btn-primary mb-3 send btn-front">Change Password</button>
    </form>
@endsection
