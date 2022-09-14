<!-- Badawy -->
@extends('main-template')
@section('links')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" /> --}}
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> --}}
    {{-- <link href="../css/meeting.css" rel="stylesheet" /> --}}
@endsection
@section('content')
    <div class="service-page">
        <div class="container text-center">
            <h2 class="head-cards h2 py-3">Confirm Your Live Consultation</h2>
            <section>
                <div class="row justify-content-md-center">
                    <article class="col-md-5 d-flex align-items-stretch">
                        <div class="card px-2 py-2 mb-5" style="min-width: 100%">

                            <div class="card-body text-start">
                                <h4 class="card-title mb-4">Name : {{ $patient->pat_fname . ' ' . $patient->pat_lname }}
                                </h4>
                                <h4 class="card-title mb-4">Doctor : {{ $doctor->doc_fname . ' ' . $doctor->doc_lname }}
                                </h4>
                                <h4 class="card-title mb-4">Available : 8:00pm-9:00pm</h4>
                            </div>
                            <div class="card-body">
                                <form id="confirmMeetingForm" action="/confirmLive" method="POST" class="row">
                                    @csrf
                                    {{-- <input value="{{ $patient->pat_id }}" type="hidden" name="pat_id"> --}}
                                    <input value="{{ $doctor->doc_id }}" type="hidden" name="doc_id">
                                    <input value="20:00" type="hidden" name="con_time">
                                    <input type="hidden" name="meetinId" id="meetingid" value="">
                                    {{-- <input type="hidden" id="joinMeetingId"> --}}
                                    <div class="col-lg-12">
                                        <input class="inp-form form-control" type="date" name="meetingdate"
                                            aria-label="default input example" min="<?php echo date('Y-m-d'); ?>">
                                        @error('meetingdate')
                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <i class="fa-solid fa-triangle-exclamation"></i>
                                                <div> {{ $message }} </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <input onclick="createIdMeeting(true)" class="inp-form form-control" type="text"
                                            placeholder="Consultation Title" name="con_title" id="con_title"
                                            aria-label="default input example">
                                        @error('con_title')
                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <i class="fa-solid fa-triangle-exclamation"></i>
                                                <div> {{ $message }} </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="inp-form form-control" placeholder="Please Enter The Purpose of The Consultation" name="meetingDec"
                                            id="meetingDec" aria-label="default input example" style="height: 120px"></textarea>
                                        @error('meetingDec')
                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <i class="fa-solid fa-triangle-exclamation"></i>
                                                <div> {{ $message }} </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <input type="submit"
                                        value="Confirm "class="btn-front card-btn btn btn-primary mb-3 py-2">
                                </form>
                            </div>
                        </div>
                    </article>

                </div>

            </section>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="../js/meeting/meeting.js"></script>
    <script src="https://sdk.videosdk.live/js-sdk/0.0.37/videosdk.js"></script>
    <script src="../js/meeting/config.js"></script>
@endsection
