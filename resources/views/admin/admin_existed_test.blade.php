@extends('admin.admin-dashbord-temp')
@section('content')
<div class="main-div-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="test-form">

                        @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif

                        
                        <p class="head">There is  <span>{{ count($tes_names) }}</span> Tests Avilable on the System </p>


                       
                        <table>

                            <thead>
                                <tr>
                                    <th>Test Name</th>
                                    <th>Delete Test</th>
                                </tr>
                                
                            </thead>


                            <tbody>

                                @foreach ($tes_names as $tes)
                                <tr>
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


                       
                        <button class="btn btn-primary mb-3 submit no_res_button admin_add_test_button" style="background-color:rgb(74, 129, 172)" onclick="window.location.href = '/admin_add_test_details'"> Add New Test</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection