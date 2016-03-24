{{--<!DOCTYPE html>--}}
{{--<html>--}}

{{--<head>--}}
    {{--<title>Register</title>--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    {{--<!-- global level css -->--}}
    {{--<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />--}}
    {{--<!-- end of global level css -->--}}
    {{--<!-- page level css -->--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" />--}}
    {{--<!-- end of page level css -->--}}

{{--</head>--}}

{{--<body>--}}
{{--<div class="container">--}}
    {{--<div class="row vertical-offset-100">--}}
        {{--<!-- Notifications -->--}}
        {{--@include('notifications')--}}

        {{--<div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">--}}
            {{--<div id="container_demo">--}}
                {{--<a class="hiddenanchor" id="toregister"></a>--}}
                {{--<a class="hiddenanchor" id="tologin"></a>--}}
                {{--<a class="hiddenanchor" id="toforgot"></a>--}}
                {{--<div id="wrapper">--}}
{{--<div id="register" class="animate form">--}}
    {{--<form action="{{ route('signup') }}" autocomplete="off" method="post" role="form">--}}
        {{--<h3 class="black_bg">--}}
            {{--<img src="{{ asset('assets/img/logo.png') }}" alt="josh logo">--}}
            {{--<br>Sign Up</h3>--}}
        {{--<!-- CSRF Token -->--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
        {{--<div class="form-group {{ $errors->first('email', 'has-error') }}">--}}
            {{--<label style="margin-bottom:0px;" for="email" class="youmail">--}}
                {{--<i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>--}}
                {{--E-mail--}}
            {{--</label>--}}
            {{--<input id="email" name="email" autocomplete="off" required type="email" placeholder="mysupermail@mail.com" value="{!! Input::old('email') !!}" />--}}
            {{--<div class="col-sm-12">--}}
                {{--{!! $errors->first('email', '<span class="help-block">:message</span>') !!}--}}
            {{--</div>--}}

        {{--<div class="form-group {{ $errors->first('password', 'has-error') }}">--}}
            {{--<label style="margin-bottom:0px;" for="password" class="youpasswd">--}}
                {{--<i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>--}}
                {{--Password--}}
            {{--</label>--}}
            {{--<input id="password" name="password" autocomplete="off" required type="password" placeholder="eg. X8df!90EO" />--}}
            {{--<div class="col-sm-12">--}}
                {{--{!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--{!! Honeypot::generate('my_name', 'my_time') !!}--}}
        {{--<div class="col-sm-12">--}}
            {{--<a href="{{ URL::to('facebook') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>--}}
            {{--<a href="{{ URL::to('twitter') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0" alt="Facebook"/></a>--}}
            {{--<a href="{{ URL::to('linked') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/linkedin.png" border="0" alt="Linked"/></a>--}}
            {{--<a href="{{ URL::to('google') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google.png" border="0" alt="Google"/></a>--}}
        {{--</div>--}}
        {{--<p class="signin button">--}}
            {{--<input type="submit" class="btn btn-success" value="Sign up" />--}}
        {{--</p>--}}
        {{--<p class="change_link">--}}
            {{--<a href="{{ URL::to('signin') }}" class="to_register">--}}
                {{--<button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>--}}
            {{--</a>--}}
        {{--</p>--}}
    {{--</form>--}}
{{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- global js -->--}}
{{--<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>--}}
{{--<!-- Bootstrap -->--}}
{{--<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>--}}
{{--<!--livicons-->--}}
{{--<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>--}}
{{--<!-- end of global js -->--}}
{{--</body>--}}
{{--</html>--}}

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
    <!-- end of page level css -->

</head>

<body>
<div class="cancel-saving" data-toggle="tooltip" data-placement="left" title="Cancel without saving">
    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
</div>
<div class="container">
    <div class="row vertical-offset-100">
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
                    <button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Change Plan</button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Basics</div>
                <div class="panel-body">
                    <form action="{{ route('signup') }}" autocomplete="off" class="form-horizontal" method="post" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label for="email" class="col-sm-4 control-label">E-Mail Address</label>
                            <div class="col-sm-6">
                                <input type="email" name="email" required class="form-control"  autocomplete="off" id="email-address">
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                <label for="password" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="password" name="password" autocomplete="off" required type="password">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
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
                        {!! Honeypot::generate('my_name', 'my_time') !!}
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <a href="{{ URL::to('facebook') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
                                <a href="{{ URL::to('twitter') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0" alt="Facebook"/></a>
                                <a href="{{ URL::to('linked') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/linkedin.png" border="0" alt="Linked"/></a>
                                <a href="{{ URL::to('google') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google.png" border="0" alt="Google"/></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-success btn-primary">
                                    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Register</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Begin 7 Day Trial</button>
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