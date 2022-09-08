@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="doc-data">
        <div class="container">
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Live Meeting Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            @if (session('meet_data'))
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span>{{ count(session('meet_data')) }}</span> Meeting in
                            System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>Doctor Name</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('meet_data') as $meet)
                                    <tr>
                                        <td>{{ $meet->meet_id }}</td>
                                        <td>{{ $meet->meet_desc }}</td>
                                        <td>{{ $meet->meet_date }}</td>
                                        <td>{{ $meet->meet_time }}</td>
                                        <td>{{ $meet->meet_duration }}</td>
                                        <td>{{ $meet->doc_fname . ' ' . $meet->doc_lname }}</td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_update/{{ $meet->meet_id }}">
                                                <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td class="report-icon">
                                            <a href="/admin_dose_data_del/{{ $meet->meet_id }}">
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
