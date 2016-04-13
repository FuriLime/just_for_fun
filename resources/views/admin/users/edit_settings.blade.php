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
            <h1><i class="fa fa-edit"></i> Edit Profile Settings <a href="#" class="pull-right close-profile" data-toggle="tooltip" data-placement="left" title="Cancel without saving"><i class="fa fa-times-circle-o"></i></a></h1>
            <div class="row">
                <div class="user-profile-sub-heading col-sm-10">Here you can manage the settings for your Profile. You can update your Profile details under <a href="#">Profile</a></div>
            </div>
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
                    <label class="col-sm-2 col-sm-offset-2 control-label">Timezone</label>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <i class="fa fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Date Format</label>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <i class="fa fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Time Format</label>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <i class="fa fa-info-circle infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Visibility Profile Page</label>
                    <div class="col-sm-6">
                        <label class="radio-inline">
                            <input type="radio"> Unpublished
                        </label>
                        <label class="radio-inline">
                            <input type="radio"> Published
                        </label>
                        <i class="fa fa-info-circle infopoint radio-infopoint" title="" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right" data-original-title="Popover title"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-6">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Profile Settings</button>
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