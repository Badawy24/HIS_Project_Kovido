<!-- Badawy -->
@extends('main-template')

@section('content')
    <div class="contact_us main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
                        <form action="{{ route('send.email') }}" method="POST" class="row">
                            @csrf
                            <div class="col-lg-12">
                                <input class=" form-control" type="text" placeholder="Enter Your Name" name="name"
                                    id="name" aria-label="default input example">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="email" placeholder="Entet Your Email" name="email"
                                    id="email" aria-label="default input example">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="phone" placeholder="Phone Number" name="phone"
                                    id="phone" aria-label="default input example">
                                @error('phone')
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
                <div class="col-md-6">
                    <div class="contact-img">
                        <img src="\images\contact\contact-us.png" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
