<div class="form-group">

    <label class="col-sm-3 control-label">{{{ Lang::get('company.company_name') }}}</label>
    <div class="col-sm-3">
    {{Form::text('name', null ,array('class'=>'form-control'))}}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{{ Lang::get('company.phone') }}}</label>
    <div class="col-sm-3">
    {{Form::text('phone', null ,array('class'=>'form-control'))}}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{{ Lang::get('company.email') }}}</label>
    <div class="col-sm-3">
    {{Form::text('email', null ,array('class'=>'form-control'))}}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{{ Lang::get('company.address') }}}</label>
    <div class="col-sm-3">
    {{Form::textarea('address', null ,array('class'=>'form-control'))}}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        {{Form::submit('Submit', array('class'=>'btn btn-primary btn-lg'))}}
    </div>
</div>

</div>
