@extends('layout.master')

@section('navbarItems')
@include('backend.navbar')
@stop

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2>{{{ Lang::get('messages.all_messages') }}}</h2>
            <br />
            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <th>{{{ Lang::get('messages.date') }}}</th>
                        <th>{{{ Lang::get('messages.username') }}}</th>
                        <th>{{{ Lang::get('messages.count_message') }}}</th>
                        <th>{{{ Lang::get('messages.unread_admin') }}}</th>
                        <th>{{{ Lang::get('messages.action') }}}</th>
                    </thead>

                    @foreach($messages AS $message)
                    <tr>
                        <td>    {{{$message->updated_at}}}      </td>
                        <td>    {{{$message->username}}}           </td>
                        <td>    {{{$message->count_msg}}}      </td>
                        <td>    {{{$message->unread_admin}}}      </td>
                        <td>
                            {{link_to_action('MessageController@show','Detail',[Hashids::encode($message->user_id)],array('class'=>'btn btn-success'))}}

                        </td>

                    </tr>
                    @endforeach

                </table>

            </div>

        </div>
    </div>
</div>
@stop