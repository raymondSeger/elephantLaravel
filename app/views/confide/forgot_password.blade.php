@extends('layout.master')

@section('title')
{{{ Lang::get('static.homeTitle') }}}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

        <h1 class="text-center">{{{ Lang::get('confide::confide.forgot.title') }}}</h1>

        <div class="col-sm-4"></div>

        <div class="center-block col-sm-4">

            <form method="POST" action="{{ URL::to('/users/forgot_password') }}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                <div class="form-group">
                    <label for="email">{{{ Lang::get('confide::confide.forgot.title') }}}</label>

                    <div class="input-append input-group">
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text"
                               name="email" id="email" value="{{{ Input::old('email') }}}">
                <span class="input-group-btn">
                    <input class="btn btn-default" type="submit"
                           value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
                </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div>
</div>
@stop