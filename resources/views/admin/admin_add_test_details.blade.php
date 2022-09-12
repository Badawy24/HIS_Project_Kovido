@extends('admin.admin-dashbord-temp')
@section('content')
<div class="main-div-login">
    <div class="container">
        <div class="row">
        <h6 style="text-align: center;">Here, you can add a New Test to the System </h6>
        <hr>
            <div class="register-form">
                <!-- ////////////// -->
                <form action="admin_add_test_details" method="POST" class="row">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif

                    @csrf


                    <div class="col-md-6">
                        <input class=" form-control" type="text" placeholder="Test Name" name="test_name"  id="te_name" aria-label="default input example">

                    </div>




                    <div class="col-md-6">
                        <input type="submit" class=" update-btn  btn btn-primary mb-3 submit " value="Add Test" name="add_test">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection