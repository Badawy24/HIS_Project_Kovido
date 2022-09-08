@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="doc-data">
        <div class="container">
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Dose Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            @if (session('dose_data'))
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span>{{ count(session('dose_data')) }}</span> Reservation Doses in
                            System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Dose Name</th>
                                    <th>First Dose</th>
                                    <th>Second Dose</th>
                                    <th>Time Dose</th>
                                    <th>Health Care Center</th>
                                    <th>HC Address</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('dose_data') as $dose)
                                    <tr>
                                        <td>{{ $dose->pat_fname . ' ' . $dose->pat_lname }}</td>
                                        <td>{{ $dose->vaccine_name }}</td>
                                        <td>{{ $dose->pat_dose_date }}</td>
                                        <td>{{ date('Y-m-d', strtotime($dose->pat_dose_date . '+ 14 days')) }}</td>
                                        <td>{{ $dose->pat_dose_time }}</td>
                                        <td>{{ $dose->hc_name }}</td>
                                        <td>{{ $dose->hc_address }}</td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_update/{{ $dose->pat_id }}">
                                                <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_del/{{ $dose->pat_id }}">
                                                <i class="del-icon fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="no-doc collapse" id="collapseExample">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
