@extends('admin.admin-dashbord-temp')
@section('content')
<div class="doc-data">
    <div class="container">
        <p class="doc-btn">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Get Doctor Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
            </button>
        </p>
        @if(session('doctors'))
        <div class="report collapse" id="collapseExample">
            <div class="card card-body">
                <p class="head">Data About {{ count(session('doctors')) }} doctors in System <br />
                Date : <?php $date = date('d-m-y h:i:s'); echo $date; ?></p>
                <hr>
                <table >
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th></th>
                    </tr>
                    @foreach (session('doctors') as $doc)
                        <tr>
                            <td>{{ $doc->doc_id }}</td>
                            <td>{{ $doc->doc_fname . ' ' . $doc->doc_lname }}</td>
                            <td>{{ $doc->doc_age }}</td>
                            <td>{{ $doc->doc_phone }}</td>
                            <td>{{ $doc->doc_email }}</td>
                            <td>{{ $doc->doc_pass }}</td>
                            <td>
                                <a href="/admin_doc_data/{{$doc->doc_id}}">
                                    <button type="button" class="btn btn-danger del-doc">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
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
