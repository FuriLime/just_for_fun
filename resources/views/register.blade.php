<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" />
    <!-- end of page level css -->

</head>

<body>
<div class="container">
    <div class="row vertical-offset-100">
        <!-- Notifications -->
        @include('notifications')

        <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
            <div id="container_demo">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <a class="hiddenanchor" id="toforgot"></a>
                <div id="wrapper">
<div id="register" class="animate form">
    <form action="{{ route('signup') }}" autocomplete="on" method="post" role="form">
        <h3 class="black_bg">
            <img src="{{ asset('assets/img/logo.png') }}" alt="josh logo">
            <br>Sign Up</h3>
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group {{ $errors->first('email', 'has-error') }}">
            <label style="margin-bottom:0px;" for="email" class="youmail">
                <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                E-mail
            </label>
            <input id="email" name="email" required type="email" placeholder="mysupermail@mail.com" value="{!! Input::old('email') !!}" />
            <div class="col-sm-12">
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        {!! Honeypot::generate('my_name', 'my_time') !!}
        <div class="form-group {{ $errors->first('password', 'has-error') }}">
            <label style="margin-bottom:0px;" for="password" class="youpasswd">
                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                Password
            </label>
            <input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" />
            <div class="col-sm-12">
                {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-sm-12">
            <a href="{{ URL::to('facebook') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
            <a href="{{ URL::to('twitter') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0" alt="Facebook"/></a>
            <a href="{{ URL::to('linked') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/linkedin.png" border="0" alt="Linked"/></a>
            <a href="{{ URL::to('google') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google.png" border="0" alt="Google"/></a>
        </div>
        <p class="signin button">
            <input type="submit" class="btn btn-success" value="Sign up" />
        </p>
        <p class="change_link">
            <a href="#tologin" class="to_register">
                <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>
            </a>
        </p>
    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!--livicons-->
<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
<script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
<!-- end of global js -->
</body>
</html>