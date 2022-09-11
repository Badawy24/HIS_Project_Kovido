@extends('main-template')
@section('content')
    <div>
        <div class="profile-page">
            <div class="container">
                <h2 class="head-cards h1 py-5 text-center">Welcome <span class="user-name">
                        @foreach ($patients as $patient)
                            {{ $patient->pat_fname }}
                        @endforeach
                    </span> To Kovidio

                </h2>
                <div class="row">
                    <div class="user-data col-md-5">

                        <h2 class="text-center head-cards">Personal Data</h2>
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
                        <div class="real-data">
                            <h5>First Name :</h5>
                            <span class="h5">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_fname }}
                                @endforeach
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Last Name :</h5>
                            <span class="h5">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_lname }}
                                @endforeach
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Email :</h5>
                            <span class="h5">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_email }}
                                @endforeach
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Address :</h5>
                            <span class="h5">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_address }}
                                @endforeach
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>SSN :</h5>
                            <span class="h5">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_SSN }}
                                @endforeach
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Phone :</h5>
                            <span class="h5">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_phone }}
                                @endforeach
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Age :</h5>
                            <span class="h5">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_age }}
                                @endforeach
                            </span>
                        </div>
                        <div class="real-data">
                            <h5>Birthday :</h5>
                            <span class="h5">
                                @foreach ($patients as $patient)
                                    {{ $patient->pat_DOF }}
                                @endforeach
                            </span>
                        </div>
                        <div class="text-center">
                            <div class="card-body d-inline-block">
                                <a href="/Editprofile" class="card-btn btn btn-front btn-primary btn-pro mb-3 py-2">Edit
                                    Your
                                    Profile</a>
                            </div>
                            <div class="card-body d-inline-block">
                                <a href="/service" class="card-btn btn btn-front btn-primary btn-pro mb-3 py-2">Check
                                    Service</a>
                            </div>
                            <div class="card-body d-inline-block">
                                <a href="/change_pass_patient/{{$patients[0]->pat_id}}" class="card-btn btn btn-front btn-primary btn-pro mb-1 py-2"> Change
                                    Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="img-profile col-md-7 text-center">
                        <div class="profile-img ">
                            <img id="profile" src="/images/profile.png" class="img-fluid" />
                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-center msg-rep">
                    <div class="col-md-8 ">
                        <div class="msg-content msgs-box">
                            <h3>You have Sent <?php
                            $pat_id = $patients[0]->pat_id;
                            $msgs = DB::select('select * from doc_pat where pat_id = ?', [$pat_id]);
                            echo count($msgs);
                            $i = 1;
                            ?> Messages : </h3>
                            <div class="all-msgs">
                                @foreach ($msgs as $m)
                                    <div class="one-msg row">
                                        <div class="col-md-8">
                                            <div class="msg-content">
                                                <span>Message #<?php echo $i;
                                                $i++; ?> :</span>
                                                {{ $m->message }}
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            @if ($m->reply == '')
                                                <div class="alert alert-danger" role="alert">
                                                    <i class="fa-solid fa-triangle-exclamation me-2"></i>No reply yet
                                                </div>
                                            @else
                                                <div class="msg-reply">
                                                    {{ $m->reply }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- <div class="one-msg row">
                                        <div class="col-md-6">
                                            Message #<?php echo $i;
                                            $i++; ?> :
                                            <div class="msg-content">
                                                {{$m->message}}
                                            </div>
                                        </div>
                                        <div class="col-md-6 icon">
                                            Doctor Reply :
                                            @if ($m->reply == '')
                                                <div class="alert alert-danger" role="alert">
                                                    A simple danger alert—check it out!
                                                </div>
                                            @else
                                            <div class="msg-reply">
                                                {{$m->reply}}
                                            </div>
                                            @endif
                                        </div>
                                    </div> --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
