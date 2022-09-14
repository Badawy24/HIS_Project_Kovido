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
                <div class="row justify-content-md-center text-center">
                    @if (Session::has('liveBokked'))
                        <div class="col-md-4 alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-check"></i>
                            &nbsp;
                            <div>
                                {{ Session::get('liveBokked') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::has('noInternet'))
                        <div class="col-md-4 alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-error"></i>
                            &nbsp;
                            <div>
                                {{ Session::get('noInternet') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::has('allreadyliveBokked'))
                        <div class="col-md-6 alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-error"></i>
                            &nbsp;
                            <div>
                                {{ Session::get('allreadyliveBokked') }}
                            </div>
                        </div>
                    @endif
                </div>

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
                                <button class="card-btn btn btn-front btn-danger btn-pro mb-3 py-2" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                                    aria-controls="offcanvasTop">Check Your Meeting</button>
                            </div>
                            <div class="offcanvas offcanvas-top card-join-meeting" tabindex="-1" id="offcanvasTop"
                                aria-labelledby="offcanvasTopLabel">
                                <h5 id="offcanvasTopLabel" class="text-center mt-4">Live Consultation Information</h5>
                                @if ($meetingData == null)
                                    <div class="offcanvas-body ">
                                        <div class="row justify-content-md-center text-center">
                                            <div class="col-md-4 alert alert-danger d-flex align-items-center"
                                                role="alert">
                                                <div>
                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                    &nbsp;
                                                    You Don't Have Any Live Consultation
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if (date('Y-m-d h:i', strtotime('+2 hours')) < $meetingData[0]->con_date . ' ' . $meetingData[0]->con_time)
                                        <div class="offcanvas-body ">
                                            <div class="row justify-content-md-center text-center">
                                                <div class="col-md-5 card">
                                                    <div class="card-body">
                                                        <div class="card-body text-start">
                                                            <h4 class="card-title mb-1">Title :
                                                                {{ $meetingData[0]->con_title }}
                                                            </h4>
                                                            <h4 class="card-title mb-1">Date :
                                                                {{ $meetingData[0]->con_date }}
                                                            </h4>
                                                            <h4 class="card-title mb-1">Time :
                                                                {{ $meetingData[0]->con_time }}
                                                            </h4>
                                                            <?php $doc_n = DB::select('select * from doctor where doc_id = ?', [$meetingData[0]->doc_id]); ?>
                                                            <h4 class="card-title mb-1">Doctor :
                                                                {{ $doc_n[0]->doc_fname . ' ' . $doc_n[0]->doc_lname }}
                                                            </h4>
                                                        </div>
                                                        <form action="/startMeeting" method="get" class="d-inline-block">
                                                            <input type="hidden" id="joinMeetingId"
                                                                value="{{ $meetingData[0]->con_meet_id }}">

                                                            @if (date('Y-m-d h:i', strtotime('+2 hours')) < $meetingData[0]->con_date . ' ' . $meetingData[0]->con_time)
                                                                <button disabled class="btn btn-primary">Join</button>
                                                            @else
                                                                <button type="submit" id="meetingJoinButton"
                                                                    onclick="validateMeeting()"
                                                                    class="btn btn-primary">Join</button>
                                                            @endif
                                                        </form>
                                                        <form action="/admin_con_del/{{ $meetingData[0]->con_id }}"
                                                            class=" d-inline-block">
                                                            <button class="btn btn-danger">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="offcanvas-body ">
                                            <div class="row justify-content-md-center text-center">
                                                <div class="col-md-4 alert alert-danger d-flex align-items-center"
                                                    role="alert">
                                                    <div>
                                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                                        &nbsp;
                                                        You Don't Have Any Live Consultation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="card-body d-inline-block">
                                <a href="/Editprofile" class="card-btn btn btn-front btn-primary btn-pro mb-3 py-2">Edit
                                    Your
                                    Profile</a>
                            </div>
                            <div class="card-body d-inline-block">
                                <a href="/change_pass_patient/{{ $patients[0]->pat_id }}"
                                    class="card-btn btn btn-front btn-primary btn-pro mb-1 py-2"> Change
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
                                                    <i class="fa-solid fa-triangle-exclamation me-2"></i>No
                                                    reply yet
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

@section('scripts')
    <script src="../js/meeting/meeting.js"></script>
    <script src="https://sdk.videosdk.live/js-sdk/0.0.37/videosdk.js"></script>
    <script src="../js/meeting/config.js"></script>
@endsection
