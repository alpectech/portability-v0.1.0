<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name','port~ability')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!--Styles-->
    <style>  
    .carousel-inner h1{
        /* text-shadow: 0px 0px 3px #000!important; */
        color:yellow!important;
    }
    .carousel-inner p{
        /* text-shadow: 0px 0px 3px #000!important; */
        color:ffffff!important;
        font-size: 1.1rem; 
    }
    </style>
</head>
<body>
@extends('layouts.app')
@section('content')
<div class="container mt-5 pt-3">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="first-slide" src="/images/move.png" alt="First slide" height="400px" width="1108px">
            <div class="container">
                <div class="carousel-caption text-left">
                <h1>Moving Just Got Easier;)</h1>
                <p>Are you tired of the hassle and bassle of moving to new homes. Port~Ability is here to cater for your needs!<br>You are just one click away from moving into your new home.</p>
                <p><a class="btn btn-lg btn-primary" href="/move/create" role="button">Let's move</a></p>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <img class="second-slide" src="/images/storage.png" alt="Second slide" height="400px" width="1108px">
            <div class="container">
                <div class="carousel-caption">
                <h1>We Offer Storage Facilities.</h1>
                <p>We offer container spaces to legal items including: heavy machinery, fragile goods, home items and any other than you can think of.<br>We ensure clean and uncongested environment for your items.</p>
                <p><a class="btn btn-lg btn-primary" href="/store/create" role="button">Book now</a></p>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <img class="third-slide" src="/images/Laptop_Teblet_and_Phone_HD_Background.jpg" alt="Third slide" height="400px" width="1108px">
            <div class="container">
                <div class="carousel-caption text-right">
                <h1>Enquiries.</h1>
                <p>For help or support. You can reach us through phone, email or our interactive website.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Talk to us</a></p>
                </div>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container mt-4 mx-auto">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
            <h2>Moving</h2>
            <p>We handle all the logistics concerning movement into your new home provided that you provide us with accurate information. We only need your: location, sub location and estate of both origin and destination; measure of your items; date of departure and mode of payment. </p>
            {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
            </div>
            <div class="col-md-4">
            <h2>Storage</h2>
            <p>We have spaces in form of containers to keep your items for minimum pay. We handle everything including pickup of your items. Just fill out the necessary information in the store page. Check out the link in the navigation bar. </p>
            {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
            </div>
            <div class="col-md-4">
            <h2>Enquiries</h2>
            <p>For any assistance, support or question concerning us and our services. Check out the link in the navigation bar.</p>
            {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
            </div>
        </div>
    </div>
    
</div>
@endsection
</body>
</html>
