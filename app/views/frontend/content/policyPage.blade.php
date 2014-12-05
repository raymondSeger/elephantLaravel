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
    <div id="policy_background" class="container-fluid">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="headingText">{{ Lang::get('static.PolicyTitle') }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- END of the Carousel -->

<!-- content section -->
<section id="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-6">
                <h3>{{ Lang::get('static.Policy_H3_1') }}</h3>
                <p>{{ Lang::get('static.Policy_P_1') }}</p>
                <h4>{{ Lang::get('static.Policy_H4_1') }}</h4>
                <p>{{ Lang::get('static.Policy_P_1') }}</p>
                <p>{{ Lang::get('static.Policy_P_2') }}</p>
                <p>{{ Lang::get('static.Policy_P_3') }}</p>
                <p>{{ Lang::get('static.Policy_P_4') }}</p>
                <h4>{{ Lang::get('static.Policy_H4_2') }}</h4>
                <p>{{ Lang::get('static.Policy_P_5') }}</p>
                <h4>{{ Lang::get('static.Policy_H4_3') }}</h4>
                <p>{{ Lang::get('static.Policy_P_6') }}</p>
                <h4>{{ Lang::get('static.Policy_H4_4') }}</h4>
                <p>{{ Lang::get('static.Policy_P_7') }}</p>
                <dl>
                    <dt>{{ Lang::get('static.Policy_P_7_11') }}</dt>
                    <dd>{{ Lang::get('static.Policy_P_7_12') }}</dd>
                    <dt>{{ Lang::get('static.Policy_P_7_21') }}</dt>
                    <dd>{{ Lang::get('static.Policy_P_7_22') }}</dd>
                    <dt>{{ Lang::get('static.Policy_P_7_31') }}</dt>
                    <dd>{{ Lang::get('static.Policy_P_7_32') }}</dd>
                    <dt>{{ Lang::get('static.Policy_P_7_41') }}</dt>
                    <dd>{{ Lang::get('static.Policy_P_7_42') }}</dd>
                </dl>
                <h4>{{ Lang::get('static.Policy_H4_5') }}</h4>
                <p>{{ Lang::get('static.Policy_P_8') }}</p>
                <p>{{ Lang::get('static.Policy_P_9') }}</p>
                <h4>{{ Lang::get('static.Policy_H4_6') }}</h4>
                <p>{{ Lang::get('static.Policy_P_10') }}</p>
                <h4>{{ Lang::get('static.Policy_H4_7') }}</h4>
                <p>{{ Lang::get('static.Policy_P_11') }}</p>
                <h4>{{ Lang::get('static.Policy_H4_8') }}</h4>
                <p>{{ Lang::get('static.Policy_P_12') }}</p>
                <h4>{{ Lang::get('static.Policy_H4_9') }}</h4>
                <p>{{ Lang::get('static.Policy_P_13') }}</p>


            </div>
            <div class="col-xs-3"></div>
        </div>
    </div>

</section>

<hr/>
@stop

@section('sectionBottom')
@include('layout.content.contactBottom', array('displayForm'=>true))
@stop