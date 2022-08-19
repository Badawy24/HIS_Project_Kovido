@extends('main-template')
@section('content')
<div class="page">
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    @if(count($my_tests)==0)
    <h5 class="table_heading_3">you don't have any reservations</h2>
        <a class="link " href="/new_test" style="color:blue; margin-left : 470px "> Make Reservation </a>
        @endif

        @if(count($my_tests) > 0)
        <h3 class="table_heading_3">Your reservation list </h3>
        <table class="layout display responsive-table">
            <thead>
                <tr>
                    <th class="t_name_col_width ">Test name</th>
                    <th class="t_date_col_width ">Date</th>
                    <th class="t_time_col_width">Time</th>
                    <th class="t_time_col_width">Address</th>
                    <th class="t_actions_col_width ">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ( $my_tests as $testcase )
                <tr>
                    <td class="t_name_col_width ">{{ $testcase->test_name }}</td>
                    <td class="t_date_col_width ">{{ $testcase->pat_test_date }}</td>
                    <td class="t_time_col_width ">{{ $testcase->pat_test_time }}</td>
                    <td class="t_time_col_width ">{{ $testcase->hc_name }}</td>


                    <td class="t_action_col_width">
                        <button class="btn btn-primary mb-3 submit table_button" onclick="window.location.href = '/update_test/{{ $testcase->res_id }}';"> Edit </button>
                        <button class="btn btn-primary mb-3 submit table_button" style="background-color:red" onclick="window.location.href = '/delete/{{ $testcase->res_id }}';"> Remove </button>
                    </td>

                </tr>
                @endforeach

                <!-- @for($i = 0; $i < count($my_tests) ; $i++)
                <tr>
                    <td class="t_name_col_width ">$my_tests[i]->test_name</td>
                    <td class="t_date_col_width "></td>
                    <td class="t_time_col_width "></td>
                    <td class="t_action_col_width">
                        <button class="btn btn-primary mb-3 submit table_button" onclick="window.location.href = '/update_test';"> Edit </button>
                        <button class="btn btn-primary mb-3 submit table_button"> Remove </button>
                    </td>
                </tr>
            @endfor -->
            </tbody>
        </table>
        @endif

</div>
@endsection
