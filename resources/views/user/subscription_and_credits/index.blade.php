@extends('user.layouts.default')

{{-- Page title --}}
@section('title')
Josh user Template
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/only_dashboard.css') }}" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Subscription & Credits</h1>
    <ol class="breadcrumb">
        <li class="active">
            <a href="#">
                <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i> Dashboard
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        
    </div>
    <!--/row-->
    <div class="row ">
        <div class="col-lg-10 col-sm-14 col-md-14 margin_10">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#overview_panel">Overview</a></li>
              <li><a data-toggle="tab" href="#balance_overview_panel">Balance Overview</a></li>
              <li><a data-toggle="tab" href="#credit_usage_panel">Credit Usage</a></li>
            </ul>
             
            <div class="tab-content nav-tab">
              <div id="overview_panel" class="tab-pane fade in active">
                <div class="row" >
                    <div class="display_inline_block;">
                        <h3 class="panel-title">You are currently subscribed to the <b>SmallPlan</b>($7 / Month). </h3>
                        <small>Your subsription  cycle automatically  gets renewed on December 16, 2015.</small>
                    </div>
                    <div class="display_inline_block;" style=" margin-left: 85%;">
                        <button class="btn btn-primary text-white"><i class='glyphicon glyphicon-random'></i> &nbsp; Change Plan</button>
                    </div>
                </div>
                <div class="row" style="padding-left: 30px; padding-right: 50px;">
                    <div class="row col-md-5 col-sm-7 display_inline_block subscription_credits_grey_block">
                        test
                    </div>
                    <div class='row col-md-5 col-sm-7 display_inline_block subscription_credits_grey_block'>
                        test
                    </div>
                </div>
            </div>
              <div id="balance_overview_panel" class="tab-pane fade">
                Will be done later
              </div>
              <div id="credit_usage_panel" class="tab-pane fade">
                Will be done later
              </div>
            
        </div>
    </div>
   
</section>
        
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <!--  todolist-->
    <script src="{{ asset('assets/js/todolist.js') }}" ></script>
    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('assets/vendors/charts/easypiechart.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/charts/jquery.easypiechart.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/charts/jquery.easingpie.js') }}" ></script>
    <!--for calendar-->
    <script src="{{ asset('assets/vendors/fullcalendar/moment.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/fullcalendar/fullcalendar.min.js') }}"  type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="{{ asset('assets/vendors/charts/jquery.flot.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/charts/jquery.flot.resize.min.js') }}"  type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{ asset('assets/vendors/charts/jquery.sparkline.js') }}" ></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{ asset('assets/vendors/countUp/countUp.js') }}" ></script>
    <!--   maps -->
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jscharts/Chart.js') }}" ></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"  type="text/javascript"></script>
    

@stop
