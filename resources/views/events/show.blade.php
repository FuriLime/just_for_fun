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
	<link href="{{ asset('assets/css/pages/custom.css') }}" rel="stylesheet" type="text/css" />
	<style>
		.daterangepicker .range_inputs, .daterangepicker .calendar { display: none !important; }
		.daterangepicker .ranges li:last-child { display: none; }
		#events_details { display: none; }
		#hidden_address { position: static; left: -9000px; }
	</style>
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
        <div class="col-xs-12 text-left">
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_google_plus"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_pocket"></a>
                <a class="a2a_button_xing"></a>
                <a class="a2a_button_email"></a>
                <a class="a2a_button_google_gmail"></a>
                <a class="a2a_button_outlook_com"></a>
                <a class="a2a_button_yahoo_mail"></a>
                <a class="a2a_button_wordpress"></a>
                <a class="a2a_button_digg"></a>
                <a class="a2a_button_evernote"></a>
                <a class="a2a_button_tumblr"></a>
                <a class="a2a_button_blogger_post"></a>
                <a href="http://www.skyrock.com/m/blog/share.php?js=0" class="skysocial-s skyrocksocialshare_square38" title="Share on Skyrock"
                   style="display:inline-block;text-indent:-999em;overflow:hidden;width:32px;height:32px;
                   background:url(http://share.static.skyrock.net/img/api/skyrocksocialshare_square38.png) no-repeat 0 0 transparent;"><p style="display:none;">Share on Skyrock</p></a>
                <script>(function(){var d=document,id='skyrock-fxlebpx'; if(d.getElementById(id)) return;var e=d.createElement('script');e.id=id;e.async=true;e.src='http://share.static.skyrock.net/js/skyrock_social.min.js';d.getElementsByTagName('body')[0].appendChild(e);}());</script>
            </div>
            <input type="text" id="shortlink">

        </div>

      </div>
      <img src="http://event.test-y-sbm.com/assets/images/exit-show-details.png" class="exit-show-details">
    </div>
    
  </div>
@if(Sentinel::check() && $event->author_id == Sentinel::getUser()->id)
        <div class="show-details" id="show_detail">
            Share this event
        </div>
    @else
        <div class="show-details" id="show_detail">
            Share this event
        </div>
@endif
</div>
{{-- breadcrumb --}}


@section('content')
<!-- Container Section Start -->
<div class="text-center event-show">
Try Event Fellows for your own events. Event Fellows Accounts are FREE. <a href="#">Start here!</a>
</div>
<div class="container">
    <div class="row new-event-holder">
        <div class="col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2 content event-show">
            @if($event->test=="1")
            <div class="test-event-cont">
                <div class="test-event-red-line">
                    Test Event
                </div>
            </div>
            @endif
            <div class="even-date-holder pull-right">{{date("d",strtotime($event->start))}}</div>
            <div class="event-name event-show">{{$event->title}}</div>
            <div class="event_period event-show">{{date("F dS, Y", strtotime($event->start))}} - {{$event['start_time_event']}}</div>
            <div class="event_period event-show">{{$event->location}}</div>
            <div class="event_period event-show">
                <a>{{url()."/events/".$event->readable_url}}</a>
            </div>
            <div class="input-group">
                <button id="register_but" class="btn btn-primary text-white">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>&nbsp;Register&nbsp;</span>
                    <span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three"
                                                                   data-size="20" data-c="#fff" data-hc="#fff"
                                                                   data-loop="true"></i></span>
                </button>

                <button id="add-to-calendar-btn" class="btn btn-primary text-white">
                    <i class="fa fa-calendar"></i>
                    <span>&nbsp;Add to Calendar&nbsp;</span>
                    <span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three"
                                                                   data-size="20" data-c="#fff" data-hc="#fff"
                                                                   data-loop="true"></i></span>
                    <i class="fa fa-caret-down"></i>
                </button>

                <button id="follow_but" class="btn btn-primary text-white">
                    <i class="fa fa-bookmark-o"></i>
                    <span>&nbsp;Follow&nbsp;</span>
                    <span class="toggle" style="display: none;"><i class="livicon" data-name="spinner-three"
                                                                   data-size="20" data-c="#fff" data-hc="#fff"
                                                                   data-loop="true"></i></span>
                </button>


            </div>
            <div class="input-group">
                <div id="see-details-btn">
                    <span class="toggle" id="show-event"><i class="fa fa-search"></i>&nbsp;Show Details</span>
                    <span class="toggle" id="hide-event" style="display: none;"><i
                                class="fa fa-search"></i>&nbsp;Hide Details</span>
                </div>
            </div>
            <div id="events_details">
                <div class="row marg-bot-50">
                    <div class="details_item_header col-md-12">
                        @lang('frontend.description2')
                    </div>
                    <div class="details_item col-md-7">
                        {{ $event['description'] }}
                    </div>
                    <div class="event-details-image col-md-5">
                        <img src="{{ asset('assets/img/no-image.jpg')}}">
                    </div>
                </div>
                <div class="row marg-bot-50">
                    <div class="col-md-6">
                        <div style="height: 335px;" id="map_canvas"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="details_item_header">
                            Event Location
                        </div>
                        <div class="details_item" id="address_wr">

                        </div>
                    </div>
                    <div id="hidden_address">
                        <div id="address">{{ $event['location'] }}
                        </div>
                        <div id="street">{{ $event['street'] }}</div>
                        <div id="city">{{ $event['city'] }}</div>
                        <div id="state">{{ $event['state'] }}</div>
                        <div id="country">{{ $event['country'] }}</div>
                    </div>
                </div>
                <div class="row marg-bot-30">
                    <div class="col-md-7">
                        <div class="event-date">
                            {{date("F dS, Y",strtotime($event->start))}}
                        </div>
                        <div class="event-time">
                            {{$event['start_time_user']}} - {{$event['finish_time_user']}}
                        </div>
                        <div class="event-timezone">
                            Timezone: {{$event['user_time_zone']}}
                        </div>
                        <div class="event-time">
                            {{$event['start_time_event']}} - {{$event['finish_time_event']}}
                        </div>
                        <div class="event-timezone">
                            Timezone: {{$event->timezone}}
                            {{--<select>{{$event['timezone_select']}}--}}
                            {{--</select>--}}
                        </div>
                    </div>
                    <div class="event-details-image col-md-5">
                        <img src="{{ asset('assets/img/calendar.jpg')}}">
                    </div>
                </div>
                <div class="input-group" id="learn_more" style="display:none">
                    <button id="learn-more-btn" class="btn btn-default">
                        <i class="fa fa-key"></i>
                        &nbsp;Learn more about promoting events with EventFellows
                    </button>
                </div>
            </div>
            </div>



            <div class="text-center col-xs-12 share-event">Share this event</div>
            <div class="col-xs-12 social-holder text-center">
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_google_plus"></a>
                    <a class="a2a_button_linkedin"></a>
                    <a class="a2a_button_pocket"></a>
                    <a class="a2a_button_xing"></a>
                    <a class="a2a_button_email"></a>
                    <a class="a2a_button_google_gmail"></a>
                    <a class="a2a_button_outlook_com"></a>
                    <a class="a2a_button_yahoo_mail"></a>
                    <a class="a2a_button_wordpress"></a>
                    <a class="a2a_button_digg"></a>
                    <a class="a2a_button_evernote"></a>
                </div>
            </div>

        {{--<div class="social-buttons">--}}
            {{--<a href="https://www.facebook.com/sharer/sharer.php?u={{url()}}./events/{{$event->readable_url}}"--}}
               {{--target="_blank">--}}
                {{--<i class="fa fa-facebook-official"></i>--}}
            {{--</a>--}}
            {{--<a href="https://twitter.com/intent/tweet?url={{url()}}./events/{{$event->readable_url}}"--}}
               {{--target="_blank">--}}
                {{--<i class="fa fa-twitter-square"></i>--}}
            {{--</a>--}}
            {{--<a href="https://plus.google.com/share?url={{url()}}./events/{{$event->readable_url}}"--}}
               {{--target="_blank">--}}
                {{--<i class="fa fa-google-plus-square"></i>--}}
            {{--</a>--}}
        {{--</div>--}}
        </div>
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

    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--var myCenter = new google.maps.LatLng('{{$event->lat}}', '{{$event->lng}}');--}}
            {{--var map;--}}

            {{--function initMap() {--}}
                {{--map = new google.maps.Map(document.getElementById('map_canvas'), {--}}
                    {{--center: {lat: -34.397, lng: 150.644},--}}
                    {{--zoom: 8--}}
                {{--});--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}




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
      $('#show_detail').click(function(){
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
    <script async src="https://static.addtoany.com/menu/page.js"></script>
@stop