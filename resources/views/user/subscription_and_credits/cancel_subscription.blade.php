@extends('user.layouts.edit-default')
@section('content')
        <div class="cancel-block">
            <div class="row">
           <h3><i class='glyphicon glyphicon-ban-circle'></i>&nbsp; Cancel Subscription</h3>
            
            </div>
            <div class="row">
                <p>
                    If you cancel your subscription, your Account will be <b>downgraded to the Free Plan</b> at the next renewal date.  You can continue to use your subscription until the end of the current subscription period.
                </p>
            </div>
            <div class="row">
                <button type="button" class="btn btn-danger"><i class='glyphicon glyphicon-ban-circle'></i> &nbsp;Cancel Subscription</button>
                <button type="button" class="btn btn-default">Stop Cancellation</button>
            </div>
            <div class="row">
                <small>In order to protect you from unwanted  cancelations you need to confirm your cancelation request. We will sent you an email that contains a confirmation link.</small>
            </div>
        </div>
@stop