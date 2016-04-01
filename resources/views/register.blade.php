<!DOCTYPE html>
<!-- saved from url=(0034)http://event.test-y-sbm.com/signup -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <!-- global level css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of page level css -->

</head>

<body>
<div class="login-top-bar clearfix">
    <a href="/" class="login-logo-holder pull-left"><img src="/assets/images/logo.png"></a>
    <a href="/" class="login-sign-up-btn pull-right">Sign Up</a>
</div>
<div class="container">

    <div class="row vertical-offset-100">
        @include('notifications')
        <div class="sign-up-form col-md-6 col-md-offset-3">
            <h1>Thanks for coming on board.</h1>
            <div class="panel panel-default">
                <div class="panel-heading">Invitation from Matt Stauffer</div>
                <div class="panel-body panel-body-success">
                    We found your invitation <strong>to the Acme, Inc.</strong> team
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Invitations</div>
                <div class="panel-body">
                    You have an invitation from <strong>Chris Doe</strong> to join EventFellows please register you account
                    below so we can activate the referral bonuses for both of you.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Your Plan</div>
                <div class="panel-body">
                    You have selected the <strong>Lite</strong> ($0/monthly) plan
                    <button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Change Plan</button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Basics</div>
                <div class="panel-body">
                    <form action="{{ route('signup') }}" autocomplete="off" class="form-horizontal" method="post" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label for="email" class="col-sm-4 control-label">E-Mail Address</label>
                            <div class="col-sm-6">
                                <input type="email" name="email" required class="form-control"  autocomplete="off" id="email-address">
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                {!! $errors->first('my_name', '<span class="help-block">:message</span>') !!}
                            </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                <label for="password" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="password" name="password" autocomplete="off" required type="password">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I Accept The <a href="#">Terms Of Service</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {!! Honeypot::generate('my_name', 'my_time') !!}
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <a href="{{ URL::to('facebook') }}" class="btn btn-block btn-social btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                    Sign in with Facebook
                                </a>
                                <a href="{{ URL::to('twitter') }}" class="btn btn-block btn-social btn-twitter">
                                <i class="fa fa-twitter"></i>
                                  Sign in with Twitter
                                </a>
                                <a href="{{ URL::to('google') }}" class="btn btn-block btn-social btn-google-plus">
                                    <i class="fa fa-google-plus"></i>
                                    Sign in with Google
                                </a>
                                <a href="{{ URL::to('linked') }}" class="btn btn-block btn-social btn-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                    Sign in with LinkedIn
                                </a>
                                <a href="{{ URL::to('oauthwindows') }}" class="btn btn-block btn-social btn-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                    Sign in with Microsoft
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-success btn-primary">
                                    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Register</button>
                            </div>
                        </div>
                    </form>
                </div>
</div>
            <div class="panel panel-default">
                <div class="panel-heading">Billing Information</div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="first-name" class="col-sm-4 control-label">Card Number</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="first-name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Security Code</label>
                            <div class="col-sm-6">
                                <input class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-12 control-label">Expiration</label>
                            <div class="col-sm-3 col-xs-6">
                                <input class="form-control" placeholder="MM">
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <input class="form-control" placeholder="YYYY">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">ZIP / Postal Code</label>
                            <div class="col-sm-6">
                                <input class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I Accept The <a href="#">Terms Of Service</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Begin 7 Day Trial</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!--livicons-->
<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
<script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/josh_frontend.js') }}"></script>
<!-- end of global js -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $( ".cancel-saving" ).on( "click", function() {
        window.location.href = '/';
    });
</script>
</body>
</html>