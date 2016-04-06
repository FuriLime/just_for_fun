@extends('layouts/default')

{{-- Page title --}}
@section('title')
Home
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/jquery.circliful.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl-carousel/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jQueryUI/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/index_page.css') }}">
    <!--end of page level css-->
@stop

{{-- slider --}}
@section('top')
    <!--Carousel Start -->
    <div id="owl-demo" class="owl-carousel owl-theme">
        <div class="item">
            <div class="slide-content">
                <div class="slide-head">
                    It’s like a digital butler service for event invitations...
                </div>
                <div class="slide-text">
                    90% of people today use a kind of digital calendar. EventFellows helps your event make it into these calendar as a means of great service.
                    <br><br>Your chance of higher attendance rates have never been better.
                </div>
                <button class="add-test-event">
                    Create Test Event
                </button>
            </div>
        </div>
    </div>
    <!-- //Carousel End -->
@stop

{{-- content --}}
@section('content')
    <div class="content calendars">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    {{--<img alt="Works with Microsoft Outlook Calendar, Google Calendar, Apple Calendar, Yahoo Calendar, Mozilla Thunderbird Calandar, Lotus Notes Calendar and many others"  src="assets/img/All-Calendars-970x75.png" title="">--}}
                    <div class="row calendars-holder">
                        <div class="col-md-2 col-sm-4 col-xs-6 single-calendar">
                            <img src="assets/img/outlook.png" alt="" title="">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 single-calendar">
                            <img src="assets/img/google-calendar.png" alt="" title="">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 single-calendar">
                            <img src="assets/img/apple-calendar.png" alt="" title="">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 single-calendar">
                            <img src="assets/img/yahoo.png" alt="" title="">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 single-calendar">
                            <img src="assets/img/mozilla-thunderbird.png" alt="" title="">
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 single-calendar">
                            <img src="assets/img/lotus-notes.png" alt="" title="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <p class="lead calendars-text">
                        <strong>and many<br>more...</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="how-it-works-block">
        <div class="container">
            <div class="col-md-12">
                <div class="how-it-works-title">How it works</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="hiw-text">
                    Enter your event details to
                    your free
                    EventFellows.com account
                    and use our "add to calendar options"
                    anywhere you like within minutes.
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="hiw-image-holder">
                            <img src="assets/img/letter.jpg">
                        </div>
                        <div class="hiw-image-text">
                            No installation. No programming.
                            It takes only seconds to get started.
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="hiw-image-holder">
                            <img src="assets/img/letter.jpg">
                        </div>
                        <div class="hiw-image-text">
                            No installation. No programming.
                            It takes only seconds to get started.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </div>
    
            <!-- Our skills Section End -->
        </div>
        <!-- //Our Skills End -->
    </div>
    <!-- //Container End -->
@stop

{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/owl-carousel/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script>
        var check =false; 
        $("#slider").slider({ 
            max: 1,
            min:0});
        //$("selector").slider();
        $("#slider").mousedown(function(){
            check = true
        });
        $(".ui-slider-container").mousedown(function(){
            if (check==false){
                if ($( "#slider").slider('value')==0){
                    $( "#slider").slider('value', 1);
                } else{
                    $( "#slider" ).slider('value',0);
                }           
            } else{
                check=false;
            };
        });
       
       
       
    </script>
    <!--page level js ends-->

@stop
