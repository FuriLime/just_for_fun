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
    <section class="content">
        <div class="panel-heading clearfix">
            <h1> <i class="fa fa-user"></i>
                My Personal Profile
            </h1>
            <div class="user-profile-sub-heading">Lorem <strong>Ipsum Dolor</strong> sit amet can also have <a href="#">links</a> that link some other place</div>
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
                    <div class="tab-content mar-top">
                        <div id="tab1" class="tab-pane fade active in">
                            <div class="table-responsive">
                                <table class="table table-hover" id="users">
                                        <tr>
                                            <td>Profile Image</td>
                                            <td>
                                                <div class="user-image-holder">
                                                    @if($user->pic)
                                                        <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" class="img-circle img-bor"/>
                                                    @else
                                                        <img src="{!! asset('assets/img/authors/avatar3.jpg') !!}" class="img-responsive img-circle" alt="User Image">
                                                    @endif
                                                </div>
                                                <div class="username-holder"><span data-toggle="tooltip" data-placement="right" title="Your EventFellows Name">MeKai</span></div>
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
                                        <td>EventFellows URL</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Type Account</td>
                                        <td></td>
                                    </tr>

                                </table>
                            </div>
                            <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
                            <a href="#" class="btn btn-default">Change Password</a>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td>Timezone</td>
                                        <td><i class="fa fa-globe"></i> Europe / Berlin (+02:00)</td>
                                    </tr>
                                    <tr>
                                        <td>Date Format</td>
                                        <td><i class="fa fa-calendar"></i> dd-mm-yyyy (e.g. 12-15-2015)</td>
                                    </tr>
                                    <tr>
                                        <td>Time Format</td>
                                        <td><i class="fa fa-clock-o"></i> HH:MM (e.g 17:15)</td>
                                    </tr>
                                    <tr>
                                        <td>Visibility Profile Page</td>
                                        <td><i class="fa fa-check"></i> published <a href="#" class="btn btn-default pull-right"><i class="fa fa-desktop"></i> View Profile Page</a></td>
                                    </tr>
                                </table>
                                <a href="" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Profile Settings</a>
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