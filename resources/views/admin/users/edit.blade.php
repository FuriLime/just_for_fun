@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit User
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link rel="stylesheet" href="{{ asset('assets/vendors/wizard/jquery-steps/css/wizard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/wizard/jquery-steps/css/jquery.steps.css') }}">
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/css/admin/edit-profile.css') }}" />

<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
{{--<section class="content-header">--}}
    {{--<h1>Edit user</h1>--}}
    {{--<ol class="breadcrumb">--}}
        {{--<li>--}}
            {{--<a href="{{ route('dashboard') }}">--}}
                {{--<i class="livicon" data-name="home" data-size="14" data-color="#000"></i>--}}
                {{--Dashboard--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>Users</li>--}}
        {{--<li class="active">Add New User</li>--}}
    {{--</ol>--}}
{{--</section>--}}
<section class="content">
    <div class="panel-heading clearfix">
        <h1><i class="fa fa-edit"></i> Edit Profile</h1>
        <div class="user-profile-sub-heading">Please update <strong>Your Profile</strong> so we can add the relevant information to you events. You can set the visibility of your details in your <a href="#">Profile Settings</a></div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Profile Image</label>
                        <div class="col-sm-8">
                            <img src="">
                            <input type="file">
                            <p class="help-block">Allowed file formats: .jpg, .png, .gif, .bmp</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">About you</label>
                        <div class="col-sm-8">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Job Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Date of Birth</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Linkedin URL</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Twitter Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Facebook Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Google+ URL</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cancel</button>
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Editing user : {!! $user->first_name!!} {!! $user->last_name!!}
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">

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

                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">

                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                            <form class="form-wizard form-horizontal" action="" method="POST" id="wizard-validation" enctype="multipart/form-data">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <!-- first tab -->
                                <h1>User Profile</h1>

                                <section>
                                
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-2 control-label">First Name *</label>
                                        <div class="col-sm-10">
                                            <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control required" value="{!! Input::old('first_name', $user->first_name) !!}" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="last_name" class="col-sm-2 control-label">Last Name *</label>
                                        <div class="col-sm-10">
                                            <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control required" value="{!! Input::old('last_name', $user->last_name) !!}" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-Mail" type="text" class="form-control required email" value="{!! Input::old('email', $user->email) !!}" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <p class="text-warning">If you don't want to change password... please leave them empty</p>
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
                                    <p>(*) Mandatory</p>
                                    <a type="button" class="btn" href="{{ route('confirm-delete/user', $user->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                         <button type="button" class="btn">Remove your account</button>
                                    </a>


                                </section>

                                <!-- second tab -->
                                <h1>Bio</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input id="dob" name="dob" type="text" class="form-control" data-mask="9999-99-99" value="{!! Input::old('dob', $user_profile->dob) !!}" placeholder="yyyy-mm-dd" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Profile picture</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                    @if($user_profile->image)
                                                        <img src="{!!$user_profile->image !!}" alt="profile image">
                                                    @else
                                                        <img src="http://placehold.it/200x200" alt="profile image">
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input id="image" name="image" type="file" class="form-control" />
                                                    </span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio" class="col-sm-2 control-label">Bio <small>(brief intro)</small></label>
                                        <div class="col-sm-10">
                                            <textarea name="bio" id="bio" class="form-control" rows="4">{!! Input::old('bio', $user_profile->bio) !!}</textarea>
                                        </div>
                                    </div>

                                </section>

                                <!-- third tab -->
                                <h1>Address</h1>
                                <section>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" title="Select Gender..." name="gender">
                                                <option value="">Select</option>
                                                <option value="male" @if($user->gender === 'male') selected="selected" @endif >MALE</option>
                                                <option value="female" @if($user->gender === 'female') selected="selected" @endif >FEMALE</option>
                                                <option value="other" @if($user->gender === 'other') selected="selected" @endif >OTHER</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('country', $countries,Input::old('country',$user_profile->country),array('class' => 'form-control')) !!}

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="state" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-10">
                                            <input id="state" name="state" type="text" class="form-control" value="{!! Input::old('state', $user_profile->state) !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="city" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-10">
                                            <input id="city" name="city" type="text" class="form-control" value="{!! Input::old('city', $user_profile->city) !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input id="address" name="address" type="text" class="form-control" value="{!! Input::old('address', $user_profile->address) !!}" />
                                        </div>
                                    </div>

                                    {{--<div class="form-group">--}}
                                        {{--<label for="postal" class="col-sm-2 control-label">Postal/zip</label>--}}
                                        {{--<div class="col-sm-10">--}}
                                            {{--<input id="postal" name="postal" type="text" class="form-control" value="{!! Input::old('postal', $user->postal) !!}" />--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="form-group">
                                        <label for="timezone" class="col-sm-2 control-label">@lang('users/title.timezone')</label>
                                        <div class="col-sm-10">
                                            <input id="timezone" name="timezone" type="text" class="form-control" value="{!! Input::old('timezone', $user_profile->timezone) !!}" />
                                        </div>
                                    </div>

                                </section>


                                <!-- fourth tab -->

                                {{--@if(Sentinel::check())--}}
                                    {{--@if(Sentinel::inRole('admin'))--}}
                                <h1>User Group</h1>

                                <section>

                                    <p class="text-danger"><strong>Be careful with group selection, if you give admin access.. they can access admin section</strong></p>
                                    <div class="form-group">
                                        <label for="group" class="col-sm-2 control-label">Group *</label>
                                        <div class="col-sm-10">

                                            @if(Sentinel::check())
                                            {{--@if(Sentinel::inRole('admin'))--}}
                                            <select class="form-control " title="Select group..." name="groups[]" id="groups" required>
                                                @foreach($roles as $role)
                                                    <option value="{!! $role->id !!}" {{ (array_key_exists($role->id, $userRoles) ? ' selected="selected"' : '') }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                                {{--@endif--}}
                                            @endif

                                                {{--@if(Sentinel::check())--}}
                                                    {{--@if(Sentinel::inRole('user'))--}}
                                            {{--<select class="form-control " title="Select group..." name="groups[]" id="groups" required>--}}
                                                {{--<option value="">Select</option>--}}
                                                {{--@foreach($roles as $role)--}}
                                                    {{--<option value="2" {{ (array_key_exists(2, $userRoles) ? ' selected="selected"' : '') }}>user</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                                    {{--@endif--}}
                                                    {{--@endif--}}
                                        </div>
                                    </div>

                                    {{--<div class="form-group">--}}
                                        {{--<label for="activate" class="col-sm-2 control-label"> Activate User</label>--}}
                                        {{--<div class="col-sm-10">--}}
                                            {{--<input id="activate" name="activate" type="checkbox" class="pos-rel p-l-30" value="1" @if($status) checked="checked" @endif  >--}}
                                        {{--</div>--}}
                                        {{--<span>If user is not activated, mail will be sent to user with activation link</span>--}}
                                    {{--</div>--}}


                                </section>
                            {{--@endif--}}
                                    {{--@endif--}}
                            </form>
                            <!-- END FORM WIZARD WITH VALIDATION --> 
                        </div>
                    </div>
                    <!--main content end--> 
                </div>
            </div>
        </div>
    </div>
    <!--row end-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form_wizard.js') }}"></script>
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
@stop