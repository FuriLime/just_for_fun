@extends('admin.layouts.default')

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
        <h1>My Notifications</h1>
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
                    <li class="active"><a data-toggle="tab" href="#email_subscribes_panel">E-Mail Subscriptions</a></li>
                    <li><a data-toggle="tab" href="#system_notifications_panel">System Notifications</a></li>
                </ul>

                <div class="tab-content nav-tab">
                    <div id="email_subscribes_panel" class="tab-pane fade in active ">
                        <form method="POST" action="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <table class="table">
                            <tbody>
                            @foreach($val_name as $key=>$group)
                            <tr>
                                @if($group['check']==true)
                                <td><input type="checkbox" checked name="check[{{$key}}]['check']"/></td>
                                <td><input  name="check[{{$key}}]['id']" type="hidden" value="{{$group['id']}}"/></td>
                                <td><input  name="check[{{$key}}]['name']" type="hidden" value="{{$group['name']}}"/></td>
                                <td>{{$group['name']}}</td>
                                    @else
                                    <td><input type="checkbox" name="check[{{$key}}]['check']"/></td>
                                    <td><input  name="check[{{$key}}]['id']" type="hidden" value="{{$group['id']}}" /></td>
                                    <td><input  name="check[{{$key}}]['name']" type="hidden" value="{{$group['name']}}" /></td>
                                    <td>{{$group['name']}}</td>
                                @endif
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-primary text-white"><i class='glyphicon glyphicon-edit'></i>Update Subscriptions</button>
                        </form>
                    </div>


                    <div id="system_notifications_panel" class="tab-pane fade">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="weight-td">Payment Method</td>
                                <td>test</td>
                            </tr>
                            <tr>
                                <td class="weight-td">Card</td>
                                <td>test</td>
                            </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary text-white"><i class='glyphicon glyphicon-edit'></i>Update Subscriptions</button>
                    </div>
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
