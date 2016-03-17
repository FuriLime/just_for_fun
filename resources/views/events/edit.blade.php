<div class="form-group">
    <label for="title">@lang('frontend.title')</label>
    {!! Form::text('title', null, ['class' => 'tinymce_basic form-control', 'maxlength' => '25', 'id' => 'title']) !!}
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

    {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'maxlength' => '500', 'id' => 'description']) !!}
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
    {!! Form::text('location', null, ['class' => 'form-control', 'maxlength' => '255', 'id' => 'location']) !!}
    <i class="fa fa-fw fa-info-circle" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
</div>

<div class="fields_map" style="display: none">
    <div class="map_event_loc" id="map"></div>
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