<!DOCTYPE html>
<!-- saved from url=(0034)http://event.test-y-sbm.com/signup -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Forgot Password</title>
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
            <div class="panel panel-default">
                <div class="panel-heading">Forgot password</div>
                <div class="panel-body">
                    <form action="{{ route('forgot-password') }}" autocomplete="on" method="post" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label for="email" class="col-sm-4 control-label">E-Mail Address</label>
                            <div class="col-sm-6">
                                <input type="email" name="email" required class="form-control" type="email" autocomplete="off" id="email-address" value="{!! Input::old('email') !!}">
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <p class="login button">
                            <input type="submit" value="Submit" class="btn btn-success" />
                        </p>
                        <p class="change_link">
                            <a href="{{ URL::to('signin') }}" class="to_register">
                                <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                            </a>
                        </p>
                    </form>
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
<!-- end of global js -->
</body>
</html>