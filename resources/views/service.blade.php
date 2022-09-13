<!-- Badawy -->
@extends('main-template')
@section('content')
    <div class="service-page">
        <div class="container text-center">
            <h2 class="head-cards h1 py-3">Welcome To Our Services</h2>
            <section>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                {{-- Card Dase --}}
                                <div class="col-md-12">
                                    <div class="card px-2 py-2 mb-5">
                                        <div class="card-img serv-img">
                                            <img id="service1" src="/images/service/Vaccine.png" class="card-img-top"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Corona Vaccine Reservation</h4>
                                            <p class="card-text lead">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Sit
                                                laboriosam deserunt dicta necessitatibus ullam. </p>
                                        </div>
                                        <div class="card-body">
                                            <a href="/new_dose" class="btn-front card-btn btn btn-primary mb-3 py-2">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                {{-- Card Test --}}
                                <div class="col-md-12">
                                    <div class="card px-2 py-2 mb-5">
                                        <div class="card-img serv-img">
                                            <img id="service2" src="/images/service/test.png" class="card-img-top"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Reserve PCR Analysis</h4>
                                            <p class="card-text lead">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Sit
                                                laboriosam deserunt dicta necessitatibus ullam. </p>
                                        </div>
                                        <div class="card-body">
                                            <a href="/test_option" class="btn-front card-btn btn btn-primary mb-3 py-2">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">{{-- Card Contact --}}
                                <div class="col-md-12">
                                    <div class="card px-2 py-2 mb-5">
                                        <div class="card-img serv-img">
                                            <img id="service3" src="/images/service/contact-Doctor.png"
                                                class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Contact With Doctor</h4>
                                            <p class="card-text lead">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Sit
                                                laboriosam deserunt dicta necessitatibus ullam. </p>
                                        </div>
                                        <div class="card-body">
                                            <a href="/contact_doc"
                                                class="btn-front card-btn btn btn-primary mb-3 py-2">Contact Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">{{-- Card Live --}}
                                <div class="col-md-12">
                                    <div class="card px-2 py-2 mb-5">
                                        <div class="card-img serv-img">
                                            <img id="service4" src="/images/service/live.png" class="card-img-top"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Live Consultation</h4>
                                            <p class="card-text lead">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Sit
                                                laboriosam deserunt dicta necessitatibus ullam. </p>
                                        </div>
                                        <div class="card-body">
                                            <a href="/live_con" class="btn-front card-btn btn btn-primary mb-3 py-2">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon arrow_nav" aria-hidden="true"></span>
                        <span class="visually-hidden ">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon arrow_nav" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
        </div>
    </div>
@endsection
