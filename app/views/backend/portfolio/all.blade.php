@extends('layout.master')

@section('navbarItems')
@include('backend.navbar')
@stop

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2>{{{ Lang::get('portfolio.all_portfolios') }}}</h2>
            <br />
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>{{{ Lang::get('portfolio.url') }}}</th>
                        <th>{{{ Lang::get('portfolio.picture') }}}</th>
                        <th>{{{ Lang::get('portfolio.name') }}}</th>
                        <th>{{{ Lang::get('portfolio.testimony') }}}</th>
                        <th>{{{ Lang::get('portfolio.author') }}}</th>
                        <th colspan="2">{{{ Lang::get('portfolio.action') }}}</th>

                    </thead>

                    @foreach($portfolios AS $portfolio)
                    <tr>
                        <td>    {{{$portfolio->url}}}           </td>
                        <td> <img class="img-responsive" src="{{ asset('asset/portfolio/'. $portfolio->picture ) }}" alt="{{{$portfolio->name}}}"/> </td>
                        <td>    {{{$portfolio->name}}}      </td>
                        <td>    {{{$portfolio->testimony}}}      </td>
                        <td>    {{{$portfolio->author}}}      </td>
                        <td> {{link_to_action('PortfolioController@edit','Detail',[Hashids::encode($portfolio->id)],array('class'=>'btn btn-success'))}}                    </td>
                        <td>
                            {{Form::model($portfolio,['action'=>['PortfolioController@destroy',Hashids::encode($portfolio->id)],'method'=>'delete'])}}
                            {{Form::button('delete',['type'=>'submit','class'=>'btn btn-danger'])}}
                            {{Form::close()}}
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>
@stop