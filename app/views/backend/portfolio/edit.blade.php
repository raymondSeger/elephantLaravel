@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

        	<h2>{{{ Lang::get('portfolio.update_portfolio') }}}</h2>
            <br />
        	{{Form::model($portfolio,array('action'=>['PortfolioController@update',Hashids::encode($portfolio->id)],'class'=>'form-horizontal','method'=>'PUT','autocomplete'=>'off','files'=>true))}}
                @include('backend.portfolio.partials._form')

            <label class="col-sm-3 control-label">{{{ Lang::get('portfolio.picture') }}}</label>
            <div class="col-sm-3">
                <img src="{{ asset('asset/portfolio/'. $portfolio->picture ) }}" alt="{{{$portfolio->name}}}"/>

                {{ Form::file('picture','',array('id'=>'','class'=>'')) }}
            </div>
            <div class="clear"></div><br />


            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        {{Form::submit('Submit', array('class'=>'btn btn-primary btn-lg'))}}
                    </div>
                </div>
            </div>

        	{{Form::close()}}

        </div>
    </div>
</div>
@stop