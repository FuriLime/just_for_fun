@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
events List
@parent
@stop
<link rel="stylesheet" href="{{ asset('assets/css/admin/events.css') }}" />
{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Events</h1>
</section>

<section class="content">
    <div class="panel-heading clearfix">
        <h1 class="pull-left"> <i class="fa fa-columns"></i>
            All Events of MeKai
        </h1>
    </div>
    <br />
    <div class="panel-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab" aria-expanded="true">Event Overview</a>
                </li>
                <li class="">
                    <a href="#tab_2" data-toggle="tab" aria-expanded="false">Channel Details</a>
                </li>
                <li class="">
                    <a href="#tab_3" data-toggle="tab" aria-expanded="false">Team Members</a>
                </li>
                <li class="">
                    <a href="#tab_4" data-toggle="tab" aria-expanded="false">Channel Settings</a>
                </li>
            </ul>

            <div class="tab-content events-tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="table-scrollable events-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Event Title</th>
                                    <th>Location</th>
                                    <th>Event Date</th>
                                    <th>Downloads</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                @if(($event->status!='Draft' && (!Sentinel::check())) || Sentinel::check())
                                    <tr>
                                        <td>
                                            @if ($event->status == 'Publish')
                                                <i class="fa fa-eye" data-toggle="tooltip" data-placement="bottom" title="Status: published"></i>
                                            @else
                                                <i class="fa fa-eye-slash" data-toggle="tooltip" data-placement="bottom" title="Status: draft"></i>
                                            @endif
                                        </td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td class="event-popover" data-container="body" data-toggle="popover" data-placement="bottom" title="{{ $event->startt }}" data-content="Event starts: {{ $event->startt }}<br>Last Update: <br>Event Created: <br><br>Timezone: {{ $event->timezone }}">{{ $event->startt }}</td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default"><i class="fa fa-cog"></i> Actions</button>
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-caret-down"></i>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"><i class="fa fa-share-alt"></i> Share Event</a></li>
                                                    <li><a href="{{ route('events.show', $event->readable_url) }}"><i class="fa fa-desktop"></i> Open EventPage</a></li>
                                                    <li><a href="#"><i class="fa fa-signal"></i> View Statistics</a></li>
                                                    <li><a href="{{ route('events.edit', $event->readable_url) }}"><i class="fa fa-edit"></i> Edit Event</a></li>
                                                    <li><a href="{{ route('events.clone', $event->readable_url) }}"><i class="fa fa-copy"></i> Duplicate Event</a></li>
                                                    <li><a href="#"><i class="fa fa-eye"></i> Publish Event</a></li>
                                                    <li><a href="#"><i class="fa fa-eye-slash"></i> Unpublish Event</a></li>
                                                    <li><a href="{{ route('events.confirm-delete', $event->uuid) }}"><i class="fa fa-trash-o"></i> Delete Event</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <nav>
                            <ul class="pagination pagination-sm">
                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class=""><a href="#">2 <span class="sr-only">(current)</span></a></li>
                                <li class=""><a href="#">3 <span class="sr-only">(current)</span></a></li>
                                <li class=""><a href="#">4 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#" aria-label="Next"><span aria-hidden="true">Next</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Event</a>
                    {{--<table class="table table-bordered " id="table">--}}
                        {{--<thead>--}}
                        {{--<tr class="filters">--}}
                            {{--<th>@lang('frontend.title')</th>--}}
                            {{--<th>@lang('frontend.type')</th>--}}
                            {{--<th>@lang('frontend.location')</th>--}}
                            {{--<th>Event Time Zone</th>--}}
                            {{--<th>@lang('frontend.start')</th>--}}
                            {{--<th>@lang('frontend.finish')</th>--}}
                            {{--<th>@lang('frontend.published')</th>--}}
                            {{--<th>@lang('frontend.actions')</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach ($events as $event)--}}
                            {{--@if(($event->status!='Draft' && (!Sentinel::check())) || Sentinel::check())--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $event->title }}</td>--}}
                                    {{--<td>--}}
                                        {{--@if ($event->type === 1)--}}
                                            {{--Online--}}
                                        {{--@elseif ($event->type === 2)--}}
                                            {{--Offline--}}
                                        {{--@elseif ($event->type === 3)--}}
                                            {{--Online & Offline--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td>{{ $event->location }}</td>--}}
                                    {{--<td>{{ $event->timezone }}</td>--}}
                                    {{--<td>{{ $event->startt }}</td>--}}
                                    {{--<td>{{$event->finisht }}</td>--}}
                                    {{--<td>--}}
                                        {{--@if ($event->status == 'Publish')--}}
                                            {{--+--}}
                                        {{--@else--}}
                                            {{-----}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="{{ route('events.show', $event->readable_url) }}">--}}
                                            {{--<i class="fa fa-info-circle" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view event"></i>--}}
                                        {{--</a>--}}
                                        {{--<a href="{{ route('events.edit', $event->readable_url) }}">--}}
                                            {{--<i class="fa fa-pencil-square-o" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit event"></i>--}}
                                        {{--</a>--}}
                                        {{--<a href="{{ route('events.clone', $event->readable_url) }}">--}}
                                            {{--<i class="fa fa-clone" data-name="clone" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="clone event"></i>--}}
                                        {{--</a>--}}
                                        {{--<a href="{{ route('events.confirm-delete', $event->uuid) }}" data-toggle="modal" data-target="#delete_confirm">--}}
                                            {{--<i class="fa fa-trash-o" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete event"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}

                        {{--</tbody>--}}
                    {{--</table>--}}
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    Channel Details Tab Content
                </div>
                <div class="tab-pane" id="tab_3">
                    Team Members Tab Content
                </div>
                <div class="tab-pane" id="tab_4">
                    Channel Settings Tab Content
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
</section>
@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<script>
    $('.event-popover').popover({
        trigger: "hover",
        html:true
    });
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
</script>
@stop
