@extends('layouts/default')

{{-- Page title --}}
@section('title')
Price
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/price.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jQueryUI/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/index_page.css') }}">
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
                    <a href="#">Pricing</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="livicon icon3" data-name="money" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Pricing
            </div>
        </div>
    </div>
    @stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">

        <!-- Service Section Start-->
        <div class="row">
            <!-- Responsive Section Start -->
            <div class="text-center" id="prices-page">
                <span class="slide-head">Flexible plans with no surprises</span>
            </div>

            <div class="col-xs-12">
                <div class="text-center col-xs-4 col-xs-offset-4">
                    <span class="slide-text ">Whether you’re a business or an individual,there’s an EventFellows plan for you.Or simply start with our Free Plan.</span>
                </div>
            </div>
            <div class="col-xs-12 ui-slider">
                <div class="monthly">
                    Monthly
                </div>
                <div class="ui-slider-container">
                    <div id="slider"></div>
                </div>
                <div class="yearly">
                    Yearly
                </div>
            </div>
            <div class="col-xs-12 businesses">
                <div class="text-center">
                    <div class="plans-for">Plans for</div>
                    <span class="slide-head">Businesses</span>
                    <div class="plans-for-business">
                        <div class="plans-for">
                            Plans for Businesses
                        </div>
                        These plans are made to support professional event inviations also for private events at an affordable price.
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="box">

                    <div class="info">
                        <h3 class="success text-center">Lite</h3>
                        <p>Free</p>
                        <div class="text-right primary lite"><a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Responsive Section End -->
            <!-- Easy to Use Section Start -->
            <div class="col-sm-6 col-md-3">
                <!-- Box Start -->
                <div class="box">

                    <div class="info">
                        <h3 class="primary text-center">Small</h3>
                        <p>$7</p>
                        <div class="text-center">
                            Paid monthly
                        </div>
                        <div class="text-right primary">
                            <a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Easy to Use Section End -->
            <!-- Clean Design Section Start -->
            <div class="col-sm-6 col-md-3">
                <div class="box">

                    <div class="info">
                        <h3 class="warning text-center">Basic</h3>
                        <p>$18</p>
                        <div class="text-center">
                            Paid monthly
                        </div>
                        <div class="text-right primary">
                            <a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Clean Design Section End -->
            <!-- 20+ Page Section Start -->
            <div class="col-sm-6 col-md-3">
                <div class="box">
                    <div class="info">
                        <h3 class="yellow text-center">Business</h3>
                        <p>$79</p>
                        <div class="text-center">
                            Paid monthly
                        </div>
                        <div class="text-right primary">
                            <a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //20+ Page Section End -->
        </div>
        <!-- //Services Section End -->


        <div class="row">
            <h2> PRICING TABLES</h2>
            <!-- Vestibulizzle Section Start -->
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="text-white">Vestibulizzle</h3>
                    </div>
                    <div class="panel-body text-center">
                        <div class="box_round_symboll">
                            $19
                        </div>
                        <h4 class="success">Per Month</h4>
                        <ul>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                        </ul>
                        <a class="btn price-btn" href="#">Sign up
                        </a>
                    </div>
                </div>
            </div>
            <!-- //Vestibulizzle Section End -->
            <!-- Best Package Section Start -->
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="text-white">Best Package</h3>
                    </div>
                    <div class="panel-body">
                        <div class="box_round_symboll">
                            $25
                        </div>
                        <h4 class="success">Per Month</h4>
                        <ul>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                        </ul>
                        <a class="btn price-btn" href="#">Sign up </a>
                    </div>
                </div>
            </div>
            <!-- Best Package Section End -->
            <!-- Suscipizzle Section Start -->
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="text-white">Suscipizzle</h3>
                    </div>
                    <div class="panel-body">
                        <div class="box_round_symboll">
                            $38
                        </div>
                        <h4 class="success">Per Month</h4>
                        <ul>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                        </ul>
                        <a class="btn price-btn " href="#">
                            Sign up
                        </a>
                    </div>
                </div>
            </div>
            <!-- //Suscipizzle Section End -->
            <!-- Pretium Section Start -->
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="text-white">Pretium</h3>
                    </div>
                    <div class="panel-body">
                        <div class="box_round_symboll">
                            $42
                        </div>
                        <h4 class="success">Per Month</h4>
                        <ul>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                            <li>
                                Lorem Ipsum Dolor
                            </li>
                        </ul>
                        <a class="btn price-btn" href="#"> Sign up
                        </a>
                    </div>
                </div>
            </div>
            <!-- //Pretium Section End -->
        </div>
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script>
        var check = false;
        $("#slider").slider({
            max: 1,
            min: 0
        });
        //$("selector").slider();
        $("#slider").mousedown(function () {
            check = true
        });
        $(".ui-slider-container").mousedown(function () {
            if (check == false) {
                if ($("#slider").slider('value') == 0) {
                    $("#slider").slider('value', 1);
                } else {
                    $("#slider").slider('value', 0);
                }
            } else {
                check = false;
            }
            ;
        });
    </script>
@stop
