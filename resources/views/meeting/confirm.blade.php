<!-- Badawy -->
@extends('main-template')
@section('content')
    <div class="service-page">
        <div class="container text-center">
            <h2 class="head-cards h2 py-3">Confirm Your Live Consultation</h2>
            <section>
                <div class="row justify-content-md-center">
                    <article class="col-md-5 d-flex align-items-stretch">
                        <div class="card px-2 py-2 mb-5" style="min-width: 100%">

                            <div class="card-body text-start">
                                <h4 class="card-title mb-4">Name : {{ $patient->pat_fname . ' ' . $patient->pat_lname }}</h4>
                                <h4 class="card-title mb-4">Doctor : {{ $doctor->doc_fname . ' ' . $doctor->doc_lname }}</h4>
                                <h4 class="card-title mb-4">Available : 8:00pm-9:00pm</h4>
                            </div>
                            <div class="card-body">
                                <form action="" class="row">
                                    @csrf
                                    <input value="{{ $patient->pat_id }}" type="hidden" name="pat_id">
                                    <input value="{{ $doctor->doc_id }}" type="hidden" name="doc_id">
                                    <input value="20:00" type="hidden" name="con_time">
                                    <input value="" type="hidden" name="meetinId">
                                    <div class="col-lg-12">
                                        <input class="inp-form form-control" type="date" name="meetingdate"
                                            aria-label="default input example">
                                        @error('meetingdate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <input class="inp-form form-control" type="text" placeholder="Consultation Title"
                                            name="con_title" id="con_title" aria-label="default input example">
                                        @error('con_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="inp-form form-control" placeholder="Please Enter The Purpose of The Consultation" name="meetingDec"
                                            id="meetingDec" aria-label="default input example" style="height: 120px"></textarea>
                                        @error('meetingDec')
                                            <span class="text-danger">{{ $message }}</span>
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
