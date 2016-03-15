@extends('layouts/default')

{{-- Page title --}}
@section('title')
Single Product| Welcome to Josh Frontend
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/popup.css') }}">

    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="#">Single Product</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="livicon icon3" data-name="edit" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Single Product
            </div>
        </div>
    </div>
@stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="important-popup">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 popup-content">
                    <div class="popup-head">
                        We are now preparing <span>Eventname</span> for you
                    </div>
                    <div class="estimated-time">
                        Estimated time: <span>10</span> seconds
                    </div>
                    <ul class="col-xs-4 col-xs-offset-4 popup-events-list">
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                        <li>
                            Checking some OMG IMPORTANT STAFF!!!
                        </li>
                    </ul>
                    <a href="#" class="col-xs-4 col-xs-offset-4 succ-btn">
                        <img src="img/yes.png"><span>Success:</span> Visit your EventPage
                    </a>
                    <div id="myCarousel" class="carousel slide col-xs-8 col-xs-offset-2" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="img_chania.jpg" alt="Chania" width="460" height="345">
                            </div>

                            <div class="item">
                                <img src="img_chania2.jpg" alt="Chania" width="460" height="345">
                            </div>

                            <div class="item">
                                <img src="img_flower.jpg" alt="Flower" width="460" height="345">
                            </div>

                            <div class="item">
                                <img src="img_flower2.jpg" alt="Flower" width="460" height="345">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="" aria-hidden="true"><</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="" aria-hidden="true">></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Container Section End -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!--page level js start-->
    {{--<script type="text/javascript" src="{{ asset('assets/js/frontend/elevatezoom.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-rating-master/bootstrap-rating.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/js/frontend/cart.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popup.js') }}"></script>
    <!--page level js start-->

@stop
