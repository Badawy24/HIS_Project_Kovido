@extends('main-template')
@section('content')
    <div class="menu">
        <div class="container">

            <div class="row ">

                <div class="col-md-4">
                    <img id="test1" class="test_image_1" src="/images/test_menu.png" />
                </div>


                <div class="col-md-4">
                    <div class="test_menu">

                        <div class="choice-1">
                            <p class="card-text">
                                To Perform a New Reservation
                            </p>
                            <button class="btn-front btn btn-primary mb-3 submit"
                                onclick="window.location.href = '/new_test';"> New Test </button>
                        </div>

                        <div class="choice-2">
                            <p class="card-text">
                                To Edit an Existing Reservation
                            </p>
                            <button class="btn-front    btn btn-primary mb-3 submit"
                                onclick="window.location.href = '/my_tests';"> My Tests </button>
                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <img id="test2" class="test_image_2" src="/images/test_menu_2.png" />
                </div>

            </div>

        </div>

    </div>
@endsection
