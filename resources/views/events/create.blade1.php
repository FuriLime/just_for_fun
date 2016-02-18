@extends('layouts/default')

{{-- Page title --}}
@section('title')
Create New event
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" media="screen"  />
	{{--
	<link href="{{ asset('assets/vendors/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" media="screen"/>
	--}}
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

                    {!! Form::open(['url' => 'events']) !!}

                    <div class="form-group">
                        <label for="title">@lang('frontend.title')</label>
                        {!! Form::text('title', null, ['class' => 'tinymce_basic form-control', 'maxlength' => '80', 'id' => 'title']) !!}
                    </div>
					<div class="form-group">
						<label for="type">@lang('frontend.type')</label>
						<div class="form-control radio-group">
							<input type="radio" value="1" name="type" id="type_1"><label for="type_1">@lang('frontend.online')</label>
							<input type="radio" value="2" name="type" id="type_2" checked><label for="type_2">@lang('frontend.offline')</label>
							<input type="radio" value="3" name="type" id="type_3"><label for="type_3">@lang('frontend.online_and_offline')</label>
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
                        <label for="url">@lang('frontend.url')</label>
                        {!! Form::text('url', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'url']) !!}
                    </div>
					<div class="form-group">
                        <label for="timezone">@lang('frontend.timezone')</label>
						<select class="form-control timezone" name="timezone" id="timezone">
							<option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
							<option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
							<option value="-10.0">(GMT -10:00) Hawaii</option>
							<option value="-9.0">(GMT -9:00) Alaska</option>
							<option value="-8.0">(GMT -8:00) Pacific Time (US & Canada)</option>
							<option value="-7.0">(GMT -7:00) Mountain Time (US & Canada)</option>
							<option value="-6.0">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
							<option value="-5.0">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
							<option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
							<option value="-3.5">(GMT -3:30) Newfoundland</option>
							<option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
							<option value="-2.0">(GMT -2:00) Mid-Atlantic</option>
							<option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
							<option value="0.0" selected>(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
							<option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
							<option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option>
							<option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
							<option value="3.5">(GMT +3:30) Tehran</option>
							<option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
							<option value="4.5">(GMT +4:30) Kabul</option>
							<option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
							<option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
							<option value="5.75">(GMT +5:45) Kathmandu</option>
							<option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
							<option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
							<option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
							<option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
							<option value="9.5">(GMT +9:30) Adelaide, Darwin</option>
							<option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
							<option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
							<option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
						</select>
                    </div>
					
					<div class="form-group">
						<label for="date">@lang('frontend.event_time_range')</label>
						<div class="input-group form_datetime">
							<input type="text" class="form-control" id="event_range_time" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</span>
						</div>
					</div>

					<div class="form-group event_time">
                        <label for="date">@lang('frontend.date')</label>
						{!! Form::text('date', null, ['class' => 'form-control', 'id' => 'date', 'readonly' => 'readonly']) !!}
                    </div>
					
					<div class="form-group event_time">
                        <label for="time">@lang('frontend.time')</label>
						{!! Form::text('time', null, ['class' => 'form-control', 'id' => 'time', 'readonly' => 'readonly']) !!}
                    </div>
					<div class="form-group event_time">
                        <label for="enddate">@lang('frontend.enddate')</label>
						{!! Form::text('enddate', null, ['class' => 'form-control', 'id' => 'enddate', 'readonly' => 'readonly']) !!}
                    </div>
					<div class="form-group event_time">
                        <label for="endtime">@lang('frontend.endtime')</label>
						{!! Form::text('endtime', null, ['class' => 'form-control', 'id' => 'endtime', 'readonly' => 'readonly']) !!}
                    </div>
					
					<input type="hidden" value="1" name="active" id="active" readonly>
					<input type="hidden" value="1" name="time" id="time_to_save" readonly>
					<input type="hidden" value="1" name="endtime" id="endtime_to_save" readonly>

                    <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-4" id="btn_group">
                            <button type="button" class="btn" onclick="(function($) { $('#active').val('0'); $('#btn_group .btn-primary').click(); })(jQuery);">
                                @lang('frontend.save_as_draft')
                            </button>
                            <button type="submit" class="btn btn-primary text-white">
                                @lang('frontend.save_and_publish')
                            </button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
		<div class="col-md-1"></div>
	</div>
    <!-- row-->
</div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
	<script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
	{{--
	<script src="{{ asset('assets/vendors/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
	--}}
	<script type="text/javascript">
	//Date range picker with time picker
	//http://www.daterangepicker.com/#options
	$('#event_range_time').daterangepicker({
		timePicker: true,
		timePicker24Hour: true,
		timePickerIncrement: 10,
		locale: {
            format: 'MM/DD/YYYY hh:mm'
        }
	});
	
	$('#event_range_time').on('apply.daterangepicker', function(ev, picker) {
		$('#time_to_save').val( picker.startDate.format('YYYY-MM-DD hh:mm:ss') );
		$('#endtime_to_save').val( picker.endDate.format('YYYY-MM-DD hh:mm:ss') );
		
		$('#date').val( picker.startDate.format('DD/MM/YYYY') );
		$('#time').val( picker.startDate.format('hh:mm') );
		$('#enddate').val( picker.endDate.format('DD/MM/YYYY') );
		$('#endtime').val( picker.endDate.format('hh:mm') );
		$('.event_time').slideDown();
	});
	
	$('.event_time input').click(function(){
		$('#event_range_time').click();
	});
	
	$('input#title').maxlength({ 
		threshold: 25, 
		//alwaysShow: true,
		warningClass: "label label-success",
		limitReachedClass: "label label-danger",
		preText: '@lang('frontend.you_typed') ',
		separator: ' @lang('frontend.chars_out_of') ',
		postText: ' @lang('frontend.chars')',
		validate: true
	});
	$('textarea#description').maxlength({ 
		threshold: 100, 
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
	
	{{--
	//bootstrap WYSIHTML5 - text editor
	/*
    $(".textarea").wysihtml5({
		toolbar: {
			'font-styles': true,
			'color': true,
			'emphasis': {
				'small': true
			},
			'blockquote': true,
			'lists': false,
			'html': false,
			'link': true,
			'image': false,
			'smallmodals': false
		} 
	});
	*/
	/*
	tinymce.init({
		selector: ".tinymce_basic",
		plugins: [
			"autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		maxLength : 50,
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link"
	});
	*/
	--}}
});
</script>

	</script>
@stop