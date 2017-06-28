@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit a event
@parent
@stop


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
        <li class="active">Create New event</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit event
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

                    {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('title', 'Title: ') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('type', 'Type: ') !!}
                        {!! Form::text('type', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('description', 'Description: ') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('location', 'Location: ') !!}
                        {!! Form::text('location', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('url', 'Url: ') !!}
                        {!! Form::text('url', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('timezone', 'Timezone: ') !!}
                        {!! Form::text('timezone', null, ['class' => 'form-control']) !!}
                    </div>

                         {{--<div class="form-group">--}}
                        {{--{!! Form::label('date', 'Date: ') !!}--}}
                        {{--{!! Form::text('date', null, ['class' => 'form-control']) !!}--}}
                    {{--</div><div class="form-group">--}}
                        {{--{!! Form::label('time', 'Time: ') !!}--}}
                        {{--{!! Form::text('time', null, ['class' => 'form-control']) !!}--}}
                    {{--</div>--}}

                         <div class="form-group">
                        {!! Form::label('start', 'Enddate: ') !!}
                        {!! Form::text('enddate', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('endtime', 'Endtime: ') !!}
                        {!! Form::text('endtime', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</section>
@stop