<!DOCTYPE html>
<!-- saved from url=(0034)http://event.test-y-sbm.com/signup -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <!-- global level css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- end of page level css -->

</head>

<body>
<div class="login-top-bar clearfix">
    <a href="/" class="login-logo-holder pull-left"><img src="/assets/images/logo.png"></a>
    <a href="/" class="login-sign-up-btn pull-right">Sign Up</a>
</div>
<div class="container">

    <div class="row vertical-offset-100">
        @include('notifications')
        <div class="sign-up-form col-md-6 col-md-offset-3">
            <h1>Thanks for coming on board.</h1>
            <div class="panel panel-default">
                <div class="panel-heading">Invitation from Matt Stauffer</div>
                <div class="panel-body panel-body-success">
                    We found your invitation <strong>to the Acme, Inc.</strong> team
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Invitations</div>
                <div class="panel-body">
                    You have an invitation from <strong>Chris Doe</strong> to join EventFellows please register you account
                    below so we can activate the referral bonuses for both of you.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Your Plan</div>
                <div class="panel-body">
                    You have selected the <strong>Lite</strong> ($0/monthly) plan
                    <button class="btn btn-primary pull-right"><i class="fa fa-arrow-circle-left"></i> Change Plan</button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Basics</div>
                <div class="panel-body">
                    <form action="{{ route('signup') }}" autocomplete="off" class="form-horizontal" method="post" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label for="email" class="col-sm-4 control-label">E-Mail Address</label>
                            <div class="col-sm-6">
                                <input type="email" name="email" required class="form-control"  autocomplete="off" id="email-address">
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                {!! $errors->first('my_name', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>


                        <div class="form-group {{ $errors->first('password', 'has-error') }}">
                            <label for="password" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="password" name="password" autocomplete="off" required type="password">
                                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I Accept The <a href="#">Terms Of Service</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {!! Honeypot::generate('my_name', 'my_time') !!}
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <a href="{{ URL::to('facebook') }}" class="btn btn-block btn-social btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                    Sign in with Facebook
                                </a>
                                <a href="{{ URL::to('twitter') }}" class="btn btn-block btn-social btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                    Sign in with Twitter
                                </a>
                                <a href="{{ URL::to('google') }}" class="btn btn-block btn-social btn-google-plus">
                                    <i class="fa fa-google-plus"></i>
                                    Sign in with Google
                                </a>
                                <a href="{{ URL::to('linked') }}" class="btn btn-block btn-social btn-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                    Sign in with LinkedIn
                                </a>
                                <a href="{{ URL::to('oauthwindows') }}" class="btn btn-block btn-social btn-linkedin">
                                    <i class="fa fa-microsoft"></i>
                                    Sign in with Microsoft
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-circle"></i> Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Billing Information</div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="first-name" class="col-sm-4 control-label">Card Number</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="first-name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Security Code</label>
                            <div class="col-sm-6">
                                <input class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Expiration</label>
                            <div class="col-sm-3 col-xs-6">
                                <input class="form-control" placeholder="MM">
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <input class="form-control" placeholder="YYYY">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">ZIP / Postal Code</label>
                            <div class="col-sm-6">
                                <input class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I Accept The <a href="#">Terms Of Service</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary" style="width:145px"><i class="fa fa-check-circle"></i> Begin 7 Day Trial</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!--livicons-->
<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
<script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/josh_frontend.js') }}"></script>
<!-- end of global js -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $( ".cancel-saving" ).on( "click", function() {
        window.location.href = '/';
    });
</script>
</body>
</html>



{{--@extends('layouts/default')--}}

{{-- Page title --}}
{{--@section('title')--}}
    {{--@lang('frontend.confirm_title')--}}
{{--@parent--}}
{{--@stop--}}

{{-- page level styles --}}
{{--@section('header_styles')--}}
    {{--<!--page level css starts-->--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/popup.css') }}">--}}

    {{--<!--end of page level css-->--}}
{{--@stop--}}

{{-- Page content --}}
{{--@section('content')--}}
    {{--<!-- Container Section Start -->--}}
    {{--<div class="important-popup">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-10 col-xs-offset-1 popup-content">--}}
                    {{--<div class="popup-head">--}}
                        {{--@lang('frontend.confirm_head')<span>{{$event->title}}</span> @lang('frontend.confirm_head_cont')--}}
                    {{--</div>--}}
                    {{--<div class="estimated-time">--}}
                        {{--@lang('frontend.confirm_time') <span>10</span> @lang('frontend.confirm_time_cont')--}}
                    {{--</div>--}}
                    {{--<ul class="col-xs-4 col-xs-offset-4 popup-events-list">--}}
                        {{--<li>--}}
                            {{--@lang('frontend.confirm_staff')--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.creating_outlook')--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.creating_google')--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.creating_yahoo')--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.creating_ical')--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.creating_eventpage') {{$event->title}}--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.adding_links')--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.optimizing_for_mobile')--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.adding_to_profile')--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--@lang('frontend.sending_confirmation')--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<a href="#" class="col-xs-4 col-xs-offset-4 succ-btn">--}}
                        {{--<img src="{{ asset('assets/images/yes.png') }}"><span>@lang('frontend.confirm_success')</span> @lang('frontend.confirm_visit')--}}
                    {{--</a>--}}
                    {{--<div id="myCarousel" class="carousel slide col-xs-8 col-xs-offset-2" data-ride="carousel">--}}
                        {{--<!-- Indicators -->--}}
                        {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="3"></li>--}}
                        {{--</ol>--}}

                        {{--<!-- Wrapper for slides -->--}}
                        {{--<div class="carousel-inner" role="listbox">--}}
                            {{--<div class="item active">--}}
                                {{--<div class="slide-head">--}}
                                    {{--Did you know?--}}
                                {{--</div>--}}
                                {{--<div class="slide-text">--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere vitae massa quis euismod. Suspendisse potenti. Vestibulum ultricies tortor et orci dignissim tincidunt. In rhoncus posuere leo at efficitur. Duis molestie scelerisque lacinia. Fusce non mattis est, eu euismod arcu. Fusce id turpis orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse dignissim neque at nulla scelerisque rutrum. Praesent ac commodo quam. In ac vulputate nunc. --}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="item">--}}
                                {{--<div class="slide-head">--}}
                                    {{--Did you know?--}}
                                {{--</div>--}}
                                {{--<div class="slide-text">--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere vitae massa quis euismod. Suspendisse potenti. Vestibulum ultricies tortor et orci dignissim tincidunt. In rhoncus posuere leo at efficitur. Duis molestie scelerisque lacinia. Fusce non mattis est, eu euismod arcu. Fusce id turpis orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse dignissim neque at nulla scelerisque rutrum. Praesent ac commodo quam. In ac vulputate nunc. --}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="item">--}}
                                {{--<div class="slide-head">--}}
                                    {{--Did you know?--}}
                                {{--</div>--}}
                                {{--<div class="slide-text">--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere vitae massa quis euismod. Suspendisse potenti. Vestibulum ultricies tortor et orci dignissim tincidunt. In rhoncus posuere leo at efficitur. Duis molestie scelerisque lacinia. Fusce non mattis est, eu euismod arcu. Fusce id turpis orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse dignissim neque at nulla scelerisque rutrum. Praesent ac commodo quam. In ac vulputate nunc. --}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="item">--}}
                                {{--<div class="slide-head">--}}
                                    {{--Did you know?--}}
                                {{--</div>--}}
                                {{--<div class="slide-text">--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere vitae massa quis euismod. Suspendisse potenti. Vestibulum ultricies tortor et orci dignissim tincidunt. In rhoncus posuere leo at efficitur. Duis molestie scelerisque lacinia. Fusce non mattis est, eu euismod arcu. Fusce id turpis orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse dignissim neque at nulla scelerisque rutrum. Praesent ac commodo quam. In ac vulputate nunc. --}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Left and right controls -->--}}
                        {{--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">--}}
                            {{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
                            {{--<span class="sr-only">Previous</span>--}}
                        {{--</a>--}}
                        {{--<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">--}}
                            {{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
                            {{--<span class="sr-only">Next</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- //Container Section End -->--}}
{{--@stop--}}

{{-- page level scripts --}}
{{--@section('footer_scripts')--}}
    {{--<!--page level js start-->--}}
    {{--<script type="text/javascript" src="{{ asset('assets/js/frontend/elevatezoom.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-rating-master/bootstrap-rating.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/js/frontend/cart.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/js/popup.js') }}"></script>--}}
    {{--<!--page level js start-->--}}

{{--@stop--}}
