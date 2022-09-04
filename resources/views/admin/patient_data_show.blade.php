@extends('admin.admin-dashbord-temp')
@section('content')
    @if(session('patientData'))
            <table>
            <caption>A summary of the patients recorded in system</caption>
                <thead>
                    <tr>
                        <th>patient Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
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
                        <td> {{ $patient->pat_email }} </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>

    @else
        <p>does not exist</p>
    @endif
@endsection
