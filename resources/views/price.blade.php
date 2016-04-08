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

{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <div class="row">
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
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default price-panel">
                    <div class="panel-heading">
                        <div class="price-panel-title">Startup / Freelancer</div>
                        <div class="price-panel-price">38&euro;</div>
                        <div class="price-panel-sub-title">Forever Free</div>
                    </div>
                    <div class="panel-body text-center">
                        <div class="price-panel-body-heading">Ideal for testing</div>
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
                        <a class="btn btn-primary btn-block" href="#">Start 14-day trial</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default price-panel">
                    <div class="panel-heading">
                        <div class="price-panel-title">SME</div>
                        <div class="price-panel-price">87&euro;</div>
                        <div class="price-panel-sub-title">Paid Monthly</div>
                    </div>
                    <div class="panel-body">
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
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default price-panel">
                    <div class="panel-heading">
                        <div class="price-panel-title">Suscipizzle</div>
                        <div class="price-panel-price">140&euro;</div>
                        <div class="price-panel-sub-title">Paid Monthly</div>
                    </div>
                    <div class="panel-body">
                        <div class="price-panel-body-heading"></div>
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
                        <a class="btn btn-primary" href="#">
                            Sign up
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default price-panel">
                    <div class="panel-heading">
                        <div class="price-panel-title">Suscipizzle</div>
                        <div class="price-panel-price">489&euro;</div>
                        <div class="price-panel-sub-title">Paid Monthly</div>
                    </div>
                    <div class="panel-body">
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
