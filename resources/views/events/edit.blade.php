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
                        <div class="form-group">
                            <label for="event_url">@lang('frontend.url')</label>
                            {!! Form::text('event_url', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'event_url']) !!}
                        </div>

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
                                    {!! Form::text('start', null, ['class' => 'form-control', 'id' => 'start', 'style' => 'width: 100%;']) !!}
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
                                    {!! Form::text('finish', null, ['class' => 'form-control', 'id' => 'finish', 'style' => 'width: 100%;']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">@lang('frontend.status')</label>
                            <select class="form-control active" name="status" id="status">
                                <option value="Draft">@lang('frontend.draft')</option>
                                <option value="Publish">@lang('frontend.published')</option>
                            </select>
                        </div>

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

<style>
    .fields_loc{
        display: none;
    }
</style>
{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    {{--<script src="{{asset('assets/vendors/timepicker/js/bootstrap-timepicker.min.js')}}"></script>--}}
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/js/date.format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>



    <script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

    <script>
        $(document).ready(function() {
            $('#start, #finish').mask('9999/99/99 99:99', {placeholder: 'yyyy/mm/dd hh:mm'});
            var nowtimedate = new Date();
            nowtimedate = nowtimedate.format('Y/m/d H:i');
            $("#datestart").datetimepicker({
                format: 'yyyy/mm/dd hh:ii',
                autoclose: true,
                todayBtn: true,
                startDate: nowtimedate,
                minuteStep: 10,
                controlType: 'select',
                minDate: nowtimedate
            });
            $("#datefinish").datetimepicker({
                format: 'yyyy/mm/dd hh:ii',
                autoclose: true,
                todayBtn: true,
                controlType: 'select',
                startDate: $('#finish').val(),
                minDate: $('#finish').val(),
                minuteStep: 10

            });
        });

        $('#start').on('change', function() {
            var nowtimedate = new Date();
            nowtimedate = nowtimedate.format('Y/m/d H:i');
            var start_def_date = new Date();
            var start_date = new Date($('#start').val());


            if(start_date.getTime() < start_def_date.getTime()) {
                $('#start').val(start_def_date.format('Y/m/d H:i'));
                return false;
            }

            var end_date = new Date(start_date);
            end_date.setHours(start_date.getHours() + 1);
            end_date = end_date.format('Y/m/d H:i');
            $('#finish').val(end_date);
            if($('#finish').val()=='NaN/NaN/NaN NaN:NaN'){
                $('#finish').val('');
            }
            $("#datefinish").datetimepicker("remove");
            $("#datefinish").datetimepicker({
                onSelect: function() {alert('sdfsdfsdf')},
                format: 'yyyy/mm/dd hh:ii',
                autoclose: true,
                todayBtn: true,
                controlType: 'select',
                startDate: $('#finish').val(),
                minDate: $('#finish').val(),
                minuteStep: 10

            });

        });

        $('#finish').on('change', function() {
            var start_date = new Date($('#start').val());
            var end_date = new Date($('#finish').val());

            if(end_date.getTime() < start_date.getTime()) {
                var end_date = new Date(start_date);
                end_date.setHours(start_date.getHours() + 1);
                end_date = end_date.format('Y/m/d H:i');

                $('#finish').val(end_date);
            }
        });
    </script>
    <script type="text/javascript">//<![CDATA[
        window.onload=function(){
            var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'), {
                //componentRestrictions: {country: 'ru'}
                //language: 'ru'
            });
        }//]]>

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

                                if($.isNumeric(splits[1])){
                                    street = splits[0] + ' ' +splits[1].replace(/(^\s*)|(\s*)$/g, '');
                                    $('#street').val(street);

//                                street = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                                    sity = splits[2].replace(/(^\s*)|(\s*)$/g, '');
                                    $('#city').val(sity);

                                    state = splits[3].replace(/(^\s*)|(\s*)$/g, '');
                                    $('#state').val(state);

                                    country = splits[4];
                                    $('#country').val(country);
                                }else{
                                    street = splits[0].replace(/(^\s*)|(\s*)$/g, '');
                                    $('#street').val(street);
                                    sity = splits[1].replace(/(^\s*)|(\s*)$/g, '');
                                    $('#city').val(sity);

                                    state = splits[2].replace(/(^\s*)|(\s*)$/g, '');
                                    $('#state').val(state);

                                    country = splits[3];
                                    $('#country').val(country);
                                }



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
                        }
                    }

                    initialize2();
                }, 200);
            }
        });
    </script>


    <script type="text/javascript">
        $('#timezone').select2();

        // select event timezone
        $('#timezone option[value="{{$event->timezone}}"]').attr('selected','selected');
        // select event status
        $('#active option[value="{{$event->active}}"]').attr('selected','selected');

        // http://eonasdan.github.io/bootstrap-datetimepicker/Options/#locale
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