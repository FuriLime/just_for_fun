@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
event
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
        <li class="active">events</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    event {{ $event->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">

                    <tr><td>id</td><td>{{ $event->id }}</td></tr>
                     {{--<tr><td>title</td><td>{{ $event->title }}</td></tr>--}}
					{{--<tr><td>type</td><td>{{ $event->type }}</td></tr>--}}
					{{--<tr><td>description</td><td>{{ $event->description }}</td></tr>--}}
					{{--<tr><td>location</td><td>{{ $event->location }}</td></tr>--}}
					{{--<tr><td>url</td><td>{{ $event->url }}</td></tr>--}}
					{{--<tr><td>timezone</td><td>{{ $event->timezone }}</td></tr>--}}
					{{--<tr><td>date</td><td>{{ $event->start }}</td></tr>--}}
					{{--<tr><td>time</td><td>{{ $event->finish }}</td></tr>--}}

					
                </table>
            </div>
        </div>
    </div>
</div>
@stop