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
                    <a href="#tab_1" data-toggle="tab" aria-expanded="true">Tab 1</a>
                </li>
                <li class="">
                    <a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a>
                </li>
                <li class="pull-right">
                    <a href="#" class="text-muted">
                        <i class="fa fa-gear"></i>
                    </a>
                </li>
            </ul>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 120px;"><div class="tab-content" id="slim2" style="overflow: hidden; width: auto; height: 120px;">
                    <div class="tab-pane active" id="tab_1">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    </div>
                    <!-- /.tab-pane -->
                </div><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 1; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 90px; background: rgb(53, 170, 71);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
            <!-- /.tab-content -->
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
