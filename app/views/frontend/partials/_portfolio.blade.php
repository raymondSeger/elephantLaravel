<section id="portfolio">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">{{ Lang::Get('static.homePortfolio_H1') }}</h1>
            </div>
        </div>
        <div class="row">

            @ForEach ($portfolios as $portfolio)
            {{--<a target="_blank" href="{{{$portfolio->url}}}" class="col-xs-12 col-sm-6">
                <article class="PortfolioCard">
                    <div><img src="{{ asset('asset/portfolio/' . $portfolio->picture ) }}" alt="{{$portfolio->name}}" class="img-responsive center-block img-full-width"></div>
                    <div>
                        <blockquote>
                            <p>{{ $portfolio->testimony }}</p>
                            <h4 class="portfolio-author">-&nbsp;{{ $portfolio->author }}</h4>
                        </blockquote>
                    </div>
                </article>
            </a>--}}
            <div class="col-xs-12 col-md-6">
                <a target="_blank" href="{{{$portfolio->url}}}" class="thumbnail">
                  <img src="{{ asset('asset/portfolio/' . $portfolio->picture ) }}" alt="{{$portfolio->name}}">
                </a>
                <blockquote>
                    <p>{{ $portfolio->testimony }}</p>
                    <h4 class="portfolio-author">-&nbsp;{{ $portfolio->author }}</h4>
                </blockquote>
            </div>
            @EndForeach

        </div>
        <!-- First row of the team -->
    </div>
</section>