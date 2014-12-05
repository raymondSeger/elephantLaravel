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
                <ul class="message-container">
                    @foreach($messages AS $message)
                    @if ($message->admin)
                    <li class="row">
                        <div class="message-right col-md-6 col-md-offset-4">
                           {{{$message->message}}}
                        </div>
                        <div class="col-md-2 col-sm-12 ">
                        <p class="message-info">
                            <strong>Administrator</strong><br />
                            <span>{{{$message->created_at}}}</span></p>
                        </div>
                        <div class="clear"></div>
                    </li>
                    <div class="clear"></div>
                    @else
                    <li class="row">
                        <div class="col-md-2 col-sm-12">
                        <p class="message-info">
                            <strong>{{{$message->user->username}}}</strong><br />
                            <span>{{{$message->created_at}}}</span></p>
                        </div>
                        <div class="message-left col-md-6 col-sm-12">
                           {{{$message->message}}}
                        </div>
                        <div class="clear"></div>
                    </li>
                    @endif
                
                    @endforeach
                </ul>
                <div class="clear"></div>

                @include('backend.message.partials._create')
            </div>

        </div>
    </div>
</div>
@stop