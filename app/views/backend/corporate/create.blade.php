@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">

		<h2>{{{ Lang::get('company.create_new') }}}</h2><br />
		{{Form::open(array('action'=>'CorporateController@store','class'=>'form-horizontal','autocomplete'=>'off'))}}
			@include('backend.corporate.partials._form')
		{{Form::close()}}

		</div>
	</div>
</div>
@stop