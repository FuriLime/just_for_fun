@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit User
    @parent
    @stop

    {{-- page level styles --}}
    @section('header_styles')


    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content">
        <div class="panel-heading clearfix">
            <h1><i class="fa fa-lock"></i> Change Password <a href="#" class="pull-right close-profile" data-toggle="tooltip" data-placement="left" title="Cancel without saving"><i class="fa fa-times-circle-o"></i></a></h1>
            <div class="user-profile-sub-heading">Please update <strong>Your Profile</strong> so we can add the relevant information to you events. You can set the visibility of your details in your <a href="#">Profile Settings</a></div>
        </div>
        <br />
        <div class="panel">
            <!-- errors -->
            <div class="has-error">
                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('group', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('image', '<span class="help-block">:message</span>') !!}
            </div>
            <form class="form-horizontal edit-profile-form" action="" method="POST" enctype="multipart/form-data">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password *</label>
                    <div class="col-sm-10">
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control" value="{!! Input::old('password') !!}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirm" class="col-sm-2 control-label">Confirm Password *</label>
                    <div class="col-sm-10">
                        <input id="password_confirm" name="password_confirm" type="password" placeholder="Confirm Password " class="form-control" value="{!! Input::old('password_confirm') !!}" />
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop