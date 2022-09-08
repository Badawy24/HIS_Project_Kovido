@extends('admin.admin-dashbord-temp')
@section('content')
<div class="doc-data">
        <div class="container">

            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Test Reservation Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>

            @if (session('alltests'))
                <div class="report collapse" id="collapseExample">

                    <div class="card card-body">

                        <p class="head">Data About <span>{{ count(session('alltests')) }}</span> Test Reservations in
                            System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <hr>

                        <table>

                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Test Name</th>
                                    <th>Test Date</th>
                                    <th>Test time</th>
                                    <th>Health Care Center</th>
                                    <th>HC Address</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach (session('alltests') as $test)
                                    <tr>
                                        <td>{{ $test->pat_fname . ' ' . $test->pat_lname }}</td>
                                        <td>{{ $test->test_name }}</td>
                                        <td>{{ $test->pat_test_date }}</td>
                                        <td>{{ $test->pat_test_time }}</td>
                                        
                                        <td>{{ $test->hc_name }}</td>
                                        <td>{{ $test->hc_address }}</td>

                                        <td class="report-icon">
                                            <a href="/admin_test_data_update/{{ $test->res_id }}">
                                                <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>

                                        <td class="report-icon">
                                            <a href="/admin_test_re_del/{{ $test->res_id }}">
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
