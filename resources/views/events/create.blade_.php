@extends('layouts/default')

{{-- Page title --}}
@section('title')
Create New event
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen" />
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
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
					<div class="form-group">
						<label for="type">@lang('frontend.type')</label>
						<div class="form-control radio-group">
							<input type="radio" value="1" name="type" id="type_1"><label for="type_1">@lang('frontend.online')</label>
							<input type="radio" value="2" name="type" id="type_2"><label for="type_2">@lang('frontend.offline')</label>
							<input type="radio" value="3" name="type" id="type_3"><label for="type_3">@lang('frontend.online_and_offline')</label>
						</div>
                    </div>
					<div class="form-group">
                        <label for="description">@lang('frontend.description')</label>
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>
					<div class="form-group">
						<label for="location">@lang('frontend.location')</label>
                        {!! Form::text('location', null, ['class' => 'form-control']) !!}
                    </div>
					<div class="form-group">
                        <label for="url">@lang('frontend.url')</label>
                        {!! Form::text('url', null, ['class' => 'form-control']) !!}
                    </div>
					<div class="form-group">
                        <label for="timezone">@lang('frontend.timezone')</label>
                        {!! Form::text('timezone', null, ['class' => 'form-control']) !!}
                    </div>
					<div class="form-group">
                        <label for="date">@lang('frontend.date')</label>
						<div class="input-group date form_datetime">
							<input class="form-control" type="text" name="date" readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</span>
						</div>
                    </div>
					<div class="form-group">
                        <label for="time">@lang('frontend.time')</label>
                        {!! Form::text('time', null, ['class' => 'form-control']) !!}
                    </div>
					<div class="form-group">
                        <label for="enddate">@lang('frontend.enddate')</label>
                        {!! Form::text('enddate', null, ['class' => 'form-control']) !!}
                    </div>
					<div class="form-group">
                        <label for="endtime">@lang('frontend.endtime')</label>
                        {!! Form::text('endtime', null, ['class' => 'form-control']) !!}
                    </div>
					
					<input type="hidden" value="1" name="active" id="active">

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
	<!--datetime picker-->
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
	<script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js') }}"  charset="UTF-8"></script>
	<script type="text/javascript">
	$(".form_datetime").datetimepicker({
		//language:  'fr',
		//weekStart: 1,
		//startDate: "2013-02-14 10:00",
		//minuteStep: 10
		//format: "dd MM yyyy - hh:ii",
		format: 'mm/dd/yyyy hh:ii',
		linkFormat: "yyyy-mm-dd-hh-ii-ss",
		startDate: "{{ date('Y-m-d') }}",
		autoclose: true,
		todayBtn: true,
		pickerPosition: "bottom-left"
	});
	</script>
@stop