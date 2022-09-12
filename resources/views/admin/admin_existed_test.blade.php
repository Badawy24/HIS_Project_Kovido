@extends('admin.admin-dashbord-temp')
@section('content')
<div class="main-div-login ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="test-form test_names ">

                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif



                    <div class="doc-data ">
                        <p class="head"> There is <span>{{ count($tes_names) }}</span> Tests Avilable on the System
                        </p>
                        <hr>
                    </div>

                    <table>

                        <thead>
                            <tr>
                                <th>Test ID </th>
                                <th>Test Name</th>
                                <th>Delete Test</th>
                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($tes_names as $tes)
                            <tr>
                                <td>{{ $tes->test_id }}</td>
                                <td>{{ $tes->test_name }}</td>
                                <td class="report-icon">
                                    <a href="/admin_test_del/{{ $tes->test_id }}">
                                        <i class="del-icon fa-solid fa-trash"></i>
                                    </a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>

                    </table>



                    <button class="btn btn-primary mb-1 update-btn submit no_res_button admin_add_test_button " onclick="window.location.href = '/admin_add_test_details'"> Add New Test</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection