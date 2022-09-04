@extends('admin.admin-dashbord-temp')
@section('content')
@if(session('patientData'))

@if(session('patient_deleted'))
<div class="alerto info">
    <span class="closebtn">&times;</span>
    <strong>Info!</strong> {{ Session::get('patient_deleted') }}.
</div>
@endif

<form action="/admin_patient_data_show" method="post">
    <table class="patient">
        <caption>A summary of the patients recorded in system</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Phone</th>
                <th>ssn</th>
            </tr>
        </thead>
        <tbody>
            @foreach (session('patientData') as $patient)
            <tr>
                <td> {{ $patient->pat_id }} </td>
                <td> {{ $patient->pat_fname . ' ' . $patient->pat_lname }} </td>
                <td> {{ $patient->pat_age}} </td>
                <td> {{ $patient->pat_address }} </td>
                <td> {{ $patient->pat_phone }} </td>
                <td> {{ $patient->pat_SSN }} </td>
                <td>
                    <a href="/admin_patient_data_show/delete_doc/{{$patient->pat_id}}">
                        <button type="button" class="btn btn-danger del-doc">Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>

@else
<p>does not exist</p>
@endif
@endsection
