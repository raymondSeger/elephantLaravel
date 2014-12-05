@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

        	<h2>{{{ Lang::get('portfolio.new') }}}</h2>
            <br />
        	{{Form::open(array('action'=>'PortfolioController@store','class'=>'form-horizontal','autocomplete'=>'off','files'=>true))}}
        		@include('backend.portfolio.partials._form')


            <label class="col-sm-3 control-label">{{{ Lang::get('portfolio.picture') }}}</label>
            <div class="col-sm-3">
                {{ Form::file('picture',array('id'=>'','class'=>'form-control')) }}
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