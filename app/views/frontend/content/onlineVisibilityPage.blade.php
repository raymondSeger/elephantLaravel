@extends('layout.master')

@section('title')
{{{ Lang::get('static.OnlineVisibilityTitle') }}}
@stop

@section('navbarItems')
<li><a href="/">{{ Lang::get('static.Back') }}</a></li>
<!-- Include the login / action buttons as per user role-->
@include('layout.content.navbarUserAction')
@stop


@section('content')
<!-- the Carousel -->
<section id="header-bg">
    <div id="online_visibility_background" class="container-fluid">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="headingText">{{ Lang::get('static.OnlineVisibility_H1') }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- END of the Carousel -->

<!-- content section -->
<section id="content">

    <section>
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">
                    <img class="img-responsive" alt="Vere Vita Jaya"
                         src="{{ asset('asset/img/online_visibility.png') }}">
                </div>

                <div class="col-md-4">
                    <h3>{{ Lang::get('static.OnlineVisibility_H3_1') }}</h3>
                    <p>{{ Lang::get('static.OnlineVisibility_P1') }}</p>
                    <p>{{ Lang::get('static.OnlineVisibility_P2') }}</p>
                </div>

                <div class="col-md-4">
                    <h3>{{ Lang::get('static.OnlineVisibility_H3_2') }}</h3>
                    <p>{{ Lang::get('static.OnlineVisibility_P3') }}</p>
                    <p>{{ Lang::get('static.OnlineVisibility_P4') }}</p>
                    <p>{{ Lang::get('static.OnlineVisibility_P5') }}</p>
                </div>

            </div>

        </div>
    </section>

</section>
<!-- END of content section -->

<hr/>
@stop

@section('sectionBottom')
@include('layout.content.contactBottom', array('displayForm'=>false))
@stop