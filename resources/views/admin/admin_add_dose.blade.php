@extends('admin.admin-dashbord-temp')
@section('content')
    <div class="form-add-doc">
        <div class="container">
            <div class="doc-data">
                <div class="card card-body">
                    <p class="head">There is <span>{{ count(session('dose_type')) }}</span> Vaccines in System</p>
                </div>
            </div>
            <hr>
            <form action="dose_add" method="post">
                @csrf
                @if (Session::has('success'))
                    <div class="col-md-8 alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="col-md-8 alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="row">
                    <div class="col-md-6 update-inp">
                        <input class="form-control" name="dose_name" type="text" placeholder="Vaccine Name"
                            aria-label="default input example" value="{{ old('dose_name') }}">
                        @error('dose_name')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div> {{ $message }} </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="update-btn" value="Add Vaccine">
                    </div>
                </div>
            </form>
            <br>
            <section>
                <div class="doc-data">
                    <div class="container">
                        <p class="doc-btn">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Get Vaccine Data Now <i class="fa-solid fa-arrow-turn-down fa-bounce"></i>
                            </button>
                        </p>
                        @if (session('dose_data'))
                            <div class="report collapse" id="collapseExample">
                                <div class="card card-body">
                                    <hr>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Vaccine ID</th>
                                                <th>Vaccine name</th>
                                                <th>Edit</th>
                                                <th>Del</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (session('dose_type') as $dose)
                                                <tr>
                                                    <td>{{ $dose->dose_id }}</td>
                                                    <td>{{ $dose->vaccine_name }}</td>
                                                    <td class="report-icon">
                                                        <a href="">
                                                            <i class="edit-icon fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    </td>
                                                    <td class="report-icon">
                                                        <a href="">
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
            </section>
        </div>
    </div>
@endsection
