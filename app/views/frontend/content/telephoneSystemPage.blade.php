@extends('layout.master')

@section('title')
{{{ Lang::get('static.TelephoneSystemTitle') }}}
@stop

@section('navbarItems')
<li><a href="/">{{ Lang::get('static.Back') }}</a></li>
<!-- Include the login / action buttons as per user role-->
@include('layout.content.navbarUserAction')
@stop


@section('content')
<!-- the Carousel -->
<section id="header-bg">
    <div id="telephone_system_background" class="container-fluid">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="headingText">{{ Lang::get('static.TelephoneSystem_H1') }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- END of the Carousel -->

<!-- content section -->

<!-- content section -->
<section id="content">

    <section>
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">
                    <img class="img-responsive" alt="Vere Vita Jaya" src="{{ asset('asset/img/telephone.png') }}">
                </div>

                <div class="col-md-8">
                    <h3>{{ Lang::get('static.TelephoneSystem_H3_1') }}</h3>
                    <p>{{ Lang::get('static.TelephoneSystem_P1') }}</p>
                     <ul>
                        <li>{{ Lang::get('static.TelephoneSystem_l1') }}</li>
                         <li>{{ Lang::get('static.TelephoneSystem_l2') }}</li>
                         <li>{{ Lang::get('static.TelephoneSystem_l3') }}</li>
                         <li>{{ Lang::get('static.TelephoneSystem_l4') }}</li>
                         <li>{{ Lang::get('static.TelephoneSystem_l5') }}</li>
                         <li>{{ Lang::get('static.TelephoneSystem_l6') }}</li>
                         <li>{{ Lang::get('static.TelephoneSystem_l7') }}</li>
                         <li>{{ Lang::get('static.TelephoneSystem_l8') }}</li>
                     </ul>
                    <p>{{ Lang::get('static.TelephoneSystem_P2') }}</p>
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