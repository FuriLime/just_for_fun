<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        {{Sentinel::getUser()->first_name}}
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{ asset('assets/css/panel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/metisMenu.css') }}" rel="stylesheet" type="text/css"/>

    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body class="skin-josh">
    <header class="header">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation"></nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
    <div class="cancel" data-toggle="tooltip" data-placement="left" title="Cancel without saving"><i class='glyphicon glyphicon-remove-circle'></i></div>
        @yield('content')
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    @if (Request::is('user/form_builder2') || Request::is('user/gridmanager') || Request::is('user/portlet_draggable') || Request::is('user/calendar'))
        <script src="{{ asset('assets/vendors/form_builder1/js/jquery.ui.min.js') }}"></script>
    @endif
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('assets/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/metisMenu.js') }}" type="text/javascript"> </script>
    <script src="{{ asset('assets/vendors/holder-master/holder.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->
</body>
</html>
