@extends('main-template')
@section('content')
    <div class="change-pass">
        <div class="container">
            <form action="/change_pass_patient/{{$pat_id}}" method="post">
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        @if (Session::has('success'))
                            <div class="alert alert-success"><span class="closebtn">×</span>{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger"><span class="closebtn">×</span>{{ Session::get('fail') }}</div>
                        @endif
                        <input name="old_pass" class=" form-control form-control-lg inp-form" type="password"
                            placeholder="Enter Old Password" aria-label=".form-control-lg example">
                        @error('old_pass')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div>{{ $message }} </div>
                            </div>
                        @enderror
                        @if (Session::has('not_same'))
                            <div class="alert alert-danger">{{ Session::get('not_same') }}</div>
                        @endif
                        <input name="new_pass" class=" form-control form-control-lg inp-form" type="password"
                            placeholder="Enter New Password" aria-label=".form-control-lg example">
                        @error('new_pass')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div>{{ $message }} </div>
                            </div>
                        @enderror
                        <input name="password_confirmation" class=" form-control form-control-lg inp-form" type="password"
                            placeholder="Password Confirmation" aria-label=".form-control-lg example">
                        @error('password_confirmation')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div>{{ $message }} </div>
                            </div>
                        @enderror
                        <input type="submit" class="btn-front card-btn btn btn-primary mb-3 py-2" name="submit" value="Reset Password">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
