@extends('layouts/default')

{{-- Page title --}}
@section('title')
Edit a event
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" media="screen"  />
	<link href="{{ asset('assets/vendors/select2/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen"  />
	<style>
		.pac-logo::after {
			display: none !important;
		}
	</style>
@stop

{{-- Page content --}}
@section('content')
<!-- Container Section Start -->
<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10" id="add_event">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit event
                    </h4>
                </div>
                <div class="panel-body">
                     @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->uuid]]) !!}

                    <div class="form-group">
                        <label for="title">@lang('frontend.title')</label>
                        {!! Form::text('title', null, ['class' => 'tinymce_basic form-control', 'maxlength' => '80', 'id' => 'title']) !!}
                    </div>
					
					<div class="form-group">
						<label for="type">@lang('frontend.type')</label>
						<div class="form-control radio-group">
							<input type="radio" value="1" name="type" id="type_1" 
							@if ($event->type === 1)
							checked
							@endif
							><label for="type_1">@lang('frontend.online')</label>
							<input type="radio" value="2" name="type" id="type_2" 
							@if ($event->type === 2)
							checked
							@endif
							><label for="type_2">@lang('frontend.offline')</label>
							<input type="radio" value="3" name="type" id="type_3"
							@if ($event->type === 3)
							checked
							@endif
							><label for="type_3">@lang('frontend.online_and_offline')</label>
						</div>
                    </div>
					
					<div class="form-group">
                        <label for="description">@lang('frontend.description')</label>
						{!! Form::textarea('description', null, ['class' => 'form-control textarea', 'maxlength' => '500', 'id' => 'description']) !!}
                    </div>
					<div class="form-group">
                        <label for="location">@lang('frontend.location')</label>
                        {!! Form::text('location', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'location']) !!}
                    </div>


                         <div class="form-group">
                             <label for="event_url">@lang('frontend.url')</label>
                             {!! Form::text('event_url', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'event_url']) !!}
                         </div>

                         {{--<div class="form-group">--}}
                             {{--<label for="readable_url">@lang('frontend.url')</label>--}}
                             {{--{!! Form::text('readable_url', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'readable_url']) !!}--}}
                         {{--</div>--}}
					
					<div class="form-group">
                        <label for="timezone">@lang('frontend.timezone')</label>
						{!! $event->timezone_select !!}
                    </div>
					
					<div class="form-group">
                        <label for="start">@lang('frontend.date')</label>
						<div class="form-group form_datetime">
							<div class="input-group date" id="datestart">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
								{!! Form::text('start', null, ['class' => 'form-control', 'id' => 'start', 'style' => 'width: 100%;', 'readonly' => 'readonly']) !!}
							</div>
						</div>
                    </div>
					
					<div class="form-group">
                        <label for="start">@lang('frontend.enddate')</label>
						<div class="form-group form_datetime">
							<div class="input-group date" id="datefinish">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
								{!! Form::text('finish', null, ['class' => 'form-control', 'id' => 'finish', 'style' => 'width: 100%;', 'readonly' => 'readonly']) !!}
							</div>
						</div>
                    </div>

                         <div class="form-group fields_loc">
                             {!! Form::text('Street', null, ['class' => 'form-control country', 'maxlength' => '255', 'id' => 'street','readonly']) !!}
                         </div>

                         <div class="form-group fields_loc">
                             {!! Form::text('City', null, ['class' => 'form-control city', 'maxlength' => '255', 'id' => 'city','readonly']) !!}
                         </div>

                         <div class="form-group fields_loc">
                             {!! Form::text('State', null, ['class' => 'form-control street', 'maxlength' => '255', 'id' => 'state', 'readonly']) !!}
                         </div>

                         <div class="form-group fields_loc">
                             {!! Form::text('Country', null, ['class' => 'form-control state', 'maxlength' => '255', 'id' => 'country','readonly']) !!}
                         </div>
					{{--<div class="form-group">--}}
                        {{--<label for="status">@lang('frontend.status')</label>--}}
						{{--<select class="form-control active" name="active" id="active">--}}
							{{--<option value="0">@lang('frontend.draft')</option>--}}
							{{--<option value="1">@lang('frontend.published')</option>--}}
						{{--</select>--}}
                    {{--</div>--}}

                    <div class="form-group">
						<div class="col-sm-offset-0 col-sm-4" id="btn_group">
							<button type="submit" class="btn btn-primary text-white">
                                @lang('frontend.update')
                            </button>
						</div>
                    </div>
                    {!! Form::close() !!}
					
					<div id="map" style="display: none;"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop


