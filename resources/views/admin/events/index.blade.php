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
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>events</li>
        <li class="active">events</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Events List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">

                    <thead>
                        <tr class="filters">
                            <th>Status</th>
                            <th>Event Title</th>
								{{--<th>Type</th>--}}
								{{--<th>Description</th>--}}
								<th>Location</th>
                                <th>Event Date</th>
                                <th>Downloads</th>
								{{--<th>Url</th>--}}
								{{--<th>Timezone</th>--}}
								{{--<th>Event Date</th>--}}
								{{--<th>Time</th>--}}
								{{--<th>Enddate</th>--}}
								{{--<th>Endtime</th>--}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            {{--{{dd($event->start)}}--}}
                            <td>{{{ $event->id }}}</td>
                            <td>{{{ $event->title }}}</td>
{{--								<td>{{{ $event->type }}}</td>--}}
                                <td>{{{ $event->location }}}</td>
								{{--<td>{{{ $event->description }}}</td>--}}

								{{--<td>{{{ $event->url }}}</td>--}}
{{--								<td>{{{ $event->timezone }}}</td>--}}
								<td>{{ $event->start }}</td>
								<td>{{ $event->finish }}</td>
								{{--<td>{{{ $event->enddate }}}</td>--}}
								{{--<td>{{{ $event->endtime }}}</td>--}}
                            <td>
                                <a href="{{ route('admin.events.show', $event->id) }}">
                                    <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view event"></i>
                                </a>
                                <a href="{{ route('admin.events.edit', $event->id) }}">
                                    <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit event"></i>
                                </a>
                                <a href="{{ route('admin.events.confirm-delete', $event->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                    <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete event"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
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
