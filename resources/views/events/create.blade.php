@extends('layouts/default')

{{-- Page title --}}
@section('title')
Create New event
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" media="screen"  />
	<link href="{{ asset('assets/vendors/select2/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen"  />
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css" media="screen"  />
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen"  />
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
                    <h4 class="panel-title"> <i class="livicon" data-name="plus-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
						@lang('frontend.add_event_header')
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

					<h3 class="primary">@lang('frontend.add_event_text')</h3>
                         <input id="usertimezone" type="text" content="usertimezone" name="usertimezone" value="" hidden>

                    {!! Form::open(['url' => 'events', 'id' => 'create_event']) !!}
                         {{--<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }} " />--}}



                    <div class="form-group">
                        <label for="title">@lang('frontend.title')</label>
                        {!! Form::text('title', null, ['class' => 'tinymce_basic form-control', 'maxlength' => '25', 'id' => 'title']) !!}
                        <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>

                    </div>

                    <div class="form-group" id="add_dicription">
                        <i class="fa fa-fw fa-comment"></i>
                        <a >Add Description</a>
                    </div>

					<div class="form-group" id="descprip" style="display: none">
                        <label for="description">@lang('frontend.description')</label>

						{!! Form::textarea('description', null, ['class' => 'form-control textarea', 'maxlength' => '500', 'id' => 'description']) !!}
                        <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        {{--<button type="button" class="btn btn-warning " title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title">!</button>--}}
                    </div>
                         <div id="hide_dicription" style="display: none">
                            <i class="fa fa-fw fa-stop"></i>
                            <a class="show_hide" >Hide Description</a>
                         </div>
					<div class="form-group">
                            <label for="start">@lang('frontend.date')</label>
                        <div class="form-group form_datetime">
                            <div class="input-group date form_datetime3 col-md-12"  id="datestart">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </span>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <input class="form-control" size="16" id="start" name="start" type="datetime"  min="{{$start_date}}" value="{{$start_date}}">

                            </div>
                        </div>
                                    <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                    </div>


                         <div class="form-group" id="change_time_zone">
                            <span>Timezone is {{$user_timezone}}. Default duration is 1h.<a id="time_change">Change here.</a></span>
                         </div>
        		<div class="form-group" id="end_time_event" style="display:none" >
                        <label for="start">@lang('frontend.enddate')</label>
						 <div class="form-group form_datetime">
                                        <div class="input-group date form_datetime3 col-md-12" id="datefinish">
                                             <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </span>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </span>
                                            <input class="form-control" size="16" id="finish" name="finish" type="text" value="{{$finish_date}}">

                                        </div>
                                    </div>
                        <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                    </div>


                    <div class="form-group"  id="time_zone_change" style="display:none">
                             <label for="timezone">@lang('frontend.timezone')</label>
                             {!! $timezone_select !!}
                             <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                    </div>

                    <input type="hidden" value="1" name="active" id="active" readonly>


                    <div class="form-group locale">
                        <label for="location">@lang('frontend.location')</label>
                        {!! Form::text('location', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'location']) !!}
                        <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                    </div>

                        <div class="fields_map" style="display: none">
                         <div class="map_event_loc" id="map"></div>
                         <div class="form-group fields_loc">
                             {!! Form::text('Street', null, ['class' => 'form-control country', 'maxlength' => '255', 'id' => 'street']) !!}
                         </div>

                         <div class="form-group fields_loc">
                             {!! Form::text('City', null, ['class' => 'form-control city', 'maxlength' => '255', 'id' => 'city']) !!}
                         </div>

                         <div class="form-group fields_loc">
                             {!! Form::text('State', null, ['class' => 'form-control street', 'maxlength' => '255', 'id' => 'state']) !!}
                         </div>

                         <div class="form-group fields_loc">
                             {!! Form::text('Country', null, ['class' => 'form-control state', 'maxlength' => '255', 'id' => 'country']) !!}
                         </div>
                        <a id="reset_loc">Reset Address</a>
                        </div>

                        <div class="">
                            <i class="fa fa-fw fa-gears"></i>
                            <a>Advansed Options</a>
                         </div>
                         <div class="form-group" style='float:right; left: -5%;'>
                        <div class="col-sm-offset-0 col-sm-12" id="btn_group">
                            <button type="button" class="btn" onclick="(function($) { $('#active').val('0'); $('#btn_group .btn-primary').click(); })(jQuery);">
                                @lang('frontend.save_as_draft')
                            </button>
                            <button class="btn btn-primary text-white test submit">
                                @lang('frontend.save_and_publish')
                            </button>
                        </div>

                    </div>
                         <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    {!! Form::close() !!}
                </div>
                    <div class="checkbox">

  <label><input type="checkbox" value="">This is a test event</label>
</div>
            </div>
        </div>
		<div class="col-md-1"></div>
	</div>
    <!-- row-->
</div>

@stop
<style>
    .fa{
        font-size:20px !important;
    }
    .map_event_loc{
        height: 250px;
        width: 370px;
        float: right;
        left: -5%;
    }
    .fields_loc{
        width: 35% !important;
        position: relative;
        float: right;
    }
    </style>
{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
     <script src="{{asset('assets/vendors/timepicker/js/bootstrap-timepicker.min.js')}}"></script>
     <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/js/bootbox.js') }}"></script>
    <script>
        $(document).on("click", ".submit", function(e) {
            event.preventDefault();
            bootbox.confirm("Do you want to publish this event?", function(result) {
                if (result == true) {
                   $('#create_event').submit();
                }
            });
        });
    </script>

    <script type="text/javascript" src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/modal/js/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/switchery/switchery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/switch/js/bootstrap-switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/switchery/switchery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/switch/js/bootstrap-switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/advfeatures.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jstz.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/moment.js') }}"></script>
	<script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>


    <script>
    $( document ).ready(function() {
        var date = new Date('{{ $start_date }}');
        $("#datestart").datetimepicker({
            format: 'yyyy/mm/dd hh:ii',
            autoclose: true,
            todayBtn: true,
            startDate: date,
            minuteStep: 10,
            minDate: date
        });

        var datef = new Date('{{ $finish_date }}');
        $("#datefinish").datetimepicker({
//                defaultDate: date,
            format: 'yyyy/mm/dd hh:ii',
            autoclose: true,
            todayBtn: true,
            startDate: datef,
            minDate: datef,
            minuteStep: 10
        });

        var offset = new Date().getTimezoneOffset();

        var timezone = jstz.determine();
        var usertimezone = timezone.name();
        console.log(usertimezone);
        $('input[name="usertimezone"]').attr('value', usertimezone);
        $('input[name="usertimezone"]').attr('content', usertimezone);


        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
//        $.get('/event/add', function(){
//            var timezone = jstz.determine();
//            var usertimezone = timezone.name();
//            $('input[name="usertimezone"]').attr('value', usertimezone);
//            $('input[name="usertimezone"]').attr('content', usertimezone);
//            console.log(usertimezone);
//        });
        $.ajax({
            url:'',
            type: 'GET',
            data: {
                value: document.getElementById('usertimezone').value = usertimezone
            },
            success: function( data ){
                document.getElementById('usertimezone').value = usertimezone;
                console.log(data);
            },
            error: function (xhr, b, c) {
                console.log("xhr=" + xhr + " b=" + b + " c=" + c);
            }
        });


    });
    </script>
	<script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script type="text/javascript">//<![CDATA[
//        $("#show_hide").click(function () {
////            alert('sddd');
//            $('#descprip').toggle();
//        });
//        $("#time_change").click(function () {
////            alert('sddd');
//            $('#time_zone_change').toggle();
//        });

//        $('#location').click(function(){
//            $('.fields_map').attr('style', 'display:block');
//        })

        var location_lat;
        var location_lng;

        $("#add_dicription").click(function () {
            $('#descprip').attr('style', 'display:block');
            $('#add_dicription').attr('style', 'display:none');
            $('#hide_dicription').attr('style', 'display:block');
        });

        $("#hide_dicription").click(function () {
            $('#descprip').attr('style', 'display:none');
            $('#add_dicription').attr('style', 'display:block');
            $('#hide_dicription').attr('style', 'display:none');
        });

        $('#time_change').click(function(){
            $('#time_zone_change').attr('style', 'display:block');
            $('#end_time_event').attr('style', 'display:block');
            $('#change_time_zone').attr('style', 'display:none');
            $('.select2-container--default').attr('style', 'width:70%');

        });

       window.onload=function(){
	       var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'), {
		//componentRestrictions: {country: 'ru'}
		//language: 'ru'
	});
	}//]]>
        $('#reset_loc').click(function(){
            $('.locale').attr('style', 'display:block');
            $('.fields_map').attr('style', 'display:none');
            $('#location').val('');

        })

	// Get timezone of the place
	// 3 steps: get entered place, find it`s location (coordinates), find its timezone
    $('#location').change(function () {
        $('.locale').attr('style', 'display:none');
        $('.fields_map').attr('style', 'display:block');
        setTimeout(function get_timezone() {
            var map;
            var service;
            var infowindow;

            function initialize2() {
                map = new google.maps.Map(document.getElementById('map'));
                var request = {
                    query: $('#location').val()
                };
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
                            $('#street').val(sity);
                            country = splits[1];
                            $('#state').val(country);
                            $('#country').attr('style', 'display:none');
                            $('#state').attr('style', 'display:none');
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
                            num_house = splits[0];
                            street = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                            $('#street').val(num_house + ' ' + street);

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
                    location_lat = place["geometry"]["location"].lat();
                    location_lng = place["geometry"]["location"].lng();

                    var pyrmont = new google.maps.LatLng(location_lat, location_lng);
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: pyrmont,
                        zoom: 15
                    });
                    var request = {
                        query: $('#location').val()
                    };
                    var marker = new google.maps.Marker({
                        position: pyrmont,
                        map: map
                    });
                    service = new google.maps.places.PlacesService(map);
                }
            }

            initialize2();
        }, 200);
                    });

        $( document ).ready(function() {
if($('#location').val()) {
//            $('#location').change(function () {
    $('.locale').attr('style', 'display:none');
    $('.fields_map').attr('style', 'display:block');
    setTimeout(function get_timezone() {
        var map;
        var service;
        var infowindow;

        function initialize2() {
            map = new google.maps.Map(document.getElementById('map'));
            var request = {
                query: $('#location').val()
            };
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
                        $('#street').val(sity);
                        country = splits[1];
                        $('#state').val(country);
                        $('#country').attr('style', 'display:none');
                        $('#state').attr('style', 'display:none');
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
                        num_house = splits[0];
                        street = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                        $('#street').val(num_house + ' ' + street);

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
                location_lat = place["geometry"]["location"].lat();
                location_lng = place["geometry"]["location"].lng();

                var pyrmont = new google.maps.LatLng(location_lat, location_lng);
                map = new google.maps.Map(document.getElementById('map'), {
                    center: pyrmont,
                    zoom: 15
                });
                var request = {
                    query: $('#location').val()
                };
                var marker = new google.maps.Marker({
                    position: pyrmont,
                    map: map
                });
                service = new google.maps.places.PlacesService(map);

                // https://developers.google.com/maps/documentation/timezone/intro
                {{--$.ajax({--}}
                {{--url: 'https://maps.googleapis.com/maps/api/timezone/json',--}}
                {{--method: 'get',--}}
                {{--data: {--}}
                {{--location: location_lat+','+location_lng,--}}
                {{--timestamp: 1331161200, // some value, it only determines dstOffset, I guess--}}
                {{--key: 'AIzaSyDagJei-QVxiyk3VT9TexkyzOjzcWwo3gk'--}}
                {{--},--}}
                {{--success: function(data){--}}
                {{--//                                console.log(data.timeZoneId);--}}
                {{--//                                offset = new Date().getTimezoneId();--}}
                {{--// some mismatches between google and PHP in timezones--}}
                {{--// https://en.wikipedia.org/wiki/List_of_tz_database_time_zones--}}
                {{--switch (data.timeZoneId) {--}}
                {{--case 'Africa/Asmera': data.timeZoneId = 'Africa/Asmara'; break;--}}
                {{--case 'Africa/Juba': data.timeZoneId = 'Africa/Khartoum'; break;--}}
                {{--case 'Africa/Timbuktu': data.timeZoneId = 'Africa/Bamako'; break;--}}
                {{--case 'America/Argentina/ComodRivadavia': data.timeZoneId = 'America/Argentina/Catamarca'; break;--}}
                {{--case 'America/Atka': data.timeZoneId = 'America/Adak'; break;--}}
                {{--case 'America/Buenos_Aires': data.timeZoneId = 'America/Argentina/Buenos_Aires'; break;--}}
                {{--case 'America/Catamarca': data.timeZoneId = 'America/Argentina/Catamarca'; break;--}}
                {{--case 'America/Coral_Harbour': data.timeZoneId = 'America/Atikokan'; break;--}}
                {{--case 'America/Cordoba': data.timeZoneId = 'America/Argentina/Cordoba'; break;--}}
                {{--case 'America/Ensenada': data.timeZoneId = 'America/Tijuana'; break;--}}
                {{--case 'America/Fort_Wayne': data.timeZoneId = 'America/Indiana/Indianapolis'; break;--}}
                {{--case 'America/Indianapolis': data.timeZoneId = 'America/Indiana/Indianapolis'; break;--}}
                {{--case 'America/Jujuy': data.timeZoneId = 'America/Argentina/Jujuy'; break;--}}
                {{--case 'America/Knox_IN': data.timeZoneId = 'America/Indiana/Knox'; break;--}}
                {{--case 'America/Kralendijk': data.timeZoneId = 'America/Curacao'; break;--}}
                {{--case 'America/Louisville': data.timeZoneId = 'America/Kentucky/Louisville'; break;--}}
                {{--case 'America/Lower_Princes': data.timeZoneId = 'America/Curacao'; break;--}}
                {{--case 'America/Marigot': data.timeZoneId = 'America/Guadeloupe'; break;--}}
                {{--case 'America/Mendoza': data.timeZoneId = 'America/Argentina/Mendoza'; break;--}}
                {{--case 'America/Porto_Acre': data.timeZoneId = 'America/Rio_Branco'; break;--}}
                {{--case 'America/Rosario': data.timeZoneId = 'America/Argentina/Cordoba'; break;--}}
                {{--case 'America/Shiprock': data.timeZoneId = 'America/Denver'; break;--}}
                {{--case 'America/St_Barthelemy': data.timeZoneId = 'America/Guadeloupe'; break;--}}
                {{--case 'America/Virgin': data.timeZoneId = 'America/St_Thomas'; break;--}}
                {{--case 'Antarctica/McMurdo': data.timeZoneId = 'Pacific/Auckland'; break;--}}
                {{--case 'Antarctica/South_Pole': data.timeZoneId = 'Pacific/Auckland'; break;--}}
                {{--case 'Arctic/Longyearbyen': data.timeZoneId = 'Europe/Oslo'; break;--}}
                {{--case 'Asia/Ashkhabad': data.timeZoneId = 'Asia/Ashgabat'; break;--}}
                {{--case 'Asia/Calcutta': data.timeZoneId = 'Asia/Kolkata'; break;--}}
                {{--case 'Asia/Chungking': data.timeZoneId = 'Asia/Chongqing'; break;--}}
                {{--case 'Asia/Dacca': data.timeZoneId = 'Asia/Dhaka'; break;--}}
                {{--case 'Asia/Istanbul': data.timeZoneId = 'Europe/Istanbul'; break;--}}
                {{--case 'Asia/Katmandu': data.timeZoneId = 'Asia/Kathmandu'; break;--}}
                {{--case 'Asia/Macao': data.timeZoneId = 'Asia/Macau'; break;--}}
                {{--case 'Asia/Saigon': data.timeZoneId = 'Asia/Ho_Chi_Minh'; break;--}}
                {{--case 'Asia/Tel_Aviv': data.timeZoneId = 'Asia/Jerusalem'; break;--}}
                {{--case 'Asia/Thimbu': data.timeZoneId = 'Asia/Thimphu'; break;--}}
                {{--case 'Asia/Ujung_Pandang': data.timeZoneId = 'Asia/Makassar'; break;--}}
                {{--case 'Asia/Ulan_Bator': data.timeZoneId = 'Asia/Ulaanbaatar'; break;--}}
                {{--case 'Atlantic/Faeroe': data.timeZoneId = 'Atlantic/Faroe'; break;--}}
                {{--case 'Atlantic/Jan_Mayen': data.timeZoneId = 'Europe/Oslo'; break;--}}
                {{--case 'Australia/ACT': data.timeZoneId = 'Australia/Sydney'; break;--}}
                {{--case 'Australia/Canberra': data.timeZoneId = 'Australia/Sydney'; break;--}}
                {{--case 'Australia/LHI': data.timeZoneId = 'Australia/Lord_Howe'; break;--}}
                {{--case 'Australia/North': data.timeZoneId = 'Australia/Darwin'; break;--}}
                {{--case 'Australia/NSW': data.timeZoneId = 'Australia/Sydney'; break;--}}
                {{--case 'Australia/Queensland': data.timeZoneId = 'Australia/Brisbane'; break;--}}
                {{--case 'Australia/South': data.timeZoneId = 'Australia/Adelaide'; break;--}}
                {{--case 'Australia/Tasmania': data.timeZoneId = 'Australia/Hobart'; break;--}}
                {{--case 'Australia/Victoria': data.timeZoneId = 'Australia/Melbourne'; break;--}}
                {{--case 'Australia/West': data.timeZoneId = 'Australia/Perth'; break;--}}
                {{--case 'Australia/Yancowinna': data.timeZoneId = 'Australia/Broken_Hill'; break;--}}
                {{--case 'Brazil/Acre': data.timeZoneId = 'America/Rio_Branco'; break;--}}
                {{--case 'Brazil/DeNoronha': data.timeZoneId = 'America/Noronha'; break;--}}
                {{--case 'Brazil/East': data.timeZoneId = 'America/Sao_Paulo'; break;--}}
                {{--case 'Brazil/West': data.timeZoneId = 'America/Manaus'; break;--}}
                {{--case 'Canada/Atlantic': data.timeZoneId = 'America/Halifax'; break;--}}
                {{--case 'Canada/Central': data.timeZoneId = 'America/Winnipeg'; break;--}}
                {{--case 'Canada/Eastern': data.timeZoneId = 'America/Toronto'; break;--}}
                {{--case 'Canada/East-Saskatchewan': data.timeZoneId = 'America/Regina'; break;--}}
                {{--case 'Canada/Mountain': data.timeZoneId = 'America/Edmonton'; break;--}}
                {{--case 'Canada/Newfoundland': data.timeZoneId = 'America/St_Johns'; break;--}}
                {{--case 'Canada/Pacific': data.timeZoneId = 'America/Vancouver'; break;--}}
                {{--case 'Canada/Saskatchewan': data.timeZoneId = 'America/Regina'; break;--}}
                {{--case 'Canada/Yukon': data.timeZoneId = 'America/Whitehorse'; break;--}}
                {{--case 'Chile/Continental': data.timeZoneId = 'America/Santiago'; break;--}}
                {{--case 'Chile/EasterIsland': data.timeZoneId = 'Pacific/Easter'; break;--}}
                {{--case 'Cuba': data.timeZoneId = 'America/Havana'; break;--}}
                {{--case 'Egypt': data.timeZoneId = 'Africa/Cairo'; break;--}}
                {{--case 'Eire': data.timeZoneId = 'Europe/Dublin'; break;--}}
                {{--case 'Europe/Belfast': data.timeZoneId = 'Europe/London'; break;--}}
                {{--case 'Europe/Bratislava': data.timeZoneId = 'Europe/Prague'; break;--}}
                {{--case 'Europe/Busingen': data.timeZoneId = 'Europe/Zurich'; break;--}}
                {{--case 'Europe/Guernsey': data.timeZoneId = 'Europe/London'; break;--}}
                {{--case 'Europe/Isle_of_Man': data.timeZoneId = 'Europe/London'; break;--}}
                {{--case 'Europe/Jersey': data.timeZoneId = 'Europe/London'; break;--}}
                {{--case 'Europe/Ljubljana': data.timeZoneId = 'Europe/Belgrade'; break;--}}
                {{--case 'Europe/Mariehamn': data.timeZoneId = 'Europe/Helsinki'; break;--}}
                {{--case 'Europe/Nicosia': data.timeZoneId = 'Asia/Nicosia'; break;--}}
                {{--case 'Europe/Podgorica': data.timeZoneId = 'Europe/Belgrade'; break;--}}
                {{--case 'Europe/San_Marino': data.timeZoneId = 'Europe/Rome'; break;--}}
                {{--case 'Europe/Sarajevo': data.timeZoneId = 'Europe/Belgrade'; break;--}}
                {{--case 'Europe/Skopje': data.timeZoneId = 'Europe/Belgrade'; break;--}}
                {{--case 'Europe/Tiraspol': data.timeZoneId = 'Europe/Chisinau'; break;--}}
                {{--case 'Europe/Vatican': data.timeZoneId = 'Europe/Rome'; break;--}}
                {{--case 'Europe/Zagreb': data.timeZoneId = 'Europe/Belgrade'; break;--}}
                {{--case 'Pacific/Ponape': data.timeZoneId = 'Pacific/Pohnpei'; break;--}}
                {{--case 'Pacific/Samoa': data.timeZoneId = 'Pacific/Pago_Pago'; break;--}}
                {{--case 'Pacific/Truk': data.timeZoneId = 'Pacific/Chuuk'; break;--}}
                {{--default : data.timeZoneId = '{!!$user_timezone!!}';--}}
                {{--}--}}

                {{--$('#timezone option').removeAttr("selected");--}}
                {{--$('#timezone option[value="'+data.timeZoneId+'"]:eq(0)').attr("selected", "selected");--}}
                {{--////                                update selection for select2 script (visual)--}}
                {{--//                                $('#select2-timezone-container').html( $('#timezone option[value="'+data.timeZoneId+'"]').first().html());--}}
                {{--//                                $('#select2-timezone-results li.select2-results__option').attr('aria-selected', 'false');--}}
                {{--//                                $('#select2-timezone-results li.select2-results__option:contains("'+option+'"):eq(0)').attr('aria-selected', 'true');--}}
                {{--//                                $('#select2-timezone-container').html(option);--}}
                {{--//                                console.log(data.timeZoneId);--}}
                {{--}--}}
                {{--});--}}

            }
        }

        initialize2();
    }, 200);
//            });
}
        });
	</script>

	<script type="text/javascript">
	$('#timezone').select2();



	// http://eonasdan.github.io/bootstrap-datetimepicker/Options/#locale
	// $('#datestart').datetimepicker({
	// 	//locale: 'ru',
	// 	//extraFormats: true,
	// 	ignoreReadonly: true,
	// 	allowInputToggle: true,
	// 	format: 'YYYY/MM/DD HH:mm', // hh for AM/PM
	// 	stepping: 5,
	// 	sideBySide: true,
	// 	showClose: true,
	// 	showClear: true,
	// 	showTodayButton: true,
	{{--// 	defaultDate: '{{ $start_date }}'--}}

	// });
	// $('#datefinish').datetimepicker({
	// 	//locale: 'ru',
	// 	//extraFormats: true,
	// 	ignoreReadonly: true,
	// 	allowInputToggle: true,
	// 	format: 'YYYY/MM/DD HH:mm', // hh for AM/PM
	// 	stepping: 5,
	// 	sideBySide: true,
	// 	showClose: true,
	// 	showClear: true,
	// 	showTodayButton: true,
	{{--// 	defaultDate: '{{ $finish_date }}'--}}
	// });
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
    
    $('#start').on('change', function() {
        var d1 = new Date ($('#start').val());
        var d2 = new Date (d1);
        d2.setHours(d1.getHours() + 1);
        
        console.log(d2);

        $("#datefinish").datetimepicker({
            format: 'yyyy/mm/dd hh:ii',
            autoclose: true,
            todayBtn: true,
            startDate: d2,
            minDate: d2,
            minuteStep: 10
        });
    });

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
		threshold: 500,
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