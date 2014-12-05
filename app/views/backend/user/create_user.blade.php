@extends('layout.master')

@section('title')
{{{ Lang::get('static.homeTitle') }}}
@stop

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">

		<h2>{{{ Lang::get('user.create_new') }}}</h2>
		<br />
		{{Form::open(array('action'=>'UserController@store','class'=>'form-horizontal','autocomplete'=>'off'))}}
	        @include('backend.user.partials._form')
		{{Form::close()}}

		</div>
	</div>
</div>
@stop