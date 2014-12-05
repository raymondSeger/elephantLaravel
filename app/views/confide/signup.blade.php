@extends('layout.master')

@section('title')
{{{ Lang::get('static.homeTitle') }}}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

        <h1 class="text-center">{{{ Lang::get('confide::confide.signup.title') }}}</h1>

        <div class="col-sm-4"></div>

        <div class="center-block col-sm-4">

            <form autocomplete="off" method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                <fieldset>
                    <div class="form-group">
                        <label for="name">{{{ Lang::get('translator.sign_up.name') }}}</label>
                        <input class="form-control" placeholder="{{{ Lang::get('translator.sign_up.name') }}}" type="text" name="name" id="name" value="{{{ Input::old('name') }}}">
                    </div>
                    <div class="form-group">
                        <label for="phone_mobile">{{{ Lang::get('translator.sign_up.phone_mobile') }}}</label>
                        <input class="form-control" placeholder="{{{ Lang::get('translator.sign_up.phone_mobile') }}}" type="text" name="phone_mobile" id="phone_mobile" value="{{{ Input::old('phone_mobile') }}}">
                    </div>
                    <div class="form-group">
                        <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
                    </div>
                    <div class="form-group">
                        <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                    </div>
                    <div class="form-group">
                        <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                    </div>

                    <div class="form-actions form-group">
                        <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
                    </div>

                </fieldset>
            </form>


        </div>

        <div class="col-sm-4"></div>

        </div>
    </div>
</div>
@stop