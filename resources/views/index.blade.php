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
                {{--<button class="add-test-event">--}}
                    <a href="{{ URL::to('event/add') }}" class="add-test-event" id="addevent" data-toggle="modal">@lang('frontend.add_event_link')</a>
                {{--</button>--}}
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
                <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
                    <div class="home-prices-sub-block">
                        <div class="prices-sub-block-title">
                            Flexible plans with no surprises
                        </div>
                        <div class="prices-sub-block-text">
                            Whether you're a business or an individual,<br>
                            there's an EventFellows plan for you.
                        </div>
                        <div class="">
                            <a class="credits-btn" href="#">
                                <div class="credits-btn-text">Pay-as-you-Go Credits</div>
                                <div class="credits-btn-sub-text">for occasional users</div>
                            </a>
                        </div>
                        <div class="">
                            <a class="plans-btn" href="#">
                                <div class="plans-btn-text">Subscription Plans</div>
                                <div class="plans-btn-sub-text">for regular users</div>
                            </a>
                        </div>
                        <img class="free-plan-text" src="assets/img/free-plan.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="for-you-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="for-you-block-title">
                        Is EventFellows for you?
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="for-you-block-image-holder">
                        <img class="free-plan-text" src="assets/img/queck-list.jpg">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="for-you-sub-block">
                        <div class="for-you-sub-block-title">
                            Great Service + Better Attendance
                        </div>
                        <div class="for-you-sub-block-text">
                            <p>EventFellows is not for everyone...</p>
                            <p>
                                But with most people using digital calendars today
                                chances are - you event will also benefit from it.
                            </p>
                            <p>Give it a free try and find out!</p>
                        </div>
                        <div class="for-you-sub-block-btn-holder">
                            <a href="{{ URL::to('event/add')}}" class="for-you-sub-block-btn" id="addevent" data-toggle="modal">@lang('frontend.add_event_link')</a>
                            <img class="for-you-sub-block-image" src="assets/img/for-you-text.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="common-questions-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="common-questions-block-title">
                        Common questions
                    </div>
                </div>
                <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How much does it cost?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum ipsum odio, fringilla quis mauris in, finibus vehicula elit.
                                    Ut sollicitudin massa eu diam congue, ac placerat nisi posuere.
                                    Duis dapibus nibh vel venenatis sodales. Cras sed consequat massa.
                                    Pellentesque tempus justo odio, sed scelerisque mi volutpat ac.
                                    Mauris ac velit ante. Nullam et convallis ipsum. Etiam tincidunt,
                                    elit et hendrerit feugiat, ipsum orci fermentum leo,
                                    non volutpat tellus ipsum id diam. Pellentesque neque dolor,
                                    tincidunt nec tellus at, luctus fermentum libero.
                                    Fusce sit amet ex sit amet arcu faucibus ullamcorper in viverra risus.
                                    Ut viverra mauris id est tincidunt, eget gravida sapien laoreet.
                                    Nullam egestas dictum dui, nec malesuada libero ultricies non.
                                    Etiam id nisi ipsum. Ut sit amet mauris velit.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Do I need to be a developer to use it?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum ipsum odio, fringilla quis mauris in, finibus vehicula elit.
                                    Ut sollicitudin massa eu diam congue, ac placerat nisi posuere.
                                    Duis dapibus nibh vel venenatis sodales. Cras sed consequat massa.
                                    Pellentesque tempus justo odio, sed scelerisque mi volutpat ac.
                                    Mauris ac velit ante. Nullam et convallis ipsum. Etiam tincidunt,
                                    elit et hendrerit feugiat, ipsum orci fermentum leo,
                                    non volutpat tellus ipsum id diam. Pellentesque neque dolor,
                                    tincidunt nec tellus at, luctus fermentum libero.
                                    Fusce sit amet ex sit amet arcu faucibus ullamcorper in viverra risus.
                                    Ut viverra mauris id est tincidunt, eget gravida sapien laoreet.
                                    Nullam egestas dictum dui, nec malesuada libero ultricies non.
                                    Etiam id nisi ipsum. Ut sit amet mauris velit.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Do I have to pay for subscription?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum ipsum odio, fringilla quis mauris in, finibus vehicula elit.
                                    Ut sollicitudin massa eu diam congue, ac placerat nisi posuere.
                                    Duis dapibus nibh vel venenatis sodales. Cras sed consequat massa.
                                    Pellentesque tempus justo odio, sed scelerisque mi volutpat ac.
                                    Mauris ac velit ante. Nullam et convallis ipsum. Etiam tincidunt,
                                    elit et hendrerit feugiat, ipsum orci fermentum leo,
                                    non volutpat tellus ipsum id diam. Pellentesque neque dolor,
                                    tincidunt nec tellus at, luctus fermentum libero.
                                    Fusce sit amet ex sit amet arcu faucibus ullamcorper in viverra risus.
                                    Ut viverra mauris id est tincidunt, eget gravida sapien laoreet.
                                    Nullam egestas dictum dui, nec malesuada libero ultricies non.
                                    Etiam id nisi ipsum. Ut sit amet mauris velit.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How to I best get started?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFoure">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum ipsum odio, fringilla quis mauris in, finibus vehicula elit.
                                    Ut sollicitudin massa eu diam congue, ac placerat nisi posuere.
                                    Duis dapibus nibh vel venenatis sodales. Cras sed consequat massa.
                                    Pellentesque tempus justo odio, sed scelerisque mi volutpat ac.
                                    Mauris ac velit ante. Nullam et convallis ipsum. Etiam tincidunt,
                                    elit et hendrerit feugiat, ipsum orci fermentum leo,
                                    non volutpat tellus ipsum id diam. Pellentesque neque dolor,
                                    tincidunt nec tellus at, luctus fermentum libero.
                                    Fusce sit amet ex sit amet arcu faucibus ullamcorper in viverra risus.
                                    Ut viverra mauris id est tincidunt, eget gravida sapien laoreet.
                                    Nullam egestas dictum dui, nec malesuada libero ultricies non.
                                    Etiam id nisi ipsum. Ut sit amet mauris velit.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Can you help me with my integrations?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum ipsum odio, fringilla quis mauris in, finibus vehicula elit.
                                    Ut sollicitudin massa eu diam congue, ac placerat nisi posuere.
                                    Duis dapibus nibh vel venenatis sodales. Cras sed consequat massa.
                                    Pellentesque tempus justo odio, sed scelerisque mi volutpat ac.
                                    Mauris ac velit ante. Nullam et convallis ipsum. Etiam tincidunt,
                                    elit et hendrerit feugiat, ipsum orci fermentum leo,
                                    non volutpat tellus ipsum id diam. Pellentesque neque dolor,
                                    tincidunt nec tellus at, luctus fermentum libero.
                                    Fusce sit amet ex sit amet arcu faucibus ullamcorper in viverra risus.
                                    Ut viverra mauris id est tincidunt, eget gravida sapien laoreet.
                                    Nullam egestas dictum dui, nec malesuada libero ultricies non.
                                    Etiam id nisi ipsum. Ut sit amet mauris velit.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingSix">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        What are the benefits?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum ipsum odio, fringilla quis mauris in, finibus vehicula elit.
                                    Ut sollicitudin massa eu diam congue, ac placerat nisi posuere.
                                    Duis dapibus nibh vel venenatis sodales. Cras sed consequat massa.
                                    Pellentesque tempus justo odio, sed scelerisque mi volutpat ac.
                                    Mauris ac velit ante. Nullam et convallis ipsum. Etiam tincidunt,
                                    elit et hendrerit feugiat, ipsum orci fermentum leo,
                                    non volutpat tellus ipsum id diam. Pellentesque neque dolor,
                                    tincidunt nec tellus at, luctus fermentum libero.
                                    Fusce sit amet ex sit amet arcu faucibus ullamcorper in viverra risus.
                                    Ut viverra mauris id est tincidunt, eget gravida sapien laoreet.
                                    Nullam egestas dictum dui, nec malesuada libero ultricies non.
                                    Etiam id nisi ipsum. Ut sit amet mauris velit.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingSeven">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        I don't know how many people will use it, what should I do?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum ipsum odio, fringilla quis mauris in, finibus vehicula elit.
                                    Ut sollicitudin massa eu diam congue, ac placerat nisi posuere.
                                    Duis dapibus nibh vel venenatis sodales. Cras sed consequat massa.
                                    Pellentesque tempus justo odio, sed scelerisque mi volutpat ac.
                                    Mauris ac velit ante. Nullam et convallis ipsum. Etiam tincidunt,
                                    elit et hendrerit feugiat, ipsum orci fermentum leo,
                                    non volutpat tellus ipsum id diam. Pellentesque neque dolor,
                                    tincidunt nec tellus at, luctus fermentum libero.
                                    Fusce sit amet ex sit amet arcu faucibus ullamcorper in viverra risus.
                                    Ut viverra mauris id est tincidunt, eget gravida sapien laoreet.
                                    Nullam egestas dictum dui, nec malesuada libero ultricies non.
                                    Etiam id nisi ipsum. Ut sit amet mauris velit.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="common-questions-contact-block">
                        Have another questions? <a href="#">Contact us!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="container">--}}
    {{--</div>--}}

            {{--<!-- Our skills Section End -->--}}
        {{--</div>--}}
        {{--<!-- //Our Skills End -->--}}
    {{--</div>--}}
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
