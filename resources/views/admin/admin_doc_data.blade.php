@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="doc-data">
        <div class="container">
            <p class="doc-btn">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Get Doctor Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                </button>
            </p>
            @if (session('doctors'))
                <div class="report collapse" id="collapseExample">
                    <div class="card card-body">
                        <p class="head">Data About <span>{{ count(session('doctors')) }}</span> doctors in System <br />
                            Date : <?php $date = date('d-m-y h:i:s');
                            echo $date; ?></p>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('doctors') as $doc)
                                    <tr>
                                        <td>{{ $doc->doc_id }}</td>
                                        <td>{{ $doc->doc_fname . ' ' . $doc->doc_lname }}</td>
                                        <td>{{ $doc->doc_age }}</td>
                                        <td>{{ $doc->doc_phone }}</td>
                                        <td>{{ $doc->doc_email }}</td>
                                        <td class="report-icon">
                                            <a href="/admin_doc_data_update/{{ $doc->doc_id }}"><i class="edit-icon fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td class="report-icon">
                                            <a href="/admin_doc_data/{{ $doc->doc_id }}">
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
                            {{ session('msg') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
