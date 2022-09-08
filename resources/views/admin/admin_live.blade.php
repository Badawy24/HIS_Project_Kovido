@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="doc-data">
        <div class="container">
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Live Consultation Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            @if (session('con_data'))
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span>{{ count(session('con_data')) }}</span> Consultation in
                            System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('con_data') as $con)
                                    <tr>
                                        <td>{{ $con->con_id }}</td>
                                        <td>{{ $con->con_title }}</td>
                                        <td>{{ $con->con_desc }}</td>
                                        <td>{{ $con->con_date }}</td>
                                        <td>{{ $con->con_time }}</td>
                                        <td>{{ $con->con_duration }}</td>
                                        <td>{{ $con->pat_fname . ' ' . $con->pat_lname }}</td>
                                        <td>{{ $con->doc_fname . ' ' . $con->doc_lname }}</td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_update/{{ $con->con_id }}">
                                                <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_del/{{ $con->con_id }}">
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
