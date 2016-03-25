@extends('layouts/default')

{{-- Page title --}}
{{--@section('title')--}}
{{--{{ $event['title'] }}--}}
{{--@parent--}}
{{--@stop--}}

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<style>
		.daterangepicker .range_inputs, .daterangepicker .calendar { display: none !important; }
		.daterangepicker .ranges li:last-child { display: none; }
		#events_details { display: none; }
		#hidden_address { position: absolute; left: -9000px; }
    .share42init {
      margin-top: 10px; 
      margin-bottom: 5px
    }
	</style>
@stop
@section('top')
    <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="{{ URL::to('events') }}">Events</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="livicon icon3" data-name="doc-landscape" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> {{ $event['title'] }}
            </div>
        </div>
    </div>
@stop

<div class="share-event-top">
  <div class="container share-container">
    <div class="row content">
      <div class="col-sm-7 col-md-7 ">
        <div class="input-group">
          <button id="social_but" class="btn btn-primary text-white" >
            <span>&nbsp;Social&nbsp;</span>
            <span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i></span>
          </button>
          <button id="embed_but" class="btn btn-primary text-white" >
            <span>&nbsp;Embed&nbsp;</span>
            <span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i></span>
          </button>
          <button id="email_but" class="btn btn-primary text-white" >
            <span>&nbsp;Email&nbsp;</span>
            <span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i></span>
          </button>
        </div>
        <div class="text-left share-text">
          Please update <b>Your Profile</b> so we can add the relevant information to your events. You can set the visibility of your details in your <a href="#">Profile Settings</a>.
        </div>
        <div class="col-xs-12 text-left share42init"></div>
        <input type="text" id="shortlink">
      </div>
      <img src="http://event.test-y-sbm.com/assets/images/exit-show-details.png" class="exit-show-details">
    </div>
    
  </div>

  <div class="show-details" id="show_detail">
    Share this event
  </div>
</div>
{{-- breadcrumb --}}


@section('content')
<!-- Container Section Start -->
<div class="text-center event-show">
Try Event Fellows for your own events. Event Fellows Accounts are FREE. <a href="#">Start here!</a>
</div>
<div class="container">
	<div class="row content event-show">
	@if($event->test=="1")
		<div class="col-xs-12">
			<div class="test-event-cont">
				<div class="test-event-red-line">
					Тest Event
				</div>
			</div>
		</div>
	@endif
	
		<div class="col-sm-8 col-md-8">
			<div class="event-name event-show">{{$event->title}}</div>
			<div class="event_period event-show">{{$event->period}}</div>
			
			<div class="input-group">
				<button id="register_but" class="btn btn-primary text-white" >
					<i class="fa fa-pencil-square-o"></i>
					<span>&nbsp;Register&nbsp;</span>
					<span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i></span>
				</button>

				<button id="add-to-calendar-btn" class="btn btn-primary text-white">
					<i class="fa fa-calendar"></i>
					<span>&nbsp;Add to Calendar&nbsp;</span>
					<span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i></span>
					<i class="fa fa-caret-down"></i>
				</button>

				<button id="follow_but" class="btn btn-primary text-white">
					<i class="fa fa-bookmark-o"></i>
					<span>&nbsp;Follow&nbsp;</span>
					<span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i></span>
				</button>


			</div>
			<!-- <div class="fb-share-button" data-href="http://test-ef.com/events/{{$event->uuid}}" data-layout="button_count"></div>
      <g:plus action="share"></g:plus>
      <a href="http://test-ef.com/events/{{$event->uuid}}"  text = '{{$event->title}}'class="twitter-share-button"{count} data-via="LimeFuri">Tweet</a> -->
      <script>/*!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');*/</script>
		<div class="input-group">
				<button id="see-details-btn" class="btn btn-default">
					<span class="toggle"><i class="fa fa-search"></i>&nbsp;See event details</span>
					<span class="toggle" style="display: none;"><i class="fa fa-search"></i>&nbsp;Hide event details</span>
				</button>
			</div>
			
			<div id="events_details">
				<div class="details_item_header">
					@lang('frontend.description2')
				</div>
				<div class="details_item">
					{{ $event['description'] }}
				</div>
				
				<div class="details_item_header">
					@lang('frontend.address')
				</div>
				<div class="details_item" id="address_wr">

				</div>
				
			</div>
			<div id="hidden_address">
				<div id="address">{{ $event['location'] }}</div>
				<div id="street">{{ $event['street'] }}</div>
				<div id="city">{{ $event['city'] }}</div>
				<div id="state">{{ $event['state'] }}</div>
				<div id="country">{{ $event['country'] }}</div>
				<div style="height: 400px;" id="map_canvas"></div>
			</div>

            <div class="date">
                {{date("F dS, Y",strtotime($event->start))}}
                Time: {{date("H:m", strtotime($event->period))}}
                Timezone:{{$event->timezone}}
            </div>

            <div class="date">
                {{date("F dS, Y",strtotime($event->start))}}
                Time: {{date("H:m", strtotime($event->period))}}
                Timezone:{{$event->timezone}}
            </div>
			
			<div class="input-group" id="learn_more" style="display:none">
				<button id="learn-more-btn" class="btn btn-default">
					<i class="fa fa-key"></i>
					&nbsp;Learn more about promoting events with EventFellows
				</button>
			</div>
			
		</div>
		<div class="text-center col-xs-12 share-event">Share this event</div>
		<div class="col-xs-12 text-center share42init"></div>

	</div>
