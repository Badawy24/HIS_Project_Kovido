@extends('main-template')
@section('content')
<div class="home-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="home-content">
                    <h1 class="heading">
                        <span>CORONA</span>
                        <span class="heading-sm">
                            <span class="sup">COVID-19</span>
                            <span class="sub">VIRUS</span>
                        </span>
                    </h1>
                    <p class="lead">
                        The Coronavirus (COVID-19) was first reported in Wuhan, Hubei, China in December 2019, the outbreak was later recognized as a pandemic by the World Health Organization (WHO) on 11 March 2020.
                    </p>
                    <a href="/register"><button class="btn btn-primary protect-btn">Protect Your Slef Now <i class="fa-solid fa-shield-virus"></i></button></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="home-image">
                    <img src="/images/home.png" class="img-fluid"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection