@extends('email.envelop')

@section('title')
{{ Lang::get('email.title') }}
@stop

@section ('contentEmail')
<td style="margin:0;padding:0">
    <h4 style="font-family:HelveticaNeue-Light,'Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;line-height:1.1;color:rgb(0,0,0);font-weight:500;font-size:23px;margin:0px 0px 20px;padding:0px">
        {{ Lang::get('confide::confide.email.account_confirmation.subject') }}
    </h4>

    <div style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">
        {{ Lang::get('confide::confide.email.account_confirmation.greetings', array('name' => $user['username'])) }}
    </div>

    <div style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">
        {{ Lang::get('confide::confide.email.account_confirmation.body') }}
    </div>
    <div style="text-align:center;margin:20px;padding:0" align="center">
        <a href="{{{ URL::to("users/confirm/{$user['confirmation_code']}") }}}"
           style="color:#fff;text-decoration:none;display:inline-block;vertical-align:middle;line-height:20px;font-size:14px;font-weight:600;text-align:center;white-space:nowrap;background-color:#25aae1;margin:0;padding:11px 19px;border:1px solid #248dc3"
           target="_blank">
            {{{ URL::to("users/confirm/{$user['confirmation_code']}") }}}
        </a>
    </div>
    <div style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">
        {{ Lang::get('confide::confide.email.account_confirmation.farewell') }}
    </div>
    <div
        style="font-weight:normal;font-size:14px;line-height:1.6;border-top-style:solid;border-top-color:#d0d0d0;border-top-width:3px;margin:40px 0 0;padding:10px 0 0">
        <small style="color:#999;margin:0;padding:0"> {{ Lang::get('email.automatic') }}
        </small>
    </div>
</td>
@stop