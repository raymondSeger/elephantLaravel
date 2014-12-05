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
<!-- the Carousel -->
<section id="header-bg">
    <div id="career_background" class="container-fluid">

        <div class="row">
            <div class="col-sm-12 text-center">
                <!--<h1 class="headingText">We are hiring!</h1>-->
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
                <img class="img-responsive" alt="Vere Vita Jaya" src="{{ asset('asset/img/we_are_hiring.png') }}">
            </div>

            <div class="col-md-4">
                <h3>{{ Lang::get('static.Career_H3_1') }}</h3>
                <p>{{ Lang::get('static.Career_P1') }}</p>
                <p>{{ Lang::get('static.Career_P2') }}</p>
                <p>{{ Lang::get('static.Career_P3') }}</p>
                <p>{{ Lang::get('static.Career_P4') }}</p>
                <p>{{ Lang::get('static.Career_P5') }}</p>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</section>

<hr/>
@stop

@section('sectionBottom')
@include('layout.content.contactBottom', array('displayForm'=>true))
@stop