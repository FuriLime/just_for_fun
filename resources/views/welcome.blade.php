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
<form action="{{url('oauthtwitter')}}" method="POST">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="subject">Subject: </label>
        <input type="text" name="subject" id="subject" class="form-control">
    </div>

    <div class="form-group">
        <label for="sender_name">Sender Name: </label>
        <input type="text" name="sender_name" id="sender_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="sender_email">Sender Email: </label>
        <input type="text" name="sender_email" id="sender_email" class="form-control">
    </div>

    <div class="form-group">
        <label for="recipient_name">Recipiend Name: </label>
        <input type="text" name="recipient_name" id="recipient_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="recipient_email">Recipiend Email: </label>
        <input type="text" name="recipient_email" id="recipient_email" class="form-control">
    </div>


    <div class="form-group">
        <label for="content">Content: </label>
        <input type="textarea" name="content" id="content" cols="30" rows="10" class="form-control">
    </div>

<input type="submit" value="Send" class="btn btn-primary">


        </div>
    </body>
</html>
