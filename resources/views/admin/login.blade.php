<!-- saved from url=(0034)http://event.test-y-sbm.com/signup -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Sign In</title>
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
        <!-- Notifications -->
        @include('notifications')
            <div class="sign-up-form col-md-6 col-md-offset-3">
                <h1>Please sign in to your account</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <label for="email" class="col-sm-4 control-label">E-Mail Address</label>
                                <div class="col-sm-6">
                                    <input type="email" name="email" required class="form-control" type="email" autocomplete="off" id="email-address" value="{!! Input::old('email') !!}">
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                        {!! $errors->first('my_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            {!! Honeypot::generate('my_name', 'my_time') !!}
                            <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                <label for="password" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="password" name="password" autocomplete="off" required type="password" placeholder="eg. X8df!90EO">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-6">
                                    <div class="checkbox">
                                        <input type="checkbox" name="remember-me" id="remember-me" value="remember-me" style="margin-left: 0">
                                        <label for="remember-me">Keep me logged in</label>
                                    </div>
                                </div>
                            </div>

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
                                        <i class="fa fa-check-circle"></i>Log In</button>
                                </div>
                            </div>
                            <p class="change_link">
                                <a href="{{ URL::to('forgot-password') }}">
                                    <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Forgot password</button>
                                </a>
                                <a href="{{ URL::to('signup') }}">
                                    <button type="button" class="btn btn-responsive botton-alignment btn-success btn-sm" style="float:right;">Sign up</button>
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