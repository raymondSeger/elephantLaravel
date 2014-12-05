<section id="contact">
    <div class="container-fluid">
        <div itemscope itemtype="http://schema.org/LocalBusiness" class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <img itemprop="image" id="contactLogoVevija" src="{{ asset('asset/img/main_logo_black.png') }}" alt="Vere Vita Jaya">

                <p><a title="Vere Vita Jaya" href="http://www.vitajaya.com"><span itemprop="name">Vere Vita Jaya</span></a> {{ Lang::Get('static.homeContact_P_1') }}</p>
            </div>
            <div id="addressContactDIV" class="col-sm-2">
                <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <p>{{ Lang::Get('static.homeContact_P_2') }}</p>
                <address>
                    <p><span itemprop="streetAddress">Jl. Pluit Samudra II,<br/>
                        Menara Marina, Unit BM3B</span><br/>
                        <span itemprop="addressLocality">Jakarta Utara</span>
                        <span itemprop="postalCode">14450</span>
                        <span itemprop="addressCountry"> Indonesia</span><br/><br/>
                </span>
                        <span itemprop="telephone">+62 21661 7773</span><br/>
                        <span itemprop="telephone">+62 82 111 162 707</span><br/>
                        <span itemprop="telephone">+62 81 5991 3803</span><br/>
                        <a href="mailto:vitajaya@vitajaya.com">
                            <span itemprop="email">vitajaya@vitajaya.com</span>
                        </a>
                    </p>
                </address>
            </div>

            <!-- display the contact form on request -->
            @if ($displayForm)


            {{Form::open(array('action'=>'HomeController@contactFormSubmit','autocomplete'=>'off','method' => 'post',
            'role'=>'form'))}}
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="name">{{ Lang::Get('static.homeContact_L1') }}</label>
                    {{Form::text( 'name' ,'',array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    <label for="email">{{ Lang::Get('static.homeContact_L2') }}</label>
                    {{Form::text( 'email' ,'',array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                    <label for="phone">{{ Lang::Get('static.homeContact_L3') }}</label>
                    {{Form::text( 'phone' ,'',array('class'=>'form-control'))}}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="comment">{{ Lang::Get('static.homeContact_L4') }}</label>
                    {{Form::textarea( 'message' ,'',array('class'=>'form-control','rows'=>'4'))}}
                </div>

                <button type="submit" class="btn btn-default">{{ Lang::Get('static.homeContact_L5') }}</button>

                @if (Session::has('errors'))
                <div class=" alert alert-danger alert-dismissible">
                    <ul>
                        @foreach ($errors->all() AS $error)

                        <li>{{ $error }} </li>

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


            </div>
            {{Form::close()}}


            <div class="col-sm-1"></div>
        </div>
        <!-- close the row div with form -->
        @else
        <div class="col-sm-5">
            @endif


            <!-- END of .row -->
            <div class="row">
                <div class="col-xs-12">
                    <p class="text-center">{{ Lang::Get('static.homeContact_P_3') }}</p>
                </div>
                <div class="cleafix"></div>
                <div id="socialIcons" class="text-center">
                    <div class="col-xs-4">
                        <a target="_blank" href="http://www.facebook.com/pages/Vere-Vita-Jaya/325335714315648">

                                <span class="fa-stack fa-2x agungBlackText">
                                  <i class="fa fa-circle fa-stack-2x"></i>
                                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a target="_blank" href="http://twitter.com/verevitajaya">
                                <span class="fa-stack fa-2x agungBlackText">
                                  <i class="fa fa-circle fa-stack-2x"></i>
                                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>

                        </a>
                    </div>
                    <!--<div class="col-xs-3">
                        <a href="">

                                    <span class="fa-stack fa-2x agungBlackText">
                                      <i class="fa fa-circle fa-stack-2x"></i>
                                      <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>

                        </a>
                    </div>-->
                    <div class="col-xs-4">
                        <a target="_blank" href="https://plus.google.com/+Vitajaya/about"  rel="publisher">

                                <span class="fa-stack fa-2x agungBlackText">
                                  <i class="fa fa-circle fa-stack-2x"></i>
                                  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </div>
                </div>
                <div class="cleafix"></div>
                <div class="col-xs-12">
                    <a href="/career">
                        <img src="{{ asset('asset/img/career.png') }}" class="center-block" alt="">
                    </a>
                </div>

            </div>

            @if (! $displayForm)
            <div class="col-sm-1"></div>
        </div>
        <!-- close the row div without form -->
        @endif

    </div>
</section>

<section id="Footer">
    <footer>
        <div class="text-center">
            Copyright &copy; {{ date('Y');}} <a href="#">Vere Vita Jaya</a> / <a href="/policy">{{ Lang::Get('static.Policy_Link') }}</a>
        </div>
    </footer>
</section>
