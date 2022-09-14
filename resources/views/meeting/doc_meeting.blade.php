@extends('main-template')
@section('content')
    <div>
        <div class="profile-page">
            <div class="container text-center">
                <h2 class="head-cards h3 py-3">Your Live Consultation & Live Meeting</h2>
                <section>
                    <div class="row">
                        @if ($meetingInfo == null)
                            <div class="row justify-content-md-center text-center">
                                <div class="col-md-4 alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fa-regular fa-circle-check"></i>
                                    &nbsp;
                                    <div>
                                        There is No Live Consultation OR Live Meeting
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($meetingInfo as $meeting)
                                @php
                                    $timedel = strtotime($meeting->con_time) + 60 * 60;
                                    $time = date('H:i', $timedel);
                                @endphp
                                @if (date('Y-m-d h:i', strtotime('+2 hours')) < $meeting->con_date . ' ' . $time)
                                    <article class="col-md-4 d-flex align-items-stretch">
                                        <div class="card px-2 py-2 mb-5" style="min-width: 100%">
                                            <div class="card-body text-start">
                                                <h4 class="card-title mb-4">
                                                    Consultation : {{ $meeting->con_title }}
                                                </h4>
                                                <div class="real-data live-doc">
                                                    <h5 class="live-doc-card">patient :</h5>
                                                    <span class="h6">
                                                        {{ $meeting->pat_fname . ' ' . $meeting->pat_lname }}
                                                    </span>
                                                </div>
                                                <div class="real-data live-doc">
                                                    <h5 class="live-doc-card">Phone :</h5>
                                                    <span class="h6">
                                                        {{ $meeting->pat_phone }}
                                                    </span>
                                                </div>
                                                <div class="real-data live-doc">
                                                    <h5 class="live-doc-card">Email :</h5>
                                                    <span class="h6">
                                                        {{ $meeting->pat_email }}
                                                    </span>
                                                </div>
                                                <div class="real-data live-doc">
                                                    <h5 class="live-doc-card">Date :</h5>
                                                    <span class="h6">
                                                        {{ $meeting->con_date }}
                                                    </span>
                                                </div>
                                                <div class="real-data live-doc">
                                                    <h5 class="live-doc-card">Time :</h5>
                                                    <span class="h6">
                                                        {{ $meeting->con_time }}
                                                    </span>
                                                </div>
                                                <div class="real-data live-doc">
                                                    <h5 class="live-doc-card">Description :</h5>
                                                    <span class="h6">
                                                        {{ $meeting->con_desc }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form action="/startMeetingDoc/{{ $meeting->pat_id }}" method="get"
                                                    class="d-inline-block">
                                                    <input type="hidden" id="joinMeetingId"
                                                        value="{{ $meeting->con_meet_id }}">
                                                    @if (date('Y-m-d h:i', strtotime('+2 hours')) < $meeting->con_date . ' ' . $meeting->con_time)
                                                        <button disabled class="btn btn-primary">Join</button>
                                                    @else
                                                        <button type="submit" id="meetingJoinButton"
                                                            onclick="validateMeeting()"
                                                            class="btn btn-primary">Join</button>
                                                    @endif

                                                </form>

                                                <form action="/admin_con_del/{{ $meeting->con_id }}"
                                                    class=" d-inline-block">
                                                    <button class="btn btn-danger">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="../js/meeting/meeting.js"></script>
    <script src="https://sdk.videosdk.live/js-sdk/0.0.37/videosdk.js"></script>
    <script src="../js/meeting/config.js"></script>
@endsection
