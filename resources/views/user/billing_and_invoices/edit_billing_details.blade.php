@extends('user.layouts.edit-default')
@section('content')
        <div class="cancel-block">
            <div class="row">
                <h3><i class='glyphicon glyphicon-edit'></i>&nbsp; Edit Billing Details</h3>
                <small>Please ensure your BillingDetailsare correct! They will be included on your <a>invoices</a>.</small>
            </div>
            <div class="row">
                <p>
                    If you cancel your subscription, your Account will be <b>downgraded to the Free Plan</b> at the next renewal date.  You can continue to use your subscription until the end of the current subscription period.
                </p>
            </div>
            <div class="row">
                <label for="radio-button" class="col-sm-2 control-label">Type of Account</label>
                <div id="radio-button">
                    <label class="radio-inline"><input type="radio" name="optradio">Individual</label>
                    <label class="radio-inline"><input type="radio" name="optradio">Business</label>
                </div>
            </div>
            <div class="row">
                <label for="companyname" class="col-sm-2 control-label">Company Name</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="companyname" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="vatid" class="col-sm-2 control-label">VAT ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vatid" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="county" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                 <select class="form-control" id="country">
                    <option></option>
                    <option>Country 1</option>
                    <option>Country 2</option>
                    <option>Country 3</option>
                    <option>Country 4</option>
                  </select>
                </div>
            </div>
            <div class="row">
                <label for="industry" class="col-sm-2 control-label">Industry</label>
                <div class="col-sm-10">
                   <select class="form-control" id="country">
                    <option></option>
                    <option>Industry 1</option>
                    <option>Industry 2</option>
                    <option>Industry 3</option>
                    <option>Industry 4</option>
                  </select>
                </div>
            </div>
             <div class="row">
                <label for="billingaddress" class="col-sm-2 control-label">Billing Address</label>
                <div class="col-sm-10">
                   <textarea class="form-control" rows="5" id="billingaddress"></textarea>
                </div>
            </div>
            <div class="row">
                <button type="button" class="btn btn-primary"><i class='glyphicon glyphicon-floppy-save'></i> &nbsp;Update Billing Details</button>
                <button type="button" class="btn btn-default">Cancel</button>
            </div>
            
        </div>
@stop