</div>

<input type="hidden" name="_token" id="token_for_ajax" value="{{ csrf_token() }}" />

@stop

{{-- page level scripts --}}
@section('footer_scripts')
	<script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('assets/js/share42/share42.js') }}"></script>
  

   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1685286605050549";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
	
<script>
    @if(!Sentinel::check())
//        $('#show_detail').attr('style', 'display:none');
        $('#show_detail').click(function(e){
            e.preventDefault();
            return false;
        })

        {{--@endif--}}
    @endif
    </script>

	<script>
	$(document).ready(function(){
        var geocoder;
        var map;
        var address = $('#address').html();
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var myOptions = {
                zoom: 12,
                center: latlng,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                },
                navigationControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            if (geocoder) {
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                            map.setCenter(results[0].geometry.location);
 
                            var infowindow = new google.maps.InfoWindow({
                                content: '<b>' + address + '</b>',
                                size: new google.maps.Size(750, 400)
                            });
 
                            var marker = new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map,
                                title: address
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.open(map, marker);
                            });
							// MAP has a big problem: it won`t work when it`s hidden. Need some fix
							// when map is ready
							$('#hidden_address').appendTo( $('#address_wr') ).css('position', 'static');
 
                        } else {
                            console.log("No results found");
                        }
                    } else {
                        console.log("Geocode was not successful for the following reason: " + status);
                    }
                });
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);
		//initialize();
    });
	</script>

	<script type="text/javascript">
	$('#add-to-calendar-btn').daterangepicker({
			ranges: {
				'Google': [moment(), moment()],
				'Yahoo': [moment().subtract('days', 1), moment().subtract('days', 1)],
				'Microsoft': [moment().subtract('days', 2), moment().subtract('days', 2)],
				'iCal': [moment().subtract('days', 2), moment().subtract('days', 2)],
				'Outloock': [moment().subtract('days', 2), moment().subtract('days', 2)],
			},
			startDate: moment().subtract('days', 29),
			endDate: moment()
		},
		function(start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}
	);
	
	$('#see-details-btn').click(function(){
		$('#events_details').slideToggle();
		$('#see-details-btn .toggle').toggle();
	});
	
	$('.daterangepicker li').click(function() {
		$('#add-to-calendar-btn .toggle').show();
		$.ajax({
			url:  '{{ route('event.addtocalendar') }}',
			type: 'post',
			data: {
				uuid: '{{ $event['uuid'] }}',
				calendar: $(this).html(),
				_token: $('#token_for_ajax').val(),
			},
			success: function(data) {
				data = $.parseJSON(data);
				if (data.result == 'success') {
					window.open(data.calendar_link, '_blank');
				} else if (data.result == 'success_load') {
					window.location.href = data.calendar_link;
				} else if (data.result == 'register') {
					// tmp
					alert('This event cant be added by unregistered users anymore. Please, Sign up.');
				} else if (data.result == 'error') {
					// tmp
					alert(data.error_massage);
				}
				
				$('#add-to-calendar-btn .toggle').hide();
			}
    });
		
	});
	</script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.show-details').click(function(){
        if ($('.share-event-top').hasClass('opened')){
          $('.show-details')[0].innerText = 'Share your event!';
          $('.share-event-top').removeClass('opened');
        } else{
          $('.share-event-top').addClass('opened');
          $('.show-details')[0].innerText = 'Hide Details';
        }
      });
      $('.exit-show-details').click(function(){
        if ($('.share-event-top').hasClass('opened')){
          $('.show-details')[0].innerText = 'Share your event!';
          $('.share-event-top').removeClass('opened');
        } else{
          $('.share-event-top').addClass('opened');
          $('.show-details')[0].innerText = 'Hide Details';
        }
      });
    })
  </script>
@stop