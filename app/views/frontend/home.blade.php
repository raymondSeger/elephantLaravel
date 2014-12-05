@extends('layout.master')

@section('title')
{{{ Lang::get('static.homeTitle') }}}
@stop

@section('navbarItems')
<li><a href="#whyChooseUs" class="scrollAnimate">{{{ Lang::get('static.link_whyChooseUs') }}}</a></li>
<li><a href="#process" class="scrollAnimate">{{{ Lang::get('static.link_process') }}}</a></li>
<li><a href="#portfolio" class="scrollAnimate">{{{ Lang::get('static.link_portfolio') }}}</a></li>
<li><a href="#team" class="scrollAnimate">{{{ Lang::get('static.link_team') }}}</a></li>
<li><a href="#contact" class="scrollAnimate">{{{ Lang::get('static.link_contact') }}}</a></li>
<!-- Include the login / action buttons as per user role-->
@include('layout.content.navbarUserAction')
@stop

@section('content')
<section id="carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        <div class="item active" id="carousel1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1>{{{ Lang::Get('static.homeCarouselH1_1') }}}</h1>

                        <p>{{{ Lang::Get('static.homeCarouselP1_1') }}}</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="item" id="carousel2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12  text-center">
                        <h1>{{{ Lang::Get('static.homeCarouselH1_3') }}}</h1>

                        <p>
                            {{{ Lang::Get('static.homeCarouselP1_3') }}}<br/>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item" id="carousel3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12  whiteText text-center">
                        <h1>{{{ Lang::Get('static.homeCarouselH1_2') }}}</h1>

                        <p>{{{ Lang::Get('static.homeCarouselP1_2') }}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</section>
<!-- END of the Carousel -->

<!-- #whyChooseUs -->
<section id="whyChooseUs">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">{{{ Lang::Get('static.homeWhyChooseUs_H1') }}}</h1>
            </div>
        </div>

        <!-- tabs -->
        <div class="row">
            <!-- Navigation Buttons -->
            <div class="col-sm-6 col-md-4 tabLink">
                <ul class="nav nav-pills nav-stacked text-left">
                    <li class="active">
                        <a href="#webDesign" data-toggle="tab">{{{ Lang::Get('static.homeWhyChooseUs_li1') }}}</a>
                    </li>
                    <li>
                        <a href="#onlineVisibility" data-toggle="tab">{{{ Lang::Get('static.homeWhyChooseUs_li2')
                            }}}</a>
                    </li>
                    <li>
                        <a href="#webHosting" data-toggle="tab">{{{ Lang::Get('static.homeWhyChooseUs_li3') }}}</a>
                    </li>
                    <li>
                        <a href="#webSecurity" data-toggle="tab">{{{ Lang::Get('static.homeWhyChooseUs_li4') }}}</a>
                    </li>
                    <li>
                        <a href="#telephoneSystem" data-toggle="tab">{{{ Lang::Get('static.homeWhyChooseUs_li5') }}}</a>
                    </li>
                </ul>
            </div>
            <!-- Navigation Buttons -->

            <!-- .tab-content -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="webDesign">
                    <div class="tabContentRow">
                        <div class="col-sm-6 col-md-4">
                            <img src="{{ asset('asset/img/design.png') }}" alt="Web Design"
                                 class="img-responsive center-block"/>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_1') }}}</h3>

                            <p> {{{ Lang::Get('static.homeWhyChooseUs_P_1') }}} </p>

                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_2') }}}</h3>

                            <p> {{{ Lang::Get('static.homeWhyChooseUs_P_2') }}} </p>

                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_3') }}}</h3>

                            <p> {{{ Lang::Get('static.homeWhyChooseUs_P_3') }}} </p>

                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_4') }}}</h3>

                            <p> {{{ Lang::Get('static.homeWhyChooseUs_P_4') }}} </p>

                            <a href="{{ URL::to('/web-design') }}" class="btn btn-primary btn-block"><strong>{{{
                                    Lang::Get('static.homeWhyChooseUs_LearnMore') }}}</strong></a>
                        </div>
                    </div>
                    <!-- END of .tabContentRow -->
                </div>
                <!-- END of #webDesign -->
                <div class="tab-pane fade" id="onlineVisibility">
                    <div class="tabContentRow">
                        <div class="col-sm-6 col-md-4">
                            <img src="{{ asset('asset/img/online_visibility.png') }}" alt="Online Visibility"
                                 class="img-responsive center-block"/>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_5') }}}</h3>

                            <p> {{{ Lang::Get('static.homeWhyChooseUs_P_5') }}} </p>

                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_6') }}}</h3>

                            <p> {{{ Lang::Get('static.homeWhyChooseUs_P_6') }}} </p>
                            <a href="{{ URL::to('/online-visibility') }}" class="btn btn-primary center-block">{{{
                                Lang::Get('static.homeWhyChooseUs_LearnMore') }}}</a>
                        </div>
                    </div>
                    <!-- END of .tabContentRow -->
                </div>
                <div class="tab-pane fade" id="webHosting">
                    <div class="tabContentRow">

                        <div class="col-sm-6 col-md-4">
                            <img src="{{ asset('asset/img/hosting.png') }}" alt="Web Hosting"
                                 class="img-responsive center-block"/>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_7') }}}</h3>

                            <p>
                                {{{ Lang::Get('static.homeWhyChooseUs_P_7') }}}
                            </p>
                            <a href="{{ URL::to('/web-hosting') }}" class="btn btn-primary center-block">{{{
                                Lang::Get('static.homeWhyChooseUs_LearnMore') }}}</a>
                        </div>
                    </div>
                    <!-- END of .tabContentRow -->
                </div>
                <div class="tab-pane fade" id="webSecurity">
                    <div class="tabContentRow">
                        <div class="col-sm-6 col-md-4">
                            <img src="{{ asset('asset/img/security.png') }}" alt="Web Security"
                                 class="img-responsive center-block"/>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_8') }}}</h3>

                            <p>
                                {{{ Lang::Get('static.homeWhyChooseUs_P_8') }}}
                            </p>
                            <a href="{{ URL::to('/web-security') }}" class="btn btn-primary center-block">{{{
                                Lang::Get('static.homeWhyChooseUs_LearnMore') }}}</a>
                        </div>
                    </div>
                    <!-- END of .tabContentRow -->
                </div>
                <div class="tab-pane fade" id="telephoneSystem">
                    <div class="tabContentRow">
                        <div class="col-sm-6 col-md-4">
                            <img src="{{ asset('asset/img/telephone.png') }}" alt="Telephone System"
                                 class="img-responsive center-block"/>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h3>{{{ Lang::Get('static.homeWhyChooseUs_H3_9') }}}</h3>

                            <p>
                                {{{ Lang::Get('static.homeWhyChooseUs_P_9') }}}
                            </p>
                            <blockquote>{{{ Lang::Get('static.homeWhyChooseUs_blockquote_9') }}}</blockquote>
                            <a href="{{ URL::to('/telephone-system') }}" class="btn btn-primary center-block">{{{
                                Lang::Get('static.homeWhyChooseUs_LearnMore') }}}</a>

                        </div>
                    </div>
                    <!-- END of .tabContentRow -->
                </div>

            </div>
            <!-- END of .tab-content -->
        </div>
    </div>
</section>
<!-- END of #whyChooseUs -->

<!-- Process Alternative section -->
<section id="process">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">{{{ Lang::Get('static.homeProcess_H1') }}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div><img src="{{ asset('asset/img/meet.png') }}" alt="Meet" class="img-responsive center-block"></div>
                <div class="text-left">
                    <h3>{{{ Lang::Get('static.homeProcess_H3_1') }}}</h3>

                    <p>
                        {{{ Lang::Get('static.homeProcess_P_1') }}}
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div><img src="{{ asset('asset/img/plan.png') }}" alt="Plan" class="img-responsive center-block"></div>
                <div class="text-left">
                    <h3>{{{ Lang::Get('static.homeProcess_H3_2') }}}</h3>

                    <p>
                        {{{ Lang::Get('static.homeProcess_P_2') }}}
                    </p>
                </div>
            </div>
            <div class="clearfix visible-sm-block">
                <hr>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div><img src="{{ asset('asset/img/devanddesign.png') }}" alt="Design"
                          class="img-responsive center-block">
                </div>
                <div class="text-left">
                    <h3>{{{ Lang::Get('static.homeProcess_H3_3') }}}</h3>

                    <p>
                        {{{ Lang::Get('static.homeProcess_P_3') }}}
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div><img src="{{ asset('asset/img/testing.png') }}" alt="Testing" class="img-responsive center-block">
                </div>
                <div class="text-left">
                    <h3>{{{ Lang::Get('static.homeProcess_H3_4') }}}</h3>

                    <p>
                        {{{ Lang::Get('static.homeProcess_P_4') }}}
                    </p>
                </div>
            </div>
            <div class="clearfix visible-lg-block visible-md-block visible-sm-block"></div>
            <div class="col-md-3 col-lg-4 hidden-xs col-sm-1 "></div>
            <div class="col-sm-10 col-md-6 col-lg-4 ">
                <div><img src="{{ asset('asset/img/launch.png') }}" alt="Launch" class="img-responsive center-block">
                </div>
                <div class="text-left">
                    <h3>{{{ Lang::Get('static.homeProcess_H3_5') }}}</h3>

                    <p>
                        {{{ Lang::Get('static.homeProcess_P_5') }}}
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-lg-4 hidden-xs col-sm-1 "></div>
        </div>
    </div>
</section>

<!-- Parallax section  -->
<section id="parallax">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center lead">
                <h1>{{ Lang::Get('static.homeRocketImage') }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- END of Parallax section -->

<!-- Portfolio section  -->
@include('frontend.partials._portfolio')
<!-- END of Portfolio section -->

<!-- #team section -->
<section id="team">
    <div class="container-fluid well">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">{{ Lang::Get('static.homeMeetOurTeam_H1') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <article class="teamCard">
                    <div><img src="{{ asset('asset/img/della.png') }}"
                              alt="{{ Lang::Get('static.homeMeetOurTeam_H3_1') }} | {{ Lang::Get('static.homeMeetOurTeam_P_1') }}"
                              class="img-responsive center-block"></div>
                    <div>
                        <h3 class="text-center">{{ Lang::Get('static.homeMeetOurTeam_H3_1') }}</h3>

                        <p class="text-center">{{ Lang::Get('static.homeMeetOurTeam_P_1') }}</p>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-4">
                <article class="teamCard">
                    <div><img src="{{ asset('asset/img/kenny.png') }}"
                              alt="{{ Lang::Get('static.homeMeetOurTeam_H3_2') }} | {{ Lang::Get('static.homeMeetOurTeam_P_2') }}"
                              class="img-responsive center-block"></div>
                    <div>
                        <h3 class="text-center">{{ Lang::Get('static.homeMeetOurTeam_H3_2') }}</h3>

                        <p class="text-center">{{ Lang::Get('static.homeMeetOurTeam_P_2') }}</p>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-4">
                <article class="teamCard">
                    <div><img src="{{ asset('asset/img/agung.png') }}"
                              alt="{{ Lang::Get('static.homeMeetOurTeam_H3_3') }} | {{ Lang::Get('static.homeMeetOurTeam_P_3') }}"
                              class="img-responsive center-block"></div>
                    <div>
                        <h3 class="text-center">{{ Lang::Get('static.homeMeetOurTeam_H3_3') }}</h3>

                        <p class="text-center">{{ Lang::Get('static.homeMeetOurTeam_P_3') }}</p>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-4">
                <article class="teamCard">
                    <div><img src="{{ asset('asset/img/raymond.png') }}"
                              alt="{{ Lang::Get('static.homeMeetOurTeam_H3_4') }} | {{ Lang::Get('static.homeMeetOurTeam_P_4') }}"
                              class="img-responsive center-block"></div>
                    <div>
                        <h3 class="text-center">{{ Lang::Get('static.homeMeetOurTeam_H3_4') }}</h3>

                        <p class="text-center">{{ Lang::Get('static.homeMeetOurTeam_P_4') }}</p>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-4">
                <article class="teamCard">
                    <div><img src="{{ asset('asset/img/lukman.png') }}"
                              alt="{{ Lang::Get('static.homeMeetOurTeam_H3_5') }} | {{ Lang::Get('static.homeMeetOurTeam_P_5') }}"
                              class="img-responsive center-block"></div>
                    <div>
                        <h3 class="text-center">{{ Lang::Get('static.homeMeetOurTeam_H3_5') }}</h3>

                        <p class="text-center">{{ Lang::Get('static.homeMeetOurTeam_P_5') }}</p>
                    </div>
                </article>
            </div>

        </div>
        <!-- First row of the team -->
    </div>
</section>
<!-- END of #team-->
@stop


@section('sectionBottom')
@include('layout.content.contactBottom', array('displayForm'=>true))
@stop
