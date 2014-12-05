
<div class="form-group">
    <label for="username" class="col-sm-3 control-label">{{{ Lang::get('user.username') }}}</label>
    <div class="col-sm-3">
        {{Form::text('username', null ,array('class'=>'form-control','id'=>'username'))}}
    </div>
</div>

@if (Auth::User()->hasRole('Admin'))

<div class="form-group">
    <label for="corporate_id" class="col-sm-3 control-label">{{{ Lang::get('user.company') }}}</label>
    <div class="col-sm-3">
        {{ Form::select('corporate_id', $corporates,NULL,['class'=>'form-control']) }}
    </div>
</div>


<div class="form-group">
    <label for="subscribed" class="col-sm-3 control-label">{{{ Lang::get('user.user_role') }}}</label>
    <div class="col-sm-3">
        <select class="form-control" id="subscribed" name="subscribed">
            <option value="Client" {{{ !$users->hasRole('Admin') ? 'selected':''}}}>Client</option>
            <option value="Admin" {{{ $users->hasRole('Admin') ? 'selected':''}}}>Admin</option>

        </select>
    </div>
</div>


@else
<div class="form-group">
    <label for="company" class="col-sm-3 control-label">{{{ Lang::get('user.company') }}}</label>
    <div class="col-sm-3">
        <label class="control-label">
            {{{ $users->corporate->name or 'Register your company with VitaJaya' }}}
        </label>
    </div>
    <div class="clear"></div>
</div>

@endif
<div class="form-group">
    <label for="name" class="col-sm-3 control-label">{{{ Lang::get('user.name') }}}</label>
    <div class="col-sm-3">
        {{Form::text('name', null ,array('class'=>'form-control','id'=>'name'))}}
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-3 control-label">{{{ Lang::get('user.email') }}}</label>
    <div class="col-sm-3">
        {{Form::text('email', null ,array('class'=>'form-control','id'=>'email'))}}
    </div>
</div>

<div class="form-group">
    <label for="phone_mobile" class="col-sm-3 control-label">{{{ Lang::get('user.mobile_phone') }}}</label>
    <div class="col-sm-3">
        {{Form::text('phone_mobile', null ,array('class'=>'form-control','id'=>'phone_mobile'))}}
    </div>
</div>

<div class="form-group">
    <label for="phone_extension" class="col-sm-3 control-label">{{{ Lang::get('user.land_line') }}}</label>
    <div class="col-sm-3">
        {{Form::text('phone_extension', null ,array('class'=>'form-control','id'=>'phone_extension'))}}
    </div>
</div>

<div class="form-group">
    <label for="lang" class="col-sm-3 control-label">{{{ Lang::get('user.language') }}}</label>
    <div class="col-sm-3">
        {{--third argument is for selected value--}}
        {{ Form::select('lang', $langs,NULL,['class'=>'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label for="subscribed" class="col-sm-3 control-label">{{{ Lang::get('user.subscribed') }}}</label>
    <div class="col-sm-3">
        <select class="form-control" id="subscribed" name="subscribed">
            <option value="1" {{{ $users->subscribed === 1 ? 'selected':''}}}>Yes</option>
            <option value="0" {{{ $users->subscribed === 0 ? 'selected':''}}}>No</option>
        </select>
    </div>
</div>

<h2>{{{ Lang::get('user.change_password') }}}</h2>

@if (!Auth::User()->hasRole('Admin'))
<div class="form-group">
    <label for="old_password" class="col-sm-3 control-label">{{{ Lang::get('user.old_password') }}}</label>
    <div class="col-sm-3">
        {{Form::password('old_password',array('class'=>'form-control','id'=>'old_password'))}}
    </div>
</div>
@endif

<div class="form-group">
    <label for="password" class="col-sm-3 control-label">{{{ Lang::get('user.password') }}}</label>
    <div class="col-sm-3">
        {{Form::password('password',array('class'=>'form-control','id'=>'password'))}}
    </div>
</div>

<div class="form-group">
    <label for="password_confirmation" class="col-sm-3 control-label">{{{ Lang::get('user.password_confirmation') }}}</label>
    <div class="col-sm-3">
        {{Form::password('password_confirmation',array('class'=>'form-control','id'=>'password_confirmation'))}}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        {{Form::submit('Submit', array('class'=>'btn btn-primary btn-lg'))}}
    </div>
</div>