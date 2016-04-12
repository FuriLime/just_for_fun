@extends('layouts/default')

{{-- Page title --}}
@section('title')
    @if (isset($event))
        @lang('frontend.edit_event_header')
    @elseif(isset($event_clone))
        @lang('frontend.clone_event_header')
    @else
        @lang('frontend.add_event_header')
    @endif
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" media="screen"  />
    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen"  />
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css" media="screen"  />
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen"  />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/pages/add_event.css') }}" rel="stylesheet" type="text/css" />
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
                {{--<div class="panel panel-primary ">--}}
                    <!-- <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="plus-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        @if (isset($event))
                            @lang('frontend.edit_event_header')
                        @elseif(isset($event_clone))
                            @lang('frontend.clone_event_header')
                            @else
                    @lang('frontend.add_event_header')
                        @endif

                            </h4>
                        </div> -->
                    {{--<div class="panel-body">--}}
                        @if (isset($event))
                            <h3 class="primary add_event_section_link">@lang('frontend.edit_event_text')</h3>
                        @elseif(isset($event_clone))
                            <h3 class="primary add_event_section_link">@lang('frontend.clone_event_text')</h3>
                        @else
                            <h3 class="primary add_event_section_link">@lang('frontend.add_event_text')</h3>
                        @endif



                        @if (isset($event))
                            {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->uuid], 'id'=>'edit_event']) !!}
                            {!! Honeypot::generate('my_title', 'my_time') !!}
                        @elseif(isset($event_clone))
                            {!! Form::open(['id'=>'clone_event']) !!}
                            {!! Honeypot::generate('my_title', 'my_time') !!}
                        @else
                            {!! Form::open(['url' => 'events', 'id' => 'create_event']) !!}
                            {!! Honeypot::generate('my_title', 'my_time') !!}
                            {{--<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }} " />--}}
                        @endif

                        <div class="form-group">
                            <label for="title">@lang('frontend.title')</label>
                            @if (isset($event_clone))
                                <input class="tinymce_basic form-control" size="16" id="title" name="title" type="text", maxlength="80" value="{{$event_clone['title']}}">
                            @else
                                {!! Form::text('title', null, ['class' => 'tinymce_basic form-control', 'maxlength' => '25', 'id' => 'title']) !!}
                            @endif
                            <i class="fa fa-fw fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="@lang('pop_over.content')" data-original-title="@lang('pop_over.title')"></i>
                            <div class="form-group">
                                @if ($errors->first('title'))
                                    <ul class="alert alert-danger myalert">
                                        <li>{{ $errors->first('title') }}</li>
                                    </ul>
                                @endif
                            </div>


                        </div>

                        <div class="form-group add_event_section_link" id="add_dicription">
                            {{--<i class="fa fa-fw fa-comment"></i>--}}
                            <a class="add_disc_link">Add Description</a>
                        </div>

                        <div class="form-group" id="descprip" style="display: none">
                            <label for="description">@lang('frontend.description')</label>
                            @if (isset($event_clone))
                                <textarea class="textarea form-control" type="textarea" id="description" name="description", maxlength="500" rows="10">{{$event_clone['description']}}</textarea>
                            @else
                                {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'maxlength' => '500', 'id' => 'description']) !!}
                            @endif
                            <i class="fa fa-fw fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                            {{--<button type="button" class="btn btn-warning " title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title">!</button>--}}
                        </div>
                        <div id="hide_dicription" class="add_event_section_link" style="display: none">
                            {{--<i class="fa fa-fw fa-stop"></i>--}}
                            <a class="show_hide" >Hide Description</a>
                        </div>
                        <div class="form-group">
                            <label for="start">@lang('frontend.date')</label>
                            <div class="form-group form_datetime">
                                <div class="input-group date form_datetime3 col-md-12"  id="datestart">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    @if (isset($event_clone))
                                        <input class="form-control" size="16" id="start" name="start" type="datetime" value="{{$event_clone['start']}}">
                                    @else
                                        <input class="form-control" size="16" id="start" name="start" type="datetime" value="{{@isset($event)? $event['start'] : $start_date}}">
                                    @endif
                                </div>
                                @if ($errors->first('start'))
                                    <ul class="alert alert-danger">
                                        <li>{{ $errors->first('start') }}</li>
                                    </ul>
                                @endif
                            </div>
                            <i class="fa fa-fw fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        </div>

                        <div class="form-group" id="end_time_event" style="display:none" >
                            <label for="start">@lang('frontend.enddate')</label>
                            <div class="form-group form_datetime">
                                <div class="input-group date form_datetime3 col-md-12" id="datefinish">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    @if(isset($event_clone))
                                        <input class="form-control" size="16" id="finish" name="finish" type="text" value="{{$event_clone['finish']}}">
                                    @else
                                        <input class="form-control" size="16" id="finish" name="finish" type="text" value="{{@isset($event)? $event['finish'] : $finish_date}}">
                                    @endif
                                </div>
                                @if ($errors->first('finish'))
                                    <ul class="alert alert-danger">
                                        <li>{{ $errors->first('finish') }}</li>
                                    </ul>
                                @endif
                            </div>
                            <i class="fa fa-fw fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        </div>

                        <div class="form-group add_event_section_link" id="change_time_zone">
                            @if (isset($event))
                                <span>Timezone is {{$event['timezone']}}. Duration is {{$event['duration_day']}} {{$event['duration_hour']}} {{$event['duration_min']}}. <a id="time_change">Change here.</a></span>
                            @elseif(isset($event_clone))
                                <span>Timezone is {{$event_clone['timezone']}}. Duration is {{$event_clone['duration_day']}} {{$event_clone['duration_hour']}} {{$event_clone['duration_min']}}. <a id="time_change">Change here.</a></span>
                            @else
                                <span>Timezone is {{$user_timezone}}. Default duration is {{$duration_day}} {{$duration_hour}} {{$duration_min}}. <a id="time_change">Change here.</a></span>
                            @endif

                            {{--                            <span>Timezone is {{@isset($event)? $event['timezone'] : $user_timezone}}. Default duration is {{$event['duration_time']}} h. <a id="time_change">Change here.</a></span>--}}
                        </div>


                        <div class="form-group"  id="time_zone_change" style="display:none">
                            <label for="timezone">@lang('frontend.timezone')</label>
                            @if(isset($event_clone))
                                {!!$event_clone->timezone_select!!}
                            @else
                                {!!@isset($event)?  $event->timezone_select : $timezone_select !!}
                            @endif

                            <i class="fa fa-fw fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        </div>




                        <div class="form-group locale">
                            <label for="location">@lang('frontend.location')</label>
                            @if(isset($event_clone))
                                <input class="form-control" size="16" id="location" name="location" type="location", maxlength="255" value="{{$event_clone['location']}}">
                            @else
                                {!! Form::text('location', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'location']) !!}
                            @endif
                            <i class="fa fa-fw fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                        </div>

                        <div class="fields_map clearfix" style="display: none">
                            <div class="map_event_loc" id="map"></div>
                            <div class="fields_loc_holder">
                                <div class="form-group fields_loc">
                                    @if(isset($event_clone))
                                        <input class="form-control" size="16" id="street" name="Street" type="Street", readonly="readonly", maxlength="255", value="{{$event_clone['Street']}}">
                                    @else
                                        {!! Form::text('Street', null, ['class' => 'form-control country', 'maxlength' => '255', 'id' => 'street','readonly']) !!}
                                    @endif
                                </div>

                                <div class="form-group fields_loc">
                                    @if(isset($event_clone))
                                        <input class="form-control" size="16" id="city" name="City" type="City", readonly="readonly", maxlength="255", value="{{$event_clone['City']}}">
                                    @else
                                        {!! Form::text('City', null, ['class' => 'form-control city', 'maxlength' => '255', 'id' => 'city','readonly']) !!}
                                    @endif
                                </div>

                                <div class="form-group fields_loc">
                                    @if(isset($event_clone))
                                        <input class="form-control" size="16" id="state" name="State" type="State", readonly="readonly", maxlength="255", value="{{$event_clone['State']}}">

                                    @else
                                        {!! Form::text('State', null, ['class' => 'form-control street', 'maxlength' => '255', 'id' => 'state', 'readonly']) !!}
                                    @endif
                                </div>

                                <div class="form-group fields_loc">
                                    @if(isset($event_clone))
                                        <input class="form-control" size="16" id="country" name="Country" type="Country", readonly="readonly", maxlength="255", value="{{$event_clone['Country']}}">
                                    @else
                                        {!! Form::text('Country', null, ['class' => 'form-control state', 'maxlength' => '255', 'id' => 'country','readonly']) !!}
                                    @endif
                                </div>

                                @if(isset($event_clone))
                                    <input style="display:none" size="16" id="lat" name="lat" type="lat", maxlength="255", value="{{$event_clone['lat']}}">
                                @else
                                    {!! Form::text('lat', null, ['style' => 'display:none', 'maxlength' => '255', 'id' => 'lat']) !!}
                                @endif
                                @if(isset($event_clone))
                                    <input style="display:none", size="16" id="lng" name="lng" type="lng", readonly="readonly", maxlength="255", value="{{$event_clone['lng']}}">
                                @else
                                    {!! Form::text('lng', null, ['style' => 'display:none', 'maxlength' => '255', 'id' => 'lng']) !!}
                                @endif
                                <div class="form-group fields_loc">
                                    <a id="reset_loc">Reset Address</a>
                                </div>
                            </div>
                        </div>


                        <input type="hidden" value="" name="active" id="active" readonly>
                        <div class="form-group">

                            <div id="btn_group">
                                <div class="advanced-option-link">
                                    <i class="fa fa-fw fa-gears"></i>
                                    <a data-toggle="tooltip" title="Option not available">Advansed Options</a>
                                </div>
                                @if(Sentinel::check())
                                    <button type="button" name="draft" class="btn draft submit">
                                        @lang('frontend.save_as_draft')
                                    </button>
                                @endif
                                <button class="btn btn-primary text-white test publish submit" name="publish">
                                    <i class="fa fa-bullhorn"></i>
                                    @lang('frontend.save_and_publish')
                                </button>


                                <div class="checkbox add_event_section_link">
                                    <label><input type="checkbox" checked name="test" id="test" @if(!Sentinel::check()) disabled="disabled" @endif value="1">This is a test event</label>
                                </div>
                            </div>

                        </div>

                        {{--<input type="hidden" name="_token" value="{{csrf_token()}}"/>--}}
                        {!! Form::close() !!}
                    {{--</div>--}}

                {{--</div>--}}
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
        $('html').on("click", ".submit", function(e) {
            e.preventDefault();
            if($(this).hasClass('publish')){
                $('#active').val('Publish');
            }
            else{
                $('#active').val('Draft');
            }
            bootbox.confirm("Do you want to publish this event?", function(result) {
                if (result == true) {
                    $('#create_event').submit();
                    $('#edit_event').submit();
                    $('#clone_event').submit();
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

    <script type="text/javascript" src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/js/date.format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.infopoint').popover({
                trigger: "hover",
                placement: wheretoplace()
            });
            $('.form-control').keydown(function (e) {
                if(e.shiftKey==1){
                    if (e.which == 13) {
                        if ($('.form-control').index(this)==1){
                            return true;
                        }
                    }
                } else {
                    if (e.which == 13) {
                        if ($('.form-control').index(this)==1){
                            e.preventDefault();
                            var index = $('.form-control').index(this) + 1;
                            $('.form-control').eq(index).attr("style", "display: block").focus();
                        }
                    }
                }
            });
            $('.form-control').keypress(function (e) {
                if($('.form-control').index(this)==1){
                    return;
                }
                else{
                    if (e.which == 13) {
                        e.preventDefault();
                        var index = $('.form-control').index(this) + 1;
                        $('.form-control').eq(index).attr("style", "display: block").focus();
                        switch($('.form-control').index(this)) {
                            case 0:
                                $('#add_dicription').trigger('click');
                                $('#description').focus();
                                $('#description').attr("style", "display: inline-block");
                                break;
                            case 2:
                                $('#end_time_event').attr("style", "display: block");
                                $('#finish').focus();
                                break;
                            case 3:
                                $('#time_zone_change').attr("style", "display: block");
                                $('#time_change').trigger('click');
                                $('.select2-selection').focus();
                                $('.select2-selection').trigger('click');
                                break;
                            case 5:
                                $("#location").trigger('change');

                                break;
                        }

                    }
                }
            });


            @if (isset($event))
            $('#select2-timezone-container').attr('title', '{{$event->timezone}}');
            $('#select2-timezone-container').text('{{$event->timezone}}');
            var asd = $('#select2-timezone-container').attr('value', '{{$event->timezone}}');
            $('#timezone option[value="{{$event->timezone}}"]').attr('selected','selected');
            $('#active option[value="{{$event->active}}"]').attr('selected','selected');
            @endif

             @if(isset($event_clone))
            $('#select2-timezone-container').attr('title', '{{$event_clone->timezone}}');
            $('#select2-timezone-container').text('{{$event_clone->timezone}}');
            var asd = $('#select2-timezone-container').attr('value', '{{$event_clone->timezone}}');
            $('#timezone option[value="{{$event_clone->timezone}}"]').attr('selected','selected');
            $('#active option[value="{{$event_clone->active}}"]').attr('selected','selected');
            @endif
            @if(isset($event_clone))
            if($("#description").text().length != 0 ){
                $('#descprip').attr('style', 'display:block');
                $('#add_dicription').attr('style', 'display:none');
                $('#hide_dicription').attr('style', 'display:block');
            }
            @endif
             $('#start, #finish').mask('9999/99/99 99:99', {placeholder: 'yyyy/mm/dd hh:mm'});
            $('#test').on('change', function() {
                console.log($('#test').prop("checked"));
                if ($('#test').prop("checked")==true) {
                    $('#test').val("1")
                } else {
                    $('#test').val("0")
                }
            });
            var nowtimedate = new Date();
            nowtimedate = nowtimedate.format('Y/m/d H:i');
            $("#datestart").datetimepicker({
                format: 'yyyy/mm/dd hh:ii',
                autoclose: true,
                todayBtn: true,
                startDate: nowtimedate,
                minuteStep: 10,
                controlType: 'select',
                minDate: nowtimedate,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
            $("#datefinish").datetimepicker("remove");
            var start_date = new Date($('#start').val());
            var end_date = new Date(start_date);
            end_date.setHours(start_date.getHours() + 1);
            end_date = end_date.format('Y/m/d H:i');

            $("#datefinish").datetimepicker({
                format: 'yyyy/mm/dd hh:ii',
                autoclose: true,
                todayBtn: true,
                controlType: 'select',
                startDate: end_date,
                minDate: end_date,
                minuteStep: 10,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }

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

            var minutes_end = new Date(start_date);;
            minutes_end.setMinutes(start_date.getMinutes() + 10);
            minutes_end = minutes_end.format('Y/m/d H:i');
            $('#finish').val(end_date);
            console.log($('#finish').val());
            if($('#finish').val()=='NaN/NaN/NaN NaN:NaN'){
                $('#finish').val('');
            }
            $("#datefinish").datetimepicker("remove");
            $("#datefinish").datetimepicker({
                format: 'yyyy/mm/dd hh:ii',
                autoclose: true,
                todayBtn: true,
                controlType: 'select',
                startDate: minutes_end,
                minDate: minutes_end,
                minuteStep: 10,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }

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

        function wheretoplace(){
            var width = window.innerWidth;
            if (width <= 900) {
                return 'left';
            } else {
                return 'right';
            }
        }

        $("#add_dicription").click(function () {
            $('#descprip').attr('style', 'display:block');
            $('#add_dicription').attr('style', 'display:none');
            $('#hide_dicription').attr('style', 'display:inline-block');
        });

        $("#hide_dicription").click(function () {
            $('#descprip').attr('style', 'display:none');
            $('#add_dicription').attr('style', 'display:inline-block');
            $('#hide_dicription').attr('style', 'display:none');
        });

        $("#add_dicription").on('mouseenter', function () {
            $('#descprip').attr('style', 'display:block');
            $('#add_dicription').attr('style', 'display:none');
            $('#hide_dicription').attr('style', 'display:inline-block');
        });

        $("#hide_dicription").on('mouseenter', function () {
            $('#descprip').attr('style', 'display:none');
            $('#add_dicription').attr('style', 'display:inline-block');
            $('#hide_dicription').attr('style', 'display:none');
        });

        $('#time_change').click(function(){
            $('#time_zone_change').attr('style', 'display:block');
            $('#end_time_event').attr('style', 'display:block');
            $('#change_time_zone').attr('style', 'display:none');
        });
        $('#time_change').on('mouseenter',function(){
            $('#time_zone_change').attr('style', 'display:block');
            $('#end_time_event').attr('style', 'display:block');
            $('#change_time_zone').attr('style', 'display:none');
        });

        window.onload=function(){
            var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'), {
            });
        }//]]>
        $('#reset_loc').click(function(){
            $('.locale').attr('style', 'display:block');
            $('#location').val('');
            $('#street').attr('value', '');
            $('#street').attr('style', 'display: inline-block');
            $('#state').attr('value', '');
            $('#state').attr('style', 'display: inline-block');
            $('#city').attr('value', '');
            $('#city').attr('style', 'display: inline-block');
            $('#country').attr('value', '');
            $('#country').attr('style', 'display: inline-block');
            $('.fields_map').attr('style', 'display:none');
        });


        // Get timezone of the place
        // 3 steps: get entered place, find it`s location (coordinates), find its timezone
        $('#location').change(function () {
            $('.publish').focus();
            $('.draft').focus();
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

                        var place_id = place["place_id"];
                        location_lat = place["geometry"]["location"].lat();
                        location_lng = place["geometry"]["location"].lng();
                        $('#lat').val(location_lat);
                        $('#lng').val(location_lng);
                        var geocoder = new google.maps.Geocoder();
                        var address = document.getElementById('location').value;
                        geocoder.geocode({'address': address}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    var address_components = results[0].address_components;
                                    var components={};
                                    jQuery.each(address_components, function(k,v1) {
                                        jQuery.each(v1.types, function(k2, v2){
                                            components[v2]=v1.long_name
                                        });
                                    })
                                    console.log(components.street_number);
                                    console.log(components.route);
                                    console.log(components.locality);
                                    console.log(components.administrative_area_level_1);
                                    console.log(components.country);
                                    if(components.street_number != undefined && components.route!= undefined
                                            && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('value', components.route + ' ' + components.street_number);
                                        $('#city').attr('value', components.locality);
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);
                                    }else if(components.street_number == undefined && components.route!= undefined
                                            && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('value', components.route);
                                        $('#city').attr('value', components.locality);
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);

                                    }else if(components.street_number == undefined && components.route!= undefined
                                            && components.locality!=undefined && components.administrative_area_level_1 ==undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('value', components.route);
                                        $('#city').attr('value', components.locality);
                                        $('#state').attr('style', 'display:none');
                                        $('#country').attr('value', components.country);

                                    }
                                    else if(components.street_number == undefined && components.route == undefined
                                            && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('style', 'display:none');
                                        $('#city').attr('value', components.locality);
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);
                                    }
                                    else if(components.street_number == undefined && components.route== undefined
                                            && components.locality==undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('style', 'display:none');
                                        $('#city').attr('style', 'display:none');
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);
                                    }
                                    else if(components.street_number == undefined && components.route== undefined
                                            && components.locality==undefined && components.administrative_area_level_1 ==undefined
                                            && components.country!=undefined ){
                                        $('#street').attr('style', 'display:none');
                                        $('#city').attr('style', 'display:none');
                                        $('#state').attr('style', 'display:none');
                                        $('#country').attr('value', components.country);
                                    }
                                    else if(components.street_number == undefined && components.route!= undefined
                                            && components.locality==undefined && components.administrative_area_level_1 !=undefined
                                            && components.country!=undefined ) {
                                        $('#street').attr('value', components.route);
                                        $('#city').attr('style', 'display:none');
                                        $('#state').attr('value', components.administrative_area_level_1);
                                        $('#country').attr('value', components.country);
                                    }
                                }
                                else{

                                    console.log('sdsdsdsd');
                                }
                            }
                        });


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
                            var place_id = place["place_id"];
                            location_lat = place["geometry"]["location"].lat();
                            location_lng = place["geometry"]["location"].lng();
                            $('#lat').val(location_lat);
                            $('#lng').val(location_lng);
                            var geocoder = new google.maps.Geocoder();
                            var address = document.getElementById('location').value;
                            geocoder.geocode({'address': address}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                        var address_components = results[0].address_components;
                                        var components={};
                                        jQuery.each(address_components, function(k,v1) {
                                            jQuery.each(v1.types, function(k2, v2){
                                                components[v2]=v1.long_name
                                            });
                                        })
                                        console.log(components.route);
                                        console.log(components.street_number);
                                        console.log(components.locality);
                                        console.log(components.administrative_area_level_1);
                                        console.log(components.country);
                                        if(components.street_number != undefined && components.route!= undefined
                                                && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ){
                                            $('#street').attr('value', components.route + ' ' + components.street_number);
                                            $('#city').attr('value', components.locality);
                                            $('#state').attr('value', components.administrative_area_level_1);
                                            $('#country').attr('value', components.country);
                                        }else if(components.street_number == undefined && components.route!= undefined
                                                && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ){
                                            $('#street').attr('value', components.route);
                                            $('#city').attr('value', components.locality);
                                            $('#state').attr('value', components.administrative_area_level_1);
                                            $('#country').attr('value', components.country);

                                        }else if(components.street_number == undefined && components.route == undefined
                                                && components.locality!=undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ){
                                            $('#city').attr('value', components.locality);
                                            $('#state').attr('value', components.administrative_area_level_1);
                                            $('#country').attr('value', components.country);
                                        }
                                        else if(components.street_number == undefined && components.route== undefined
                                                && components.locality==undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ){
                                            $('#street').attr('style', 'display:none');
                                            $('#city').attr('style', 'display:none');
                                            $('#state').attr('value', components.administrative_area_level_1);
                                            $('#country').attr('value', components.country);
                                        }
                                        else if(components.street_number == undefined && components.route== undefined
                                                && components.locality==undefined && components.administrative_area_level_1 ==undefined
                                                && components.country!=undefined ) {
                                            $('#street').attr('style', 'display:none');
                                            $('#city').attr('style', 'display:none');
                                            $('#state').attr('style', 'display:none');
                                            $('#country').attr('value', components.country);
                                        }
                                        else if(components.street_number == undefined && components.route!= undefined
                                                && components.locality==undefined && components.administrative_area_level_1 !=undefined
                                                && components.country!=undefined ) {
                                            $('#street').attr('value', components.route);
                                            $('#city').attr('style', 'display:none');
                                            $('#state').attr('value', components.state);
                                            $('#country').attr('value', components.country);
                                        }
                                        else{
                                            alert('nothing');
                                        }
                                    }
                                    else{
                                        alert('sdsdsdsd');
                                    }
                                }else{
                                    alert('sdsdsdsd');
                                }
                            });

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
                        else {
                            alert();
                        }
                    }

                    initialize2();
                }, 200);
            }
        });
    </script>
    <script type="text/javascript">
        $('#timezone').select2();

        $("#datestart").on("dp.change", function (e) {
            $('#datefinish').data("DateTimePicker").minDate(e.date);
        });

        $('input#title').maxlength({
            //alwaysShow: true,
            threshold: 25,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            {{--preText: '@lang('frontend.you_typed') ',--}}
            separator: '/',
            {{--postText: ' @lang('frontend.chars')',--}}
            validate: true,
            placement: "bottom-right-inside"
        });
        $('textarea#description').maxlength({
            threshold: 500,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            {{--preText: '@lang('frontend.you_typed') ',--}}
            separator: '/',
            {{--postText: ' @lang('frontend.chars')',--}}
            validate: true,
            placement: "bottom-right-inside"
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