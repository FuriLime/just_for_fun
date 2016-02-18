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
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Sentinel::getUser()->pic)
                                <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" class="img-circle img-responsive pull-left" height="35px" width="35px"/>
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
                                @if(Sentinel::getUser()->pic)
                                    <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" class="img-circle img-bor"/>
                                @else
                                    <img src="{!! asset('assets/img/authors/avatar3.jpg') !!}" class="img-responsive img-circle" alt="User Image">
                                @endif
                                <p class="topprofiletext">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
                            </li>
                            <!-- Menu Body -->
                            <li>
                                <a href="#">
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
                                    <a href="{{ URL::to('user/lockscreen') }}">
                                        <i class="livicon" data-name="lock" data-s="18"></i>
                                        Lock
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ URL::to('user/logout') }}">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar "> 
                <div class="page-sidebar  sidebar-nav">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li {!! (Request::is('user') ? 'class="active"' : '') !!}>
                            <a href="{{ route('dashboard') }}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li {!! (Request::is('user/users') || Request::is('user/users/create') || Request::is('user/users/*') || Request::is('user/deleted_users') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">You</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                               <!--  <li {!! (Request::is('user/users') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('user/users') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Users
                                    </a>
                                </li> -->
                                <!-- <li {!! (Request::is('user/users/create') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('user/users/create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Add New User
                                    </a>
                                </li> -->

                                 <li>
                                    <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Favorite events
                                    </a>
                                </li>
                                <li {!! ((Request::is('user/users/*')) && !(Request::is('user/users/create')) ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Personal profile
                                    </a>
                                </li>
                                <li >
                                    <a href="{{ URL::to('user/deleted_users') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Notisfaction
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {!! (Request::is('user/groups') || Request::is('user/groups/create') || Request::is('user/groups/*') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Groups</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('user/groups') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('user/groups') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Groups
                                    </a>
                                </li>
                                <li {!! (Request::is('user/groups/create') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('user/groups/create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Add New Group
                                    </a>
                                </li>
                                <li {!! (Request::is('user/groups/any_user') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('user/groups/any_user') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Any User Access
                                    </a>
                                </li>
                                <!-- @if (Sentinel::getUser()->inRole('user')) -->
                                    <li {!! (Request::is('user/groups/user_only') ? 'class="active" id="active"' : '') !!}>
                                        <a href="{{ URL::to('user/groups/user_only') }}">
                                            <i class="fa fa-angle-double-right"></i>
                                            user Only Access
                                        </a>
                                    </li>
                                <!-- @endif -->
                            </ul>
                        </li>
                        <!-- Menus generated by CRUD generator -->
                        @include('user/layouts/menu')
                    </ul>
                    <!-- END SIDEBAR MENU -->

                </div>
            </section>
            <div class="permament-links">
                <li class="permanent-link" id="faq"><i class="livicon" data-name="question" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i><a href="">FAQ</a></li>
                <li class="permanent-link" id="support"><i class="livicon" data-name="mail" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i><a href="">Support</a></li>
                <li class="permanent-link" id="account"><i class="livicon" data-name="user" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i><a href="">Account</a></li>
            </div>
        </aside>
        <aside class="right-side">
            
            <!-- Notifications -->
            @include('notifications')
            
            <!-- Content -->
            @yield('content')

        </aside>
        <!-- right-side -->
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
