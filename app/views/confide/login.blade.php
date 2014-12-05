@extends('layout.master')

@section('title')
{{{ Lang::get('static.homeTitle') }}}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

        <h1 class="text-center">{{{ Lang::get('confide::confide.login.title') }}}</h1>

        <div class="col-sm-4"></div>

        <div class="center-block col-sm-4">

            <form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                <fieldset>
                    <div class="form-group">
                        <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
                        <input class="form-control" tabindex="1"
                               placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email"
                               id="email" value="{{{ Input::old('email') }}}">
                    </div>
                    <div class="form-group">
                        <label for="password">
                            {{{ Lang::get('confide::confide.password') }}}
                            <small>
                                <a href="{{{ URL::to('/users/forgot_password') }}}">{{{
                                    Lang::get('confide::confide.login.forgot_password') }}}</a>
                            </small>
                        </label>
                        <input class="form-control" tabindex="2"
                               placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password"
                               id="password">
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="remember" value="0">
                        <input type="checkbox" name="remember" id="remember" value="1">
                        {{{ Lang::get('confide::confide.login.remember') }}}

                    </div>

                    <div class="form-group">
                        <button tabindex="3" type="submit" class="btn btn-default">{{{
                            Lang::get('confide::confide.login.submit') }}}
                        </button>
                    </div>
                </fieldset>
            </form>


        </div>

        <div class="col-sm-4"></div>

        </div>
    </div>
</div>
@stop
