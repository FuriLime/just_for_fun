@extends('admin/layouts/without_menu')

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
<div class="admin-edit-profile-holder">
    <div class="panel-heading col-sm-10 col-sm-offset-2 clearfix">
        <h1><i class="fa fa-edit"></i> Edit Profile <a href="#" class="pull-right close-profile" data-toggle="tooltip" data-placement="left" title="Cancel without saving"><i class="fa fa-times-circle-o"></i></a></h1>
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
            <div class="form-group">
                <label class="col-sm-2 control-label">Profile Image</label>
                <div class="col-sm-8">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                            @if($user_profile->image)
                                <img src="{!!$user_profile->image !!}" alt="profile image">
                            @else
                                <img src="http://placehold.it/200x200" alt="profile image">
                            @endif
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                        <div class="uploader-holder">
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input id="image" name="image" type="file" class="form-control" />
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            <p class="help-block">Allowed file formats: .jpg, .png, .gif, .bmp</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control">
                    <i class="fa fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-8">
                    <input type="text" name="first_name" class="form-control required" value="{!! Input::old('first_name', $user->first_name) !!}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control required" value="{!! Input::old('last_name', $user->last_name) !!}" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email Address</label>
                <div class="col-sm-8">
                    <input type="text" name="email" class="form-control required email" value="{!! Input::old('email', $user->email) !!}">
                    <i class="fa fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">About you</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="bio">{!! Input::old('bio', $user_profile->bio) !!}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Country</label>
                <div class="col-sm-8">
                    {!! Form::select('country', $countries,Input::old('country',$user_profile->country),array('class' => 'form-control')) !!}
                    <i class="fa fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
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
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male" @if($user->gender === 'male') selected="selected" @endif > Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female" @if($user->gender === 'female') selected="selected" @endif > Female
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="other"> Other
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Date of Birth</label>
                <div class="col-sm-8">
                    <input type="text" name="dob" class="form-control date-of-birth" data-mask="9999-99-99" value="{!! Input::old('dob', $user_profile->dob) !!}" placeholder="yyyy-mm-dd">
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Profile</button>
                    <button class="btn btn-default">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
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
        $('.infopoint').popover({
            trigger: "hover",
            placement: wheretoplace()
        });
        function wheretoplace(){
            var width = window.innerWidth;
            if (width <= 900) {
                return 'left';
            } else {
                return 'right';
            }
        }
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
@stop