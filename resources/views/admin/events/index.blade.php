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
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Event Title</th>
                                    <th>Location</th>
                                    <th>Event Date</th>
                                    <th>Downloads</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                @if(($event->status!='Draft' && (!Sentinel::check())) || Sentinel::check())
                                    <tr>
                                        <td>
                                            @if ($event->status == 'Publish')
                                                +
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>Airi Satou</td>
                                        <td>Kelly</td>
                                        <td>Satou124</td>
                                        <td></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <table class="table table-bordered " id="table">
                        <thead>
                        <tr class="filters">
                            <th>@lang('frontend.title')</th>
                            <th>@lang('frontend.type')</th>
                            <th>@lang('frontend.location')</th>
                            <th>Event Time Zone</th>
                            <th>@lang('frontend.start')</th>
                            <th>@lang('frontend.finish')</th>
                            <th>@lang('frontend.published')</th>
                            <th>@lang('frontend.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $event)
                            @if(($event->status!='Draft' && (!Sentinel::check())) || Sentinel::check())
                                <tr>
                                    <td>{{ $event->title }}</td>
                                    <td>
                                        @if ($event->type === 1)
                                            Online
                                        @elseif ($event->type === 2)
                                            Offline
                                        @elseif ($event->type === 3)
                                            Online & Offline
                                        @endif
                                    </td>
                                    <td>{{ $event->location }}</td>
                                    <td>{{ $event->timezone }}</td>
                                    <td>{{ $event->startt }}</td>
                                    <td>{{$event->finisht }}</td>
                                    <td>
                                        @if ($event->status == 'Publish')
                                            +
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('events.show', $event->readable_url) }}">
                                            <i class="fa fa-info-circle" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view event"></i>
                                        </a>
                                        <a href="{{ route('events.edit', $event->readable_url) }}">
                                            <i class="fa fa-pencil-square-o" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit event"></i>
                                        </a>
                                        <a href="{{ route('events.clone', $event->readable_url) }}">
                                            <i class="fa fa-clone" data-name="clone" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="clone event"></i>
                                        </a>
                                        <a href="{{ route('events.confirm-delete', $event->uuid) }}" data-toggle="modal" data-target="#delete_confirm">
                                            <i class="fa fa-trash-o" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete event"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
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
<script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
@stop
