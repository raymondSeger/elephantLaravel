@extends('layout.master')

@section('title')
{{{ Lang::get('static.WebDesignTitle') }}}
@stop

@section('navbarItems')
<li><a href="/">{{ Lang::get('static.Back') }}</a></li>
<!-- Include the login / action buttons as per user role-->
@include('layout.content.navbarUserAction')
@stop


@section('content')
<!-- the Carousel -->
<section id="header-bg">
    <div id="web_design_background" class="container-fluid">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="headingText">{{{ Lang::get('static.WebDesign_H1') }}}</h1>
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
                    <img class="img-responsive" alt="Vere Vita Jaya" src="{{ asset('asset/img/design.png') }}">
                </div>

                <div class="col-md-4">
                    <h3>{{{ Lang::get('static.WebDesign_H3_1') }}}</h3>
                    <p>{{{ Lang::get('static.WebDesign_P_1') }}}</p>
                    <p>{{{ Lang::get('static.WebDesign_P_2') }}}</p>
                    <p>{{{ Lang::get('static.WebDesign_P_3') }}}</p>
                </div>

                <div class="col-md-4">
                    <h3>{{{ Lang::get('static.WebDesign_H3_2') }}}</h3>
                    <p>{{{ Lang::get('static.WebDesign_P_4') }}}</p>
                    <ul>
                        <li>{{ Lang::get('static.WebDesign_l1') }}</li>
                        <li>{{ Lang::get('static.WebDesign_l2') }}</li>
                        <li>{{ Lang::get('static.WebDesign_l3') }}</li>
                        <li>{{ Lang::get('static.WebDesign_l4') }}</li>
                        <li>{{ Lang::get('static.WebDesign_l5') }}</li>
                        <li>{{ Lang::get('static.WebDesign_l6') }}</li>
                    </ul>
                </div>

            </div>

            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <h3>{{{ Lang::get('static.WebDesign_H3_3') }}}</h3>
                    <p>{{{ Lang::get('static.WebDesign_P_5') }}}</p>
                </div>

                <div class="col-md-4">
                    <h3>{{{ Lang::get('static.WebDesign_H3_4') }}}</h3>
                    <p>{{{ Lang::get('static.WebDesign_P_6') }}}</p>
                </div>

            </div>

        </div>

</section>

<hr/>
@stop

@section('sectionBottom')
@include('layout.content.contactBottom', array('displayForm'=>false))
@stop
