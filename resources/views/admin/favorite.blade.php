@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Favorite
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
    {{--<section class="content-header">--}}
        <!--section starts-->

        {{--<h1><i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>My Personal Profile</h1>--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li>--}}
                {{--<a href="{{ route('dashboard') }}">--}}
                    {{--<i class="livicon" data-name="home" data-size="14" data-loop="true"></i>--}}
                    {{--Dashboard--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#">Users</a>--}}
            {{--</li>--}}
            {{--<li class="active">User Profile</li>--}}
        {{--</ol>--}}
    {{--</section>--}}
    <!--section ends-->
    <section class="content">
        <div class="panel-heading clearfix">
            <h1 class="pull-left">
            		<i class="fa fa-bookmark"></i>
                My Favorite Events
            </h1>

            <div class="col-xs-12 admin_section_desc">
            	This is an overview of all <b>Events</b> you have marked as <b>Favorite Events</b>.
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Events</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">Event Channels</a>
                        </li>
                    </ul>
                    <div class="tab-content mar-top">
                        <div id="tab1" class="tab-pane fade active in xTab">
                        		<div class="icons">
                        			<div class="icon_wrap">
                        				<i class="fa fa-gear"></i>
                        				<div class="gear">
                        					Show <span class="gear_wrap"></span> events
                        				</div>
                        			</div>
                        			<div class="icon_wrap">
                        				<i class="fa fa-search"></i>
                        			</div>
                        		</div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel">
                                        <div class="panel-body xTableWrap">
                                            <div class="col-md-12">
                                                <div class="panel-body">
                                                    <table class="table xTable" id="table">
																	                    <thead>
																	                        <tr class="filters">
																                            <th style="width: 116px;">Event name</th>
																                            <th style="width: 388px;">Location</th>
																                            <th style="width: 138px;">Date</th>
																                            <th style="width: 290px;"></th>
																	                        </tr>
																	                    </thead>
																	                    <tbody>
																	                    	<tr>
																	                        <td>Loc test</td>
																	                    		<td>Qwerty Интернет-магазин, Армейская улица, Одесса, Украина</td>
																	            						<td>2016-04-02 19:00</td>
																	            						<td>
																	            							<button class="btn btn-default">
																	            								<i class="fa fa-times-circle-o"></i> Unfollow Event
																	            							</button>
																	            							<button class="btn btn-default">
																	            								<i class="fa fa-eye"></i> View Event
																	            							</button>
																	            						</td>
																	            					</tr>
																	            					<tr>
																	                        <td>Social test</td>
																	                    		<td>Sadfat Al Bahar Elect Ware Trading - Sharjah - United Arab Emirates</td>
																	            						<td>2016-03-31 19:00</td>
																	            						<td>
																	            							<button class="btn btn-default">
																	            								<i class="fa fa-times-circle-o"></i> Unfollow Event
																	            							</button>
																	            							<button class="btn btn-default">
																	            								<i class="fa fa-eye"></i> View Event
																	            							</button>
																	            						</td>
																	            					</tr>
																	                    </tbody>
																	                </table>

																	                <div>
																	                	<a href="#" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Create Your own Event</a>
																	                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                           <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel">
                                        <div class="panel-body xTableWrap">
                                            <div class="col-md-12">
                                                <div class="panel-body">
                                                    <table class="table xTable" id="table_ch">
																	                    <thead>
																	                        <tr class="filters">
																                            <th style="width: 166px;">Event Publisher</th>
																                            <th style="width: 288px;">Event Channel</th>
																                            <th style="width: 138px;"># Events</th>
																                            <th style="width: 290px;"></th>
																	                        </tr>
																	                    </thead>
																	                    <tbody>
																	                    	<tr>
																	                        <td>Random channel</td>
																	                    		<td>Party</td>
																	            						<td>36</td>
																	            						<td>
																	            							<button class="btn btn-default">
																	            								<i class="fa fa-times-circle-o"></i> Unfollow Event
																	            							</button>
																	            							<button class="btn btn-default">
																	            								<i class="fa fa-eye"></i> View Event
																	            							</button>
																	            						</td>
																	            					</tr>
																	            					<tr>
																	                        <td>Live channel</td>
																	                    		<td>Webcam</td>
																	            						<td>12</td>
																	            						<td>
																	            							<button class="btn btn-default">
																	            								<i class="fa fa-times-circle-o"></i> Unfollow Event
																	            							</button>
																	            							<button class="btn btn-default">
																	            								<i class="fa fa-eye"></i> View Event
																	            							</button>
																	            						</td>
																	            					</tr>
																	                    </tbody>
																	                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>

<script>
$(document).ready(function() {
	$('#table').DataTable({
		"columns": [
	    null,
	   	null,
	    null,
	    { 
	    	"orderable": false
	    },
	  ]
	});

	$('#table_ch').DataTable({
		"columns": [
	    null,
	   	null,
	    null,
	    { 
	    	"orderable": false
	    },
	  ]
	});

	$('.xTab .fa-gear').click(function() {
		var gear = $(this).parents('.xTab').find('.gear');
		var gear_inp =  $(this).parents('.xTab').find('#table_length select');

		gear_inp.appendTo(gear.find('.gear_wrap'));

		if (gear.is(':visible')) {
			$(this).parents('.xTab').find('.gear').css('display', 'none');
		} else {
			$(this).parents('.xTab').find('.gear').css('display', 'inline-block');
		}
	});
});
</script>
@stop