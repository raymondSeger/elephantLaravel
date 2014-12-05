@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">

		<h2>{{{ Lang::get('project.update_project') }}}</h2>
		<br />
		{{Form::model($project,array('action'=>['ProjectController@update',Hashids::encode($project->id)],'class'=>'form-horizontal','method'=>'PUT','autocomplete'=>'off'))}}
	        @include('backend.project.partials._form');
		{{Form::close()}}

		</div>
	</div>
</div>
@stop