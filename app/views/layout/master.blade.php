<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=IE7">
    <meta name="keywords" content="{{ Lang::get('static.meta_keywords') }}">
    <meta name="robots" content="NOODP,NOYDIR">
    <meta name="sitecode" content="{{ App::getLocale() }}">
    <meta name="google" content="notranslate">
    <meta http-equiv="Content-Language" content="{{ App::getLocale() }}">
    <meta name="allow-search" content="yes">
    <meta name="audience" content="all">
    <meta name="distribution" content="global">
    <meta name="classification" content="web designer, Web Design, Web Development, Web Application, Mobile App">
    <meta property="description"  content="{{ Lang::get('static.meta_description') }}">
    <meta name="description" lang="{{ App::getLocale() }}" content="{{ Lang::get('static.meta_description') }}">
    <meta property="name" content="{{ Lang::get('static.meta_description') }}">
    <meta name="author" content="Vere Vita Jaya"/>
    <meta name="google-site-verification" content="dhTNeChIZLtlqdiqcunuLGewLLj_Fv-VmDYkwVtmsZM"/>
    <meta http-equiv="Cache-control" content="public">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>
        @yield('title','Vere Vita Jaya')
    </title>
    <!-- Styles with default content-->
    @yield('scriptTop' , View::make('layout.content.scriptTop'))

</head>
<body data-spy="scroll" data-target="#bs-top-navbar-collapse">

<!-- The nav-bar-top -->
<nav id="top-nav-bar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- For Mobile Grouping -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-top-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand preventDefault" href="{{{ URL::to('/') }}}">
                <img src="{{ asset('asset/img/main-logo-white.png') }}" alt="Vere Vita Jaya"/>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-top-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                @yield('navbarItems', '')

                
                <!-- Display the language chooser -->
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li><a  rel="alternate" hreflang="{{$localeCode}}"
                       href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                        <img src="{{ asset('asset/img/'.$localeCode.'.png') }}" alt="{{{ $localeCode }}}"/>
                    </a>
                </li>
                @endforeach



            </ul>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- END of nav-bar-top -->

<!-- Display error / notice and msg -->

@if (Session::has('errors'))
<div class=" alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <ul>
        @foreach ($errors->all() AS $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('msg'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{{Session::get('msg')}}}
</div>
@endif

@if (Session::get('error'))
<div class="alert alert-error alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    @if (is_array(Session::get('error')))
        @foreach (Session::get('error') AS $error)
            <li>{{ $error }}</li>
        @endforeach
    @else
         {{Session::get('error')}}
    @endif
</div>
@endif

@if (Session::get('notice'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{{ Session::get('notice') }}}</div>
@endif


@yield('content')

<!-- #mainFooter section -->

@yield('sectionBottom', '')

<!-- END of #mainFooter section -->
<!-- The scripts -->

@yield('scriptBottom', View::make('layout.content.scriptBottom'))

</body>
</html>


