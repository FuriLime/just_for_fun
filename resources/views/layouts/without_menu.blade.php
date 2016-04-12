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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/custom.css') }}" />
    <!--end of global css-->
    <!--page level css-->
    @yield('header_styles')
            <!--end of page level css-->
</head>

<body>
<div class="login-top-bar clearfix">
    <a href="/" class="login-logo-holder pull-left"><img src="/assets/images/logo.png"></a>
    <a href="/" class="login-sign-up-btn pull-right">Sign Up</a>
</div>
@yield('content')

        <!--global js starts-->
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!--livicons-->
<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
<script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/josh_frontend.js') }}"></script>

<script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/jstz.min.js') }}"></script>
@yield('footer_scripts')
</body>
</html>