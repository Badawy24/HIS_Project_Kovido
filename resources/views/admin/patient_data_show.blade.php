@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="doc-data">
        <div class="container">
            @if (session('patient_deleted'))
                <div class="alerto info">
                    <span class="closebtn">&times;</span>
                    <strong>Info!</strong> {{ Session::get('patient_deleted') }}.
                </div>
            @endif
            @if (session('updated'))
                <div class="alerto info">
                    <span class="closebtn">&times;</span>
                    <strong>Info!</strong> {{ Session::get('updated') }}.
                </div>
            @endif
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Patient Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            @if (session('patientData'))
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span>{{ count(session('patientData')) }}</span> Patients in System
                            <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?>
                        </p>
                        <hr>
                        <form action="/admin_patient_data_show" method="post">
                            <table class="patient">
                                <caption>A summary of the patients recorded in system</caption>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>SSN</th>
                                        <th>Birth Day</th>
                                        <th>Age</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('patientData') as $patient)
                                        <tr>
                                            <td> {{ $patient->pat_id }} </td>
                                            <td> {{ $patient->pat_fname . ' ' . $patient->pat_lname }} </td>
                                            <td> {{ $patient->pat_email }} </td>
                                            <td> {{ $patient->pat_address }} </td>
                                            <td> {{ $patient->pat_phone }} </td>
                                            <td> {{ $patient->pat_SSN }} </td>
                                            <td> {{ $patient->pat_DOF }} </td>
                                            <td> {{ $patient->pat_age }} </td>
                                            <td class="report-icon">
                                                <a href="/update_pat/{{ $patient->pat_id }}">
                                                    <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </td>
                                            <td class="report-icon">
                                                <a href="/admin_patient_data_show/delete_doc/{{ $patient->pat_id }}">
                                                    <i class="del-icon fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            @else
                <p>does not exist</p>
            @endif
        </div>
    </div>
@endsection
