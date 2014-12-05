@extends('layout.master')

@section('title')
{{{ Lang::get('static.homeTitle') }}}
@stop

@section('navbarItems')
<li><a href="/">{{ Lang::get('static.Back') }}</a></li>
<!-- Include the login / action buttons as per user role-->
@include('layout.content.navbarUserAction')
@stop


@section('content')
<section id="content">

    <div class="row">
        <div class="col-sm-12">
            <img class="center-block img-responsive" src="{{ asset('asset/img/404.jpg') }}" alt=""/>
        </div>
        <div class="col-sm-12">
            <div class="text-center">
                <h1>404 Error<br>
                    <a href="/"><small>{{ Lang::get('static.Back') }}</small></a>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- END of content section -->
@stop

@section('sectionBottom')
@include('layout.content.contactBottom', array('displayForm'=>false))
@stop