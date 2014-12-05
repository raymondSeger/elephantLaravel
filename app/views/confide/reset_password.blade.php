@extends('layout.master')

@section('title')
{{{ Lang::get('static.homeTitle') }}}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

        <h1 class="text-center">Reset your password</h1>
        <div class="col-sm-4"></div>

        <div class="center-block col-sm-4">

            <form method="POST" action="{{{ URL::to('/users/reset_password') }}}" accept-charset="UTF-8">
                <input type="hidden" name="token" value="{{{ $token }}}">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                <div class="form-group">
                    <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>

        </div>
    </div>
</div>
@stop