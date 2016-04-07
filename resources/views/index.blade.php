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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/slick/slick.css') }}">
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
            <div class="col-md-12 col-sm-12 col-xs-12">
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
    <div class="benefits-block">
        <div class="container">
            <div class="row">
                <div class="benefits-title col-md-12 col-sm-12 col-xs-12">
                    Benefits
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="benefits-image-holder">
                        <img src="assets/img/benefits.jpg">
                    </div>
                    <div class="benefits-text">
                        EASY ipsum solaordaf ölaisdpfoia psfdüa sfüa üofiasdü fijaüosud fü
                    </div>
                    <div class="benefits-btn-holder">
                        <a href="#" class="benefits-btn">Learn more...</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="benefits-image-holder">
                        <img src="assets/img/benefits.jpg">
                    </div>
                    <div class="benefits-text">
                        Use anywhere solaordaf ölaisdpfoia psfdüa sfüa üofiasdü fijaüosud fü
                    </div>
                    <div class="benefits-btn-holder">
                        <a href="#" class="benefits-btn">Learn more...</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="benefits-image-holder">
                        <img src="assets/img/benefits.jpg">
                    </div>
                    <div class="benefits-text">
                        Instant results solaordaf ölaisdpfoia psfdüa sfüa üofiasdü fijaüosud fü
                    </div>
                    <div class="benefits-btn-holder">
                        <a href="#" class="benefits-btn">Learn more...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-slider-holder">
        <div class="container">
            <div class="home-slider">
                <div class="slide clearfix">
                    <div class="home-slider-image-holder">
                        <img src="assets/img/authors/avatar-man.png">
                    </div>
                    <div class="home-slider-text-holder">
                        <div class="home-slider-text">
                            "...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et metus in tellus
                            ultrices placerat et ut lectus. Proin sollicitudin sollicitudin efficitur.
                            Nam scelerisque eros sapien, id imperdiet massa semper nec. Aliquam commodo,
                            libero sollicitudin commodo lacinia, tortor mi posuere lectus,
                            vel finibus nulla mi sed lacus. Nulla lobortis rutrum dolor, tempus auctor turpis
                            . Nullam finibus condimentum libero nec venenatis. Nunc consectetur ultricies enim..."
                        </div>
                        <div class="home-slider-company">
                            Name Lastname, Company - City, Country
                        </div>
                    </div>
                </div>
                <div class="slide clearfix">
                    <div class="home-slider-image-holder">
                        <img src="assets/img/authors/avatar-woman.png">
                    </div>
                    <div class="home-slider-text-holder">
                        <div class="home-slider-text">
                            "...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et metus in tellus
                            ultrices placerat et ut lectus. Proin sollicitudin sollicitudin efficitur.
                            Nam scelerisque eros sapien, id imperdiet massa semper nec.
                            Nunc consectetur ultricies enim..."
                        </div>
                        <div class="home-slider-company">
                            Name Lastname, Company - City, Country
                        </div>
                    </div>
                </div>
                <div class="slide clearfix">
                    <div class="home-slider-image-holder">
                        <img src="assets/img/authors/avatar-man.png">
                    </div>
                    <div class="home-slider-text-holder">
                        <div class="home-slider-text">
                            "...Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nam scelerisque eros sapien, id imperdiet massa semper nec. Aliquam commodo,
                            libero sollicitudin commodo lacinia, tortor mi posuere lectus,
                            vel finibus nulla mi sed lacus. Nulla lobortis rutrum dolor, tempus auctor turpis
                            . Nullam finibus condimentum libero nec venenatis. Nunc consectetur ultricies enim..."
                        </div>
                        <div class="home-slider-company">
                            Name Lastname, Company - City, Country
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-slider-prev"><i class="fa fa-chevron-circle-left"></i></div>
        <div class="home-slider-next"><i class="fa fa-chevron-circle-right"></i></div>
    </div>
    <div class="most-calendar-block">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="most-image-holder">
                        <img src="assets/img/90-image.jpg">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="most-text-holder">
                        <div class="most-title">
                            Most people use a calendar
                        </div>
                        <div class="most-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nam a orci malesuada elit rutrum sagittis. Cras vitae rhoncus magna.
                            Nulla tincidunt efficitur sapien eget imperdiet. Sed egestas tincidunt posuere.
                            Pellentesque sit amet quam justo. Mauris eu tristique sem.
                        </div>
                        <div class="most-btn-holder">
                            <a href="#" class="most-btn">Learn more...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-features-block">
        <div class="container">
            <div class="row home-features-sub-block">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="home-features-block-title">
                        Features
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="features-image-holder">
                        <img src="assets/img/responsive.jpg">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="features-text-block-title">
                        Mobile optimized
                    </div>
                    <div class="features-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Maecenas elit velit, auctor sed ante id, euismod mollis arcu.
                        Phasellus elit leo, pellentesque id suscipit sit amet, eleifend vitae enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse ornare, justo quis rutrum venenatis, leo elit fermentum quam,
                        at vehicula nulla nibh quis erat. Morbi vitae nisl odio. Proin sed erat suscipit,
                        luctus nisl vehicula, ornare arcu. Donec purus felis, varius id tempor eget, consequat et dui.
                        Ut aliquam pulvinar tellus in tempor.
                    </div>
                </div>
            </div>
            <div class="row home-features-sub-block">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="features-text-block-title">
                        Timezone & DST handling
                    </div>
                    <div class="features-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Maecenas elit velit, auctor sed ante id, euismod mollis arcu.
                        Phasellus elit leo, pellentesque id suscipit sit amet, eleifend vitae enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse ornare, justo quis rutrum venenatis, leo elit fermentum quam,
                        at vehicula nulla nibh quis erat. Morbi vitae nisl odio. Proin sed erat suscipit,
                        luctus nisl vehicula, ornare arcu. Donec purus felis, varius id tempor eget, consequat et dui.
                        Ut aliquam pulvinar tellus in tempor.
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="features-image-holder">
                        <img src="assets/img/timezone.jpg">
                    </div>
                </div>
            </div>
            <div class="row home-features-sub-block">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="features-image-holder">
                        <img src="assets/img/audience.jpg">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="features-text-block-title">
                        Any Audience
                    </div>
                    <div class="features-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Maecenas elit velit, auctor sed ante id, euismod mollis arcu.
                        Phasellus elit leo, pellentesque id suscipit sit amet, eleifend vitae enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse ornare, justo quis rutrum venenatis, leo elit fermentum quam,
                        at vehicula nulla nibh quis erat. Morbi vitae nisl odio. Proin sed erat suscipit,
                        luctus nisl vehicula, ornare arcu. Donec purus felis, varius id tempor eget, consequat et dui.
                        Ut aliquam pulvinar tellus in tempor.
                    </div>
                </div>
            </div>
            <div class="row home-features-sub-block">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="features-text-block-title">
                        Fair Billing
                    </div>
                    <div class="features-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Maecenas elit velit, auctor sed ante id, euismod mollis arcu.
                        Phasellus elit leo, pellentesque id suscipit sit amet, eleifend vitae enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse ornare, justo quis rutrum venenatis, leo elit fermentum quam,
                        at vehicula nulla nibh quis erat. Morbi vitae nisl odio. Proin sed erat suscipit,
                        luctus nisl vehicula, ornare arcu. Donec purus felis, varius id tempor eget, consequat et dui.
                        Ut aliquam pulvinar tellus in tempor.
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="features-image-holder">
                        <img src="assets/img/fair-billing.jpg">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full-feature">
                        Or check out our full feature list <a href="#">here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-prices-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="prices-block-title">
                        Prices
                    </div>
                </div>
                <img src="assets/img/free-plan.jpg">
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
    <script type="text/javascript" src="{{ asset('assets/vendors/slick/slick.js') }}"></script>
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
        $('.home-slider').slick({
            infinite: true,
            slidesToShow: 1,
            adaptiveHeight: true,
            arrows: false,
            fade: true
        });
        $('.home-slider-prev').click(function () {
            $('.home-slider').slick('slickPrev');
        });
        $('.home-slider-next').click(function () {
            $('.home-slider').slick('slickNext');
        });
       
       
    </script>
    <!--page level js ends-->

@stop
