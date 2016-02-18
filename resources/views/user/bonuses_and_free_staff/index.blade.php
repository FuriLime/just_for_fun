@extends('user/layouts/default')

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
    <h1>Bonuses & Free Stuff </h1>
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
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#overview_panel">Overview</a></li>
              <li><a data-toggle="tab" href="#refer_a_friend_panel">Refer a Friend</a></li>
              <li><a data-toggle="tab" href="#help_us_panel">Help us</a></li>
            </ul>
             
            <div class="tab-content" style="background: white;">
              <div id="overview_panel" class="tab-pane fade in active">
                Will be done later
              </div>
              <div id="refer_a_friend_panel" class="tab-pane fade">
                Will be done later
              </div>
              <div id="help_us_panel" class="tab-pane fade">
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
