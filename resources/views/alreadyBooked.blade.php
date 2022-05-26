<!-- Badawy -->
@extends('main-template')

@section('content')
    <div class="contact_us main-div-login booked">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card px-2 py-2 mb-5">
                        <div class="card-body">
                            <h3 class="card-title text-center">First Dose</h3>
                            <br>
                            <h4 class="card-title mb-4">Vaccine Name : <span>{{ $dose->vaccine_name }}</span></h4>
                            <h4 class="card-title mb-4">Healthcare Center : <span>{{ $hecs->hc_name }}</span></h4>
                            <h4 class="card-title mb-4">City : <span>{{ $hecs->hc_address }}</span></h4>
                            <h4 class="card-title mb-4">Date : <span>{{ $appo->pat_dose_date }}</span></h4>
                            <h4 class="card-title mb-4">Time : <span>{{ $appo->pat_dose_time }}</span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card px-2 py-2 mb-5">
                        <div class="card-body">
                            <h3 class="card-title text-center">Second Dose</h3>
                            <br>
                            <h4 class="card-title mb-4">Vaccine Name : <span>{{ $dose->vaccine_name }}</span></h4>
                            <h4 class="card-title mb-4">Healthcare Center : <span>{{ $hecs->hc_name }}</span></h4>
                            <h4 class="card-title mb-4">City : <span>{{ $hecs->hc_address }}</span></h4>
                            {{-- <h4 class="card-title mb-4">Date : <span
                                    style="color:red">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appo->pat_dose_time)->format('d-m-Y') }}</span>
                            </h4> --}}
                            <h4 class="card-title mb-4">Date : <span
                                    style="color:red">{{ date('Y-m-d', strtotime($appo->pat_dose_date . '+ 14 days')) }}</span>
                            </h4>
                            <h4 class="card-title mb-4">Time : <span>{{ $appo->pat_dose_time }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
