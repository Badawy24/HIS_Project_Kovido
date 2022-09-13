@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="form-add-doc">
        <div class="container">
            <form action="admin_add_doc" method="post">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="f_name" type="text" placeholder="First Name"
                            aria-label="default input example" value="{{ old('f_name') }}">
                        @error('f_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="l_name" type="text" placeholder="Last Name"
                            aria-label="default input example" value="{{ old('l_name') }}">
                        @error('l_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <select class="form-select" aria-label="Default select example" name="gender">
                            <option selected disabled>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="age" type="number" placeholder="Age"
                            aria-label="default input example" value="{{ old('age') }}">
                        @error('age')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 update-inp">
                        <input class="form-control" name="phone" type="phone" placeholder="Phone Number"
                            aria-label="default input example" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 update-inp">
                        <input class="form-control" name="email" type="email" placeholder="Email"
                            aria-label="default input example" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 update-inp">
                        <input class="form-control" name="password" type="password" placeholder="Password"
                            aria-label="default input example">
                        @error('password')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 update-inp">
                        <input class="form-control" name="password_confirmation" type="password"
                            placeholder="Confirm Password" aria-label="default input example">
                        @error('password_confirmation')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="update-btn" style="margin-left:360px" name="submit" value="Save Doctor">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
