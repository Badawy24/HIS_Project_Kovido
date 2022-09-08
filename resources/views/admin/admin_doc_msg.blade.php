<?php
use Illuminate\Support\Facades\DB;
?>
@extends('admin.admin-dashbord-temp')
@section('content')
    <div class='form'>
        <div class="container">
            <form action='admin_doc_msg' method='post' class="row">
                <div class="col-md-8">
                    @csrf
                    <select class="form-select" aria-label="Default select example" name="doc_mail">
                        <option selected disabled>Choose Doctor Name</option>
                        @foreach (session('doc_name') as $doc)
                            <option value="{{ $doc->doc_email }}"> {{ $doc->doc_fname . ' ' . $doc->doc_lname }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn mb-3 submit search-btn" value="Search">
                </div>
            </form>
        </div>
    </div>
    <div class="doc-data">
        <div class="container">
            @if (Session::has('doc_msg'))
                <p class="doc-btn">
                    <button class="btn btn-primary" type="submit" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Get Message Know <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                    </button>
                </p>
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">There id {{count(Session::get('doc_msg'))}} Message For Doctor <?php $dname = DB::select('select * from doctor where doc_email = ?', [Session::get('doc_email')]);
                            echo $dname[0]->doc_fname . ' ' . $dname[0]->doc_lname; ?> <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Message ID</th>
                                    <th>Doctor ID</th>
                                    <th>Patient ID</th>
                                    <th>Message</th>
                                    <th>Reply</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('doc_msg') as $msg)
                                    <tr>
                                        <td>{{ $msg->msg_id }}</td>
                                        <td>{{ $msg->doc_id }}</td>
                                        <td>{{ $msg->pat_id }}</td>
                                        <td>{{ $msg->message }}</td>
                                        <td>{{ $msg->reply }}</td>
                                        <td class="report-icon">
                                            <a href="/admin_doc_msg/{{ $msg->msg_id }}/{{ $msg->doc_id }}">
                                                <i class="del-icon fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
        </div>
    </div>
@endsection
