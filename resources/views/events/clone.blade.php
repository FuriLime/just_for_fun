@extends('layouts/default')

{{-- Page title --}}
@section('title')
    @lang('frontend.add_event_header')
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
                        <h4 class="panel-title"> <i class="livicon" data-name="clone" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            @lang('frontend.clone_event_header')
                        </h4>
                    </div>
                    <div class="panel-body">
                        {{--@if ($errors->any())--}}
                            {{--<ul class="alert alert-danger">--}}
                                {{--@foreach ($errors->all() as $error)--}}
                                    {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--@endif--}}
                        <h3 class="primary add_event_section_link">@lang('frontend.clone_event_text')</h3>

                        {!! Form::open() !!}
                        <div class="form-group">
                            <label for="title">@lang('frontend.title')</label>
                            <input class="tinymce_basic form-control" size="16" id="title" name="title" type="text", maxlength="80" value="{{$event['title']}}">
                            <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="@lang('pop_over.content')" data-original-title="@lang('pop_over.title')"></i>
                            <div class="form-group">
                                @if ($errors->first('title'))
                                    <ul class="alert alert-danger myalert">
                                        <li>{{ $errors->first('title') }}</li>
                                    </ul>
                                @endif
                            </div>


                        </div>

                        <div class="form-group add_event_section_link" id="add_dicription">
                            <i class="fa fa-fw fa-comment"></i>
                            <a >Add Description</a>
                        </div>

                        <div class="form-group" id="descprip" style="display: none">
                            <label for="description">@lang('frontend.description')</label>
                            <textarea class="textarea form-control" type="textarea" id="description" name="description", maxlength="500" value="{{$event['description']}}">{{$event['description']}}</textarea>
{{--                            {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'maxlength' => '500', 'id' => 'description']) !!}--}}
                            <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                            {{--<button type="button" class="btn btn-warning " title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title">!</button>--}}
                        </div>
                        <div id="hide_dicription" class="add_event_section_link" style="display: none">
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
                                    <input class="form-control" size="16" id="start" name="start" type="datetime" value="{{@isset($event)? $event['start'] : $start_date}}">

                                </div>
                                @if ($errors->first('start'))
                                    <ul class="alert alert-danger">
                                        <li>{{ $errors->first('start') }}</li>
                                    </ul>
                                @endif
                            </div>
                            <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        </div>


                        <div class="form-group add_event_section_link" id="change_time_zone">
                            <span>Timezone is {{@isset($event)? $event['timezone'] : $user_timezone}}. Default duration is 1h. <a id="time_change">Change here.</a></span>
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
                                    <input class="form-control" size="16" id="finish" name="finish" type="text" value="{{@isset($event)? $event['finish'] : $finish_date}}">

                                </div>
                                @if ($errors->first('finish'))
                                    <ul class="alert alert-danger">
                                        <li>{{ $errors->first('finish') }}</li>
                                    </ul>
                                @endif
                            </div>
                            <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        </div>


                        <div class="form-group"  id="time_zone_change" style="display:none">
                            <label for="timezone">@lang('frontend.timezone')</label>
                            {!!@isset($event)?  $event->timezone_select : $timezone_select !!}
                            <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        </div>

                        {{--<input type="hidden" value="1" name="active" id="active" readonly>--}}


                        <div class="form-group locale">
                            <label for="location">@lang('frontend.location')</label>
                            <input class="form-control" size="16" id="location" name="location" type="location", maxlength="255" value="{{$event['location']}}">
                            {{--{!! Form::text('location', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'location']) !!}--}}
                            <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        </div>

                        <div class="fields_map" style="display: none">
                            <div class="map_event_loc" id="map"></div>
                            <div class="form-group fields_loc">
                                <input class="form-control" size="16" id="street" name="Street" type="Street", readonly="readonly", maxlength="255", value="{{$event['Street']}}">
                            </div>

                            <div class="form-group fields_loc">
                                <input class="form-control" size="16" id="city" name="City" type="City", readonly="readonly", maxlength="255", value="{{$event['City']}}">
                            </div>

                            <div class="form-group fields_loc">
                                <input class="form-control" size="16" id="state" name="State" type="State", readonly="readonly", maxlength="255", value="{{$event['State']}}">
                            </div>

                            <div class="form-group fields_loc">
                                <input class="form-control" size="16" id="country" name="Country" type="Country", readonly="readonly", maxlength="255", value="{{$event['Country']}}">
                            </div>
                            <div class="form-group fields_loc">
                                <a id="reset_loc">Reset Address</a>
                            </div>
                        </div>

                        <div class="add_event_section_link">
                            <i class="fa fa-fw fa-gears"></i>
                            <a data-toggle="tooltip" title="Option not available">Advansed Options</a>
                        </div>

                        <div class="form-group" style="text-align: right; margin-right: 3%; margin-top: 9%;">
                            <div class="col-sm-offset-0 col-sm-12" id="btn_group">
                                <button type="button" class="btn" onclick="(function($) { $('#active').val('0'); $('#btn_group .btn-primary').click(); })(jQuery);">
                                    @lang('frontend.save_as_draft')
                                </button>
                                <button class="btn btn-primary text-white test submit">
                                    @lang('frontend.save_and_publish')
                                </button>

                                <div class="checkbox add_event_section_link">
                                    <label><input type="checkbox" checked name="test" id="test" value="1">This is a test event</label>
                                </div>
                            </div>

                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
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
    .myalert{
        width: 70%;
        float: right;
        margin-right: 50px;
    }
</style>
{{-- page level scripts --}}
@section('footer_scripts')
    {{--<script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>--}}
    <script src="{{ asset('assets/vendors/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootbox.js') }}"></script>
    <script>
        //        $(document).on("click", ".submit", function(e) {
        //            event.preventDefault();
        //            bootbox.confirm("Do you want to publish this event?", function(result) {
        //                if (result == true) {
        //                   $('#create_event').submit();
        //                }
        //            });
        //        });


    </script>

    <script type="text/javascript" src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/modal/js/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/switchery/switchery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/switch/js/bootstrap-switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/switchery/switchery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/switch/js/bootstrap-switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/advfeatures.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/js/date.format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var asd = $('#select2-timezone-container').attr('value', '{{$event->timezone}}');
            console.log($('#select2-timezone-container').val());
            {{--if('{{$event}}'!= null){--}}
            $('#start, #finish').mask('9999/99/99 99:99', {placeholder: 'yyyy/mm/dd hh:mm'});
            $('#test').on('change', function() {
                console.log($('#test').prop("checked"));
                if ($('#test').prop("checked")==true) {
//                console.log($('#test').val())
                    $('#test').val("1")
                } else {
//                console.log($('#test').val())
                    $('#test').val("0")
                }
            });
            var nowtimedate = new Date();
            nowtimedate = nowtimedate.format('Y/m/d H:i');
            $("#datestart").datetimepicker({
                onSelect: function() {alert('sdfsdfsdf')},
                format: 'yyyy/mm/dd hh:ii',
                autoclose: true,
                todayBtn: true,
                startDate: nowtimedate,
                minuteStep: 10,
                controlType: 'select',
                minDate: nowtimedate
            });
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

            $('#select2-timezone-container').attr('title', '{{$event->timezone}}');
            $('#select2-timezone-container').text('{{$event->timezone}}');
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
    <script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script type="text/javascript">//<![CDATA[

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
                            console.log(splits);
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
                                console.log(splits);
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
                                    };

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
        //	$("#datestart").on("dp.change", function (e) {
        //		$('#datefinish').data("DateTimePicker").minDate(e.date);
        //	});
        //	// run second calendar after closing of first
        //	$("#datestart").on("dp.hide", function (e) {
        //		$('#datefinish .glyphicon-calendar').click();
        //	});


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