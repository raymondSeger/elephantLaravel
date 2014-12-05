@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">

		<h2>{{{ Lang::get('project.create_new') }}}</h2>
		<br />
		{{Form::open(array('action'=>'ProjectController@store','class'=>'form-horizontal','autocomplete'=>'off'))}}
			@include('backend.project.partials._form');
		{{Form::close()}}

		</div>
	</div>
</div>
@stop