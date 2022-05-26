<!-- Badawy -->
@extends('main-template')

@section('content')
    <div class="contact_us main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="contact-img">
                        <img src="\images\contact\Online Doctor.png" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form register-form ">
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
                        <div class="head-contact-doctor">
                            <h4>You Can Contact With Doctor Now!</h4>
                        </div>
                        <form action="{{ route('sendDoc.email') }}" method="POST" class="row">
                            @csrf
                            <div class="col-lg-12">
                                <select class="form-select" name="doc_name" id="doc_name"
                                    aria-label="Default select example">
                                    @foreach ($doc_names as $doc_name)
                                        <option value="{{ $doc_name->doc_email }}">{{ $doc_name->doc_fname }}
                                            {{ $doc_name->doc_lname }}</option>
                                    @endforeach
                                </select>
                                @error('doc_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="text" placeholder="Message Subject" name="subj"
                                    id="subj" aria-label="default input example">
                                @error('subj')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <textarea class=" form-control" placeholder="Enter Your Message" name="msg" id="msg" aria-label="default input example"
                                    style="height: 120px"></textarea>
                                @error('msg')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-primary mb-3 submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
