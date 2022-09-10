<?php
use Illuminate\Support\Facades\DB;
?>
@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="doc-data">
        <div class="container">
            @if (Session::has('success'))
            <div class="alert alert-success"><span class="closebtn">×</span>{{ Session::get('success') }}</div>
            @endif

            @if (Session::has('fail'))
            <div class="alert alert-danger"><span class="closebtn">×</span>{{ Session::get('fail') }}</div>
            @endif
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Live Consultation Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            @if (session('con_data'))
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-8">
                                <p class="head">Data About <span>{{ count(session('con_data')) }}</span> Consultation in
                                    System <br />
                                    Date : <?php $date = date('d-m-y h:i:s');
                                    echo $date; ?></p>
                            </div>
                            <div class="col-md-2  con_add_btn">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Add <i class="fa-solid fa-plus ms-1"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add New Consultation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="con_add" action="admin_live" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <input class="form-control" name="con_title" type="text"
                                                                placeholder="Consultation Title"
                                                                aria-label="default input example"
                                                                value="{{ old('con_title') }}">
                                                            @error('f_name')
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> {{ $message }} </div>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="pat_id">
                                                                <option selected disabled>Choose Patient Name</option>
                                                                <?php $pats = DB::select('select * from patient'); ?>
                                                                @foreach ($pats as $pat)
                                                                    <option value="{{ $pat->pat_id }}">
                                                                        {{ $pat->pat_fname . ' ' . $pat->pat_lname }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('pat_id')
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> {{ $message }} </div>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="doc_id">
                                                                <option selected disabled>Choose Doctor Name</option>
                                                                <?php $docs = DB::select('select * from doctor'); ?>
                                                                @foreach ($docs as $doc)
                                                                    <option value="{{ $doc->doc_id }}">
                                                                        {{ $doc->doc_fname . ' ' . $doc->doc_lname }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('doc_id')
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> {{ $message }} </div>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            <label for="">Consultation Date</label>
                                                            <input class="form-control" name="con_date" type="date"
                                                                placeholder="Consultation Date"
                                                                aria-label="default input example"
                                                                value="{{ old('col_date') }}">
                                                            @error('con_date')
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> {{ $message }} </div>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            <label for="">Consultation Time</label>
                                                            <input class="form-control" name="con_time" type="time"
                                                                placeholder="Consultation Time"
                                                                aria-label="default input example"
                                                                value="{{ old('con_time') }}">
                                                            @error('con_time')
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> {{ $message }} </div>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            <input class="form-control" name="con_duration" type="number"
                                                                placeholder="Consultation Duration"
                                                                aria-label="default input example"
                                                                value="{{ old('con_duration') }}">
                                                            @error('con_duration')
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> {{ $message }} </div>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" name="con_desc" placeholder="Consultation Description"></textarea>
                                                            @error('con_desc')
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                    <div> {{ $message }} </div>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="submit" class="update-btn" name="submit"
                                                                value="Save Data">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- end of model -->
                            </div>
                        </div>

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
