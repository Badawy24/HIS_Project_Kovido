@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="form-doc-update">
        <div class="container">
            <div class="doc-data ">
                <p class="head">Update Data about Patient:
                    <span>{{ $pat->pat_fname . ' ' . $pat->pat_lname }}</span>
                    <br />
                    Date : <?php $date = date('d-m-y h:i:s');
                    echo $date; ?>
                </p>
                <hr>
            </div>
            <form action="/update_pat_data/{{ $pat->pat_id }}" method="post">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="row">
                    <div class="col-md-6 update-inp">
                    <label for="pat_name">Patient Name </label>
                        <input class="form-control" name="pat_name" type="text" aria-label="default input example"
                            value="{{ $pat->pat_fname . ' ' . $pat->pat_lname }}" disabled>
                        @error('pat_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                    <label for="pat_phone">Phone num </label>
                        <input class="form-control" name="pat_phone" type="text" aria-label="default input example"
                            value="{{ $pat->pat_phone }}">
                        @error('pat_phone')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                    <label for="pat_email">Email </label>
                        <input class="form-control" name="pat_email" type="text" aria-label="default input example"
                            value="{{ $pat->pat_email }}">
                        @error('pat_email')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                    <label for="pat_address">Address </label>
                        <input class="form-control" name="pat_address" type="text" aria-label="default input example"
                            value="{{ $pat->pat_address }}">
                        @error('pat_address')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                    <label for="pat_SSN">SSN </label>
                        <input disabled class="form-control" name="pat_SSN" type="text"
                            aria-label="default input example" value="{{ $pat->pat_SSN }}">
                        @error('pat_SSN')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                    <label for="pat_DOF">Date Of Birth </label>
                        <input class="form-control" name="pat_DOF" type="date" placeholder="pat_DOF"
                            aria-label="default input example" value="{{ $pat->pat_DOF }}">
                        @error('pat_DOF')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 update-inp">
                    <label for="pat_age">Age </label>
                        <input class="form-control" name="pat_age" type="text" aria-label="default input example"
                            disabled value="{{ $pat->pat_age }}">
                        @error('pat_age')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="update-btn " name="submit" value="Update Patient Data">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
