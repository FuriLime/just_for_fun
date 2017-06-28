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
    <h1>Billing & Invoices</h1>
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
              <li class="active"><a data-toggle="tab" href="#billing_overview_panel">Billing Overview</a></li>
              <li><a data-toggle="tab" href="#payment_method_panel">PaymentMethod</a></li>
              <li><a data-toggle="tab" href="#invoices_panel">Invoices</a></li>
            </ul>
             
            <div class="tab-content nav-tab">
              <div id="billing_overview_panel" class="tab-pane fade in active ">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="weight-td">Type of Account</td>
                      <td>test</td>
                    </tr>
                    <tr>
                      <td class="weight-td">CompanyName</td>
                      <td>test</td>
                    </tr>
                    <tr>
                      <td class="weight-td">VAT ID</td>
                      <td>test</td>
                    </tr>
                    <tr>
                      <td class="weight-td">Industry</td>
                      <td>test</td>
                    </tr>
                    <tr>
                      <td class="weight-td">Billing Address</td>
                      <td>test</td>
                    </tr>
                    <tr>
                      <td class="weight-td">Payment Method</td>
                      <td>test</td>
                    </tr>
                  </tbody>
                </table>
                <button class="btn btn-primary text-white"><i class='glyphicon glyphicon-edit'></i>Edit Billing Details</button>
                <button class="btn btn-default text-white">Edit Payment Method</button>
              </div>
              <div id="payment_method_panel" class="tab-pane fade">
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
                <button class="btn btn-primary text-white"><i class='glyphicon glyphicon-edit'></i> &nbsp;Edit Payment Method</button>
              </div>
              <div id="invoices_panel" class="tab-pane fade">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 50px;">Date</th>
                      <th style="width: 50px;">Amount</th>
                      <th style="width: 50px;">Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>
                        <button type="button" class="btn btn-default"><i class='glyphicon glyphicon-download'></i> &nbsp;Download</button>
                        </td>
                    </tr>
                  </tbody>
                </table>
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
