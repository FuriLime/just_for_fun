<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <!-- <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'> -->

        <link rel="stylesheet" href="/css/bootstrap,min.css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

            .quote {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action=" {{ action('twitterController@oauthtwitter') }}" method="" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="twitnick" value="{{ $twitnick }}" />
                    {{--<input type="hidden" name="oauth_verifier" value="{{ $oauthv }}" />--}}
                    <div class="form-group">
                    <label for="subject">Enter your email </label>
                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                    <input type="email" name="email" id="email" class="form-control">
                    <input type="submit" value="Send" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
