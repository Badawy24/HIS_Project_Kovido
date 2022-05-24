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
                <div class="row">
                    <h4 class='p-2'>Data About {{ count(session('doctors')) }} doctors in Our System : </h4>
                    <p class="lead"><b>Time :</b> <?php $date = date('d-m-y h:i:s'); echo $date; ?></pclass->
                    
                    @foreach (session('doctors') as $doc)
                        <div class="doc col-md-6">
                            <h5>Doctor Name : {{ $doc->doc_fname . ' ' . $doc->doc_lname }}</h5>
                            <p class="lead">Age : {{ $doc->doc_age}}</p>
                            <p class="lead">Phone Number : {{ $doc->doc_phone}}</p>
                            <p class="lead">E-mail : <a href="#"> {{ $doc->doc_email}} </a></p>
                        </div>
                    @endforeach
                </div>
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
