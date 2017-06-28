@extends('user.layouts.edit-default')
@section('content')
        <div class="cancel-block">
            <div class="row">
                <h3><i class='glyphicon glyphicon-edit'></i>&nbsp; Edit Billing Details</h3>
                <small>Lorem IpsumDolorsit amet can also have <a>links</a> that link to some other place.</small>
            </div>
            <div class="row">
                <label for="cardnumber" class="col-sm-2 control-label">Card Number</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="companyname" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="securitycode" class="col-sm-2 control-label">Secirity Code</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="securitycode" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="expiration" class="col-sm-2 control-label">Expiration</label>
                <div class="col-sm-2 col-md-2 month-year" >
                  <input type="number" maxlength="2" class="form-control" id="expiration" placeholder="MM">
                </div>
                 <div class="col-sm-2 col-md-2 month-year" >
                  <input type="number" maxlength="4" class="form-control" id="expiration" placeholder="YYYY">
                </div>
            </div>
            <div class="row">
                <label for="zip" class="col-sm-2 control-label">ZIP / PostalCode</label>
                <div class="col-sm-10" >
                  <input type="text" class="form-control" id="zip" placeholder="">
                </div>
            </div>

            <div class="row">
                <button type="button" class="btn btn-primary"><i class='glyphicon glyphicon-floppy-save'></i> &nbsp;Update Card</button>
                <button type="button" class="btn btn-default">Cancel</button>
            </div>
            
        </div>

@stop