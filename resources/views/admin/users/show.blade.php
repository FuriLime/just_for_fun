@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View User Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css"/>
@stop


{{-- Page content --}}
@section('content')
    {{--<section class="content-header">--}}
        <!--section starts-->

        {{--<h1><i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>My Personal Profile</h1>--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li>--}}
                {{--<a href="{{ route('dashboard') }}">--}}
                    {{--<i class="livicon" data-name="home" data-size="14" data-loop="true"></i>--}}
                    {{--Dashboard--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#">Users</a>--}}
            {{--</li>--}}
            {{--<li class="active">User Profile</li>--}}
        {{--</ol>--}}
    {{--</section>--}}
    <!--section ends-->
    <section class="content">
        <div class="panel-heading clearfix">
            <h1 class="pull-left"> <i class="fa fa-user"></i>
                My Personal Profile
            </h1>
        </div>
        <br />
        <div class="row">
            <div class="col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Profile Overview</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">Profile Settings</a>
                        </li>
                    </ul>
                    <div  class="tab-content mar-top">
                        <div id="tab1" class="tab-pane fade active in">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                User Profile
                                            </h3>

                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped" id="users">
                                                                <tr>
                                                                    <td>Profile Image</td>
                                                                    <td>
                                                                        @if($user->pic)
                                                                            <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" class="img-circle img-bor"/>
                                                                        @else
                                                                            <img src="{!! asset('assets/img/authors/avatar3.jpg') !!}" class="img-responsive img-circle" alt="User Image">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            <tr>
                                                                <td>@lang('users/title.first_name')</td>
                                                                <td>
                                                                    {{ $user->first_name }}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>@lang('users/title.last_name')</td>
                                                                <td>
                                                                    {{ $user->last_name }}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>@lang('users/title.email')</td>
                                                                <td>
                                                                    {{ $user->email }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password</td>
                                                                <td>
                                                                    {{ $user->password }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Type Account</td>
                                                                <td>
                                                                    {{ $user->password }}

                                                                </td>

                                                            </tr>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12 pd-top">
                                    <form action="#" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="inputpassword" class="col-md-3 control-label">
                                                    Password
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                                </span>
                                                        <input type="password"  id="inputpassword" placeholder="Password" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputnumber" class="col-md-3 control-label">
                                                    Confirm Password
                                                    <span class='require'>*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                                </span>
                                                        <input type="password"  id="inputnumber"placeholder="Password" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                &nbsp;
                                                <button type="button" class="btn btn-danger">Cancel</button>
                                                &nbsp;
                                                <input type="reset" class="btn btn-default hidden-xs" value="Reset"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
@stop