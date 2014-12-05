@extends('layout.master')

@section('title')
{{{ Lang::get('static.WebHostingTitle') }}}
@stop

@section('navbarItems')
<li><a href="/">{{ Lang::get('static.Back') }}</a></li>
<!-- Include the login / action buttons as per user role-->
@include('layout.content.navbarUserAction')
@stop


@section('content')
<!-- the Carousel -->
<section id="header-bg">
    <div id="web_hosting_background" class="container-fluid">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="headingText">{{ Lang::get('static.WebHosting_H1') }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- END of the Carousel -->

<!-- content section -->
<section id="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">
                    <img class="img-responsive" alt="Vere Vita Jaya" src="{{ asset('asset/img/hosting.png') }}">
                </div>

                <div class="col-md-8">
                    <h3>{{ Lang::get('static.WebHosting_H3_1') }}</h3>
                    <p>{{ Lang::get('static.WebHosting_P1') }}</p>
                    <p>{{ Lang::get('static.WebHosting_P2') }}</p>
                </div>

            </div>

        </div>
</section>
<!-- END of content section -->

<hr />
@stop

@section('sectionBottom')
@include('layout.content.contactBottom', array('displayForm'=>false))
@stop
