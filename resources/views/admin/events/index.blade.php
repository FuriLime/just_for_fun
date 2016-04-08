@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
events List
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Events</h1>
</section>
    <div class="container">
        <div class="panel-heading clearfix">
            <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                Events List
            </h4>
        </div>
        <br />
        <div class="panel-body">
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
    </div>
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
