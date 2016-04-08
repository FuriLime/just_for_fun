<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/custom.css') }}">
    <!--end of global css-->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body>
<div id="fb-root"></div>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id={{env('GTM_ID')}}"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl+'&gtm_auth={{env('GTM_AUTH')}}&gtm_preview=env-33&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KGDVW9');</script>
<!-- End Google Tag Manager -->
<!-- Header Start -->
<header>
    <!-- Icon Section Start -->
    <div class="icon-section">
        <!-- Nav bar Start -->
        <nav class="navbar navbar-default container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
						<span><a href="#"> <i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc"></i>
                            </a></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" class="logo_position">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li {!! (Request::is('price') ? 'class="active"' : '') !!}><a href="{{ URL::to('price') }}">@lang('frontend.prices')</a></li>
                    <li {!! (Request::is('advancedfeatures') ? 'class="active"' : '') !!}><a href="{{ URL::to('advancedfeatures') }}">@lang('frontend.features')</a></li>

                    @if(!Sentinel::check())
                        <li><a href="{{ URL::to('signin') }}" data-toggle="modal">@lang('frontend.sign_in')</a></li>
                        {{--<li><a href="#auth" data-toggle="modal" onclick="javascript: window.location.href = window.location.pathname+'#toregister'">@lang('frontend.sign_up')</a></li>--}}
                        <li><a href="{{ URL::to('signup') }}"  data-toggle="modal" >@lang('frontend.sign_up')</a></li>
                    @endif

                    <li><a href="{{ URL::to('events') }}" data-toggle="modal">Events</a></li>

                    @if(Sentinel::check())
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if(Sentinel::getUser()->image)
                                    <img src="{!! Sentinel::getUser()->image !!}" alt="img" class="img-circle img-responsive pull-left" height="35px" width="35px"/>
                                @else
                                    <img src="{!! asset('assets/img/authors/avatar3.jpg') !!} " width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                                @endif
                                <div class="riot">
                                    <div>
                                        {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                                        <span>
                                        <i class="caret"></i>
                                    </span>
                                    </div>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    @if(Sentinel::getUser()->image)
                                        <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->image !!}" alt="img" class="img-circle img-bor"/>
                                    @else
                                        <img src="{!! asset('assets/img/authors/avatar3.jpg') !!}" class="img-responsive img-circle" alt="User Image">
                                    @endif
                                    <p class="topprofiletext">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
                                </li>
                                <!-- Menu Body -->
                                <li>
                                    <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                                        <i class="livicon" data-name="user" data-s="18"></i>
                                        My Profile
                                    </a>
                                </li>
                                <li role="presentation"></li>
                                <li>
                                    <a href="{{ URL::route('users.update',Sentinel::getUser()->id) }}">
                                        <i class="livicon" data-name="gears" data-s="18"></i>
                                        Account Settings
                                    </a>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ URL::to('admin/lockscreen') }}">
                                            <i class="livicon" data-name="lock" data-s="18"></i>
                                            Lock
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ URL::to('admin/logout') }}">
                                            <i class="livicon" data-name="sign-out" data-s="18"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>

        </nav>
        <!-- Nav bar End -->
    </div>

    <!-- //Icon Section End -->
    @include('notifications')
</header>
<!-- //Header End -->

<div class="row vertical-offset-100 modal fade" id="auth">
    <!-- Notifications -->
    @include('notifications')
    <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div id="container_demo">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <a class="hiddenanchor" id="toforgot"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form">
                        <h3 class="black_bg">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="josh logo">
                            <br>Log in</h3>
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
{{--                        {!! Honeypot::generate('my_email', 'my_password') !!}--}}
                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label style="margin-bottom:0px;" for="email" class="uname control-label"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                E-mail
                            </label>
                            <input id="email" name="email" required type="email" placeholder="E-mail" value="{!! Input::old('email') !!}" />
                            <div class="col-sm-12">
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('password', 'has-error') }}">
                            <label style="margin-bottom:0px;" for="password" class="youpasswd"> <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                Password
                            </label>
                            <input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" />
                            <div class="col-sm-12">
                                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <p class="keeplogin">
                            <input type="checkbox" name="remember-me" id="remember-me" value="remember-me" />
                            <label for="remember-me">Keep me logged in</label>
                        </p>

                        <p class="login button">
                            <input type="submit" value="Login" class="btn btn-success" />
                        </p>
                        <p class="change_link">
                            <a href="#toforgot">
                                <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Forgot password</button>
                            </a>
                            <a href="#toregister">
                                <button type="button" class="btn btn-responsive botton-alignment btn-success btn-sm" style="float:right;">Sign up</button>
                            </a>
                        </p>
                    </form>
                </div>
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
                        {!! Honeypot::generate('my_email', 'my_password') !!}
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
                            <a href="{{ URL::to('oauthwindows') }}"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/windows.png" border="0" alt="Google"/></a>
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="vehicle" value="Terms of Service">I Accept Terms of Service</input>
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
                <div id="forgot" class="animate form">
                    <form action="{{ route('forgot-password') }}" autocomplete="on" method="post" role="form">
                        <h3 class="black_bg">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="josh logo">Password</h3>
                        <p>
                            Enter your email address below and we'll send a special reset password link to your inbox.
                        </p>

                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label style="margin-bottom:0px;" for="emailsignup1" class="youmai">
                                <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                Your email
                            </label>
                            <input id="email" name="email" required type="email" placeholder="your@mail.com" value="{!! Input::old('email') !!}" />
                            <div class="col-sm-12">
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                          <p class="login button">
                            <input type="submit" value="Submit" class="btn btn-success" />
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

<!-- slider / breadcrumbs section -->
@yield('top')

<!-- Content -->
@yield('content')

<!-- Footer Section Start -->
<!-- //Footer Section End -->
<div class="footer">
    <div class="container">
        <div class="copyright">&copy; 2011 - <?php echo date('Y'); ?> Copyright by EventFellows | BrainFactor GmbH. All Rights Reserved.</div>
    </div>
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
    <i class="fa fa-chevron-up"></i>
</a>
<!--global js starts-->
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!--livicons-->
<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
<script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/josh_frontend.js') }}"></script>

<script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/jstz.min.js') }}"></script>

<script>
    $( document ).ready(function() {
        var tz = jstz.determine();
        $.cookie('time_zone', tz.name(), { path: '/' });
        console.log($.cookie('time_zone', tz.name(), { path: '/' }));
    });
</script>
<!--global js end-->
<!-- begin page level js -->
@yield('footer_scripts')
<!-- end page level js -->
</body>

</html>