{{-- page level scripts --}}
@section('footer_scripts')
	<script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
	
	
	<script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script type="text/javascript">//<![CDATA[
	window.onload=function(){
		var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'), {
			//componentRestrictions: {country: 'ru'}
			//language: 'ru'
		});
	}//]]> 
	
	// Get timezone of the place
	// 3 steps: get entered place, find it`s location (coordinates), find its timezone
	$('#location').change(function() {
		setTimeout( function get_timezone() {
			var map;
			var service;
			var infowindow;

			function initialize2() {
			  var pyrmont = new google.maps.LatLng(-33.8665433,151.1956316);

			  map = new google.maps.Map(document.getElementById('map'), {
				  center: pyrmont,
				  zoom: 15
				});

			  var request = {
				query: $('#location').val()
			  };
//                console.log($('#location').val());

			  service = new google.maps.places.PlacesService(map);
			  service.textSearch(request, callback);
			}

			function callback(results, status) {
			  if (status == google.maps.places.PlacesServiceStatus.OK) {
				for (var i = 0; i < results.length; i++) {
					var place = results[i];
					break; 
				}


                  var locale = ($('#location').val());
                  var splits = '';
                  var sity = '';
                  var street = '';
                  var state = '';
                  var country = '';
                  var num_house = '';

                  if (results[0]) {
                      locale = results[0].formatted_address;
                      splits = locale.split(',');
                      console.log(locale);
//
                      if (splits.length == 2) {
                          sity = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                          $('#city').val(sity);
                          country = splits[1];
                          $('#country').val(country);
                          $('#street').attr('style', 'display:none');
                          $('#state').attr('style', 'display:none');
                          $('#city').attr('style', 'display:block');
                          $('#country').attr('style', 'display:block');
                      }

                      if (splits.length == 3) {
                          street = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                          $('#street').val(num_house + ' ' + street);
                          sity = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                          $('#city').val(sity);
                          country = splits[2];
                          $('#country').val(country);
                          $('#state').attr('style', 'display:none');
                          $('#city').attr('style', 'display:block');
                          $('#street').attr('style', 'display:block');
                          $('#country').attr('style', 'display:block');
                      }

                      if (splits.length >= 4) {
                          street = splits[0] + ' ' +splits[1].replace(/(^\s*)|(\s*)$/g, '');
//                            street = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                          $('#street').val(street);

                          sity = splits[2].replace(/(^\s*)|(\s*)$/g, '');
                          $('#city').val(sity);

                          state = splits[3].replace(/(^\s*)|(\s*)$/g, '');
                          $('#state').val(state);

                          country = splits[4];
                          $('#country').val(country);

                          $('#country').attr('style', 'display:block');
                          $('#state').attr('style', 'display:block');
                          $('#city').attr('style', 'display:block');
                          $('#street').attr('style', 'display:block');

                      }
                  }
				var place_id = place["place_id"];
				var location_lat = place["geometry"]["location"]["H"];
				var location_lng = place["geometry"]["location"]["L"];
				
				// https://developers.google.com/maps/documentation/timezone/intro
				$.ajax({
				url: 'https://maps.googleapis.com/maps/api/timezone/json', 
				method: 'get',
					data: {
						location: location_lat+','+location_lng, 
						timestamp: 1331161200, // some value, it only determines dstOffset, I guess
						key: 'AIzaSyDagJei-QVxiyk3VT9TexkyzOjzcWwo3gk'
					}, 
					success: function(data){
						// some mismatches between google and PHP in timezones 
						// https://en.wikipedia.org/wiki/List_of_tz_database_time_zones
						switch (data.timeZoneId) {
							case 'Africa/Asmera': data.timeZoneId = 'Africa/Asmara'; break;
							case 'Africa/Juba': data.timeZoneId = 'Africa/Khartoum'; break;
							case 'Africa/Timbuktu': data.timeZoneId = 'Africa/Bamako'; break;
							case 'America/Argentina/ComodRivadavia': data.timeZoneId = 'America/Argentina/Catamarca'; break;
							case 'America/Atka': data.timeZoneId = 'America/Adak'; break;
							case 'America/Buenos_Aires': data.timeZoneId = 'America/Argentina/Buenos_Aires'; break;
							case 'America/Catamarca': data.timeZoneId = 'America/Argentina/Catamarca'; break;
							case 'America/Coral_Harbour': data.timeZoneId = 'America/Atikokan'; break;
							case 'America/Cordoba': data.timeZoneId = 'America/Argentina/Cordoba'; break;
							case 'America/Ensenada': data.timeZoneId = 'America/Tijuana'; break;
							case 'America/Fort_Wayne': data.timeZoneId = 'America/Indiana/Indianapolis'; break;
							case 'America/Indianapolis': data.timeZoneId = 'America/Indiana/Indianapolis'; break;
							case 'America/Jujuy': data.timeZoneId = 'America/Argentina/Jujuy'; break;
							case 'America/Knox_IN': data.timeZoneId = 'America/Indiana/Knox'; break;
							case 'America/Kralendijk': data.timeZoneId = 'America/Curacao'; break;
							case 'America/Louisville': data.timeZoneId = 'America/Kentucky/Louisville'; break;
							case 'America/Lower_Princes': data.timeZoneId = 'America/Curacao'; break;
							case 'America/Marigot': data.timeZoneId = 'America/Guadeloupe'; break;
							case 'America/Mendoza': data.timeZoneId = 'America/Argentina/Mendoza'; break;
							case 'America/Porto_Acre': data.timeZoneId = 'America/Rio_Branco'; break;
							case 'America/Rosario': data.timeZoneId = 'America/Argentina/Cordoba'; break;
							case 'America/Shiprock': data.timeZoneId = 'America/Denver'; break;
							case 'America/St_Barthelemy': data.timeZoneId = 'America/Guadeloupe'; break;
							case 'America/Virgin': data.timeZoneId = 'America/St_Thomas'; break;
							case 'Antarctica/McMurdo': data.timeZoneId = 'Pacific/Auckland'; break;
							case 'Antarctica/South_Pole': data.timeZoneId = 'Pacific/Auckland'; break;
							case 'Arctic/Longyearbyen': data.timeZoneId = 'Europe/Oslo'; break;
							case 'Asia/Ashkhabad': data.timeZoneId = 'Asia/Ashgabat'; break;
							case 'Asia/Calcutta': data.timeZoneId = 'Asia/Kolkata'; break;
							case 'Asia/Chungking': data.timeZoneId = 'Asia/Chongqing'; break;
							case 'Asia/Dacca': data.timeZoneId = 'Asia/Dhaka'; break;
							case 'Asia/Istanbul': data.timeZoneId = 'Europe/Istanbul'; break;
							case 'Asia/Katmandu': data.timeZoneId = 'Asia/Kathmandu'; break;
							case 'Asia/Macao': data.timeZoneId = 'Asia/Macau'; break;
							case 'Asia/Saigon': data.timeZoneId = 'Asia/Ho_Chi_Minh'; break;
							case 'Asia/Tel_Aviv': data.timeZoneId = 'Asia/Jerusalem'; break;
							case 'Asia/Thimbu': data.timeZoneId = 'Asia/Thimphu'; break;
							case 'Asia/Ujung_Pandang': data.timeZoneId = 'Asia/Makassar'; break;
							case 'Asia/Ulan_Bator': data.timeZoneId = 'Asia/Ulaanbaatar'; break;
							case 'Atlantic/Faeroe': data.timeZoneId = 'Atlantic/Faroe'; break;
							case 'Atlantic/Jan_Mayen': data.timeZoneId = 'Europe/Oslo'; break;
							case 'Australia/ACT': data.timeZoneId = 'Australia/Sydney'; break;
							case 'Australia/Canberra': data.timeZoneId = 'Australia/Sydney'; break;
							case 'Australia/LHI': data.timeZoneId = 'Australia/Lord_Howe'; break;
							case 'Australia/North': data.timeZoneId = 'Australia/Darwin'; break;
							case 'Australia/NSW': data.timeZoneId = 'Australia/Sydney'; break;
							case 'Australia/Queensland': data.timeZoneId = 'Australia/Brisbane'; break;
							case 'Australia/South': data.timeZoneId = 'Australia/Adelaide'; break;
							case 'Australia/Tasmania': data.timeZoneId = 'Australia/Hobart'; break;
							case 'Australia/Victoria': data.timeZoneId = 'Australia/Melbourne'; break;
							case 'Australia/West': data.timeZoneId = 'Australia/Perth'; break;
							case 'Australia/Yancowinna': data.timeZoneId = 'Australia/Broken_Hill'; break;
							case 'Brazil/Acre': data.timeZoneId = 'America/Rio_Branco'; break;
							case 'Brazil/DeNoronha': data.timeZoneId = 'America/Noronha'; break;
							case 'Brazil/East': data.timeZoneId = 'America/Sao_Paulo'; break;
							case 'Brazil/West': data.timeZoneId = 'America/Manaus'; break;
							case 'Canada/Atlantic': data.timeZoneId = 'America/Halifax'; break;
							case 'Canada/Central': data.timeZoneId = 'America/Winnipeg'; break;
							case 'Canada/Eastern': data.timeZoneId = 'America/Toronto'; break;
							case 'Canada/East-Saskatchewan': data.timeZoneId = 'America/Regina'; break;
							case 'Canada/Mountain': data.timeZoneId = 'America/Edmonton'; break;
							case 'Canada/Newfoundland': data.timeZoneId = 'America/St_Johns'; break;
							case 'Canada/Pacific': data.timeZoneId = 'America/Vancouver'; break;
							case 'Canada/Saskatchewan': data.timeZoneId = 'America/Regina'; break;
							case 'Canada/Yukon': data.timeZoneId = 'America/Whitehorse'; break;
							case 'Chile/Continental': data.timeZoneId = 'America/Santiago'; break;
							case 'Chile/EasterIsland': data.timeZoneId = 'Pacific/Easter'; break;
							case 'Cuba': data.timeZoneId = 'America/Havana'; break;
							case 'Egypt': data.timeZoneId = 'Africa/Cairo'; break;
							case 'Eire': data.timeZoneId = 'Europe/Dublin'; break;
							case 'Europe/Belfast': data.timeZoneId = 'Europe/London'; break;
							case 'Europe/Bratislava': data.timeZoneId = 'Europe/Prague'; break;
							case 'Europe/Busingen': data.timeZoneId = 'Europe/Zurich'; break;
							case 'Europe/Guernsey': data.timeZoneId = 'Europe/London'; break;
							case 'Europe/Isle_of_Man': data.timeZoneId = 'Europe/London'; break;
							case 'Europe/Jersey': data.timeZoneId = 'Europe/London'; break;
							case 'Europe/Ljubljana': data.timeZoneId = 'Europe/Belgrade'; break;
							case 'Europe/Mariehamn': data.timeZoneId = 'Europe/Helsinki'; break;
							case 'Europe/Nicosia': data.timeZoneId = 'Asia/Nicosia'; break;
							case 'Europe/Podgorica': data.timeZoneId = 'Europe/Belgrade'; break;
							case 'Europe/San_Marino': data.timeZoneId = 'Europe/Rome'; break;
							case 'Europe/Sarajevo': data.timeZoneId = 'Europe/Belgrade'; break;
							case 'Europe/Skopje': data.timeZoneId = 'Europe/Belgrade'; break;
							case 'Europe/Tiraspol': data.timeZoneId = 'Europe/Chisinau'; break;
							case 'Europe/Vatican': data.timeZoneId = 'Europe/Rome'; break;
							case 'Europe/Zagreb': data.timeZoneId = 'Europe/Belgrade'; break;
							case 'Pacific/Ponape': data.timeZoneId = 'Pacific/Pohnpei'; break;
							case 'Pacific/Samoa': data.timeZoneId = 'Pacific/Pago_Pago'; break;
							case 'Pacific/Truk': data.timeZoneId = 'Pacific/Chuuk'; break;
						}
						
						$('#timezone option').removeAttr("selected");
						$('#timezone option[value="'+data.timeZoneId+'"]:eq(0)').attr("selected", "selected");
						// update selection for select2 script
						var option = $('#timezone option[value="'+data.timeZoneId+'"]').first().html();
						$('#select2-timezone-results li.select2-results__option').attr('aria-selected', 'false');
						$('#select2-timezone-results li.select2-results__option:contains("'+option+'"):eq(0)').attr('aria-selected', 'true');
						$('#select2-timezone-container').html(option);
					}
				});
				
			  }
			}
			initialize2();
		}, 200);
	});
	</script>
	

	<script type="text/javascript">
	$('#timezone').select2();
	
	// select event timezone
	$('#timezone option[value="{{$event->timezone}}"]').attr('selected','selected');
	// select event status
	$('#active option[value="{{$event->active}}"]').attr('selected','selected');
	
	// http://eonasdan.github.io/bootstrap-datetimepicker/Options/#locale
	$('#datestart').datetimepicker({
		//locale: 'ru',
		//extraFormats: true,
		ignoreReadonly: true, 
		allowInputToggle: true,
        format: 'yyyy/mm/dd hh:ii',
		stepping: 5,
		sideBySide: true,
		showClose: true,
		showClear: true,
		showTodayButton: true,
		defaultDate: '{{ $event->start }}'
	});
	$('#datefinish').datetimepicker({
		//locale: 'ru',
		//extraFormats: true,
		ignoreReadonly: true, 
		allowInputToggle: true,
        format: 'yyyy/mm/dd hh:ii',
		stepping: 5,
		sideBySide: true,
		showClose: true,
		showClear: true,
		showTodayButton: true,
		defaultDate: '{{ $event->finish }}'
	});
	$("#datestart").on("dp.change", function (e) {
		$('#datefinish').data("DateTimePicker").minDate(e.date);
	});
	// run second calendar after closing of first
	$("#datestart").on("dp.hide", function (e) {
		$('#datefinish .glyphicon-calendar').click();
	});
	/*
	$("#datefinish").on("dp.change", function (e) {
		$('#datestart').data("DateTimePicker").maxDate(e.date);
	});
	*/
	
	$('input#title').maxlength({ 
		//alwaysShow: true,
		threshold: 25, 
		warningClass: "label label-success",
		limitReachedClass: "label label-danger",
		preText: '@lang('frontend.you_typed') ',
		separator: ' @lang('frontend.chars_out_of') ',
		postText: ' @lang('frontend.chars')',
		validate: true
	});
	$('textarea#description').maxlength({ 
		threshold: 80, 
		warningClass: "label label-success",
		limitReachedClass: "label label-danger",
		preText: '@lang('frontend.you_typed') ',
		separator: ' @lang('frontend.chars_out_of') ',
		postText: ' @lang('frontend.chars')',
		validate: true
	});
	$('#url, #location').maxlength({ 
		threshold: 60, 
		warningClass: "label label-success",
		limitReachedClass: "label label-danger",
		preText: '@lang('frontend.you_typed') ',
		separator: ' @lang('frontend.chars_out_of') ',
		postText: ' @lang('frontend.chars')',
		validate: true
	});
	</script>
@stop