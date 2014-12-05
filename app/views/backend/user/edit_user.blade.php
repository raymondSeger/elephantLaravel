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

	        <h2>{{{ Lang::get('user.update_profile') }}}</h2>
	        <br />
	        {{Form::model($users,array('action'=>['UserController@update',Hashids::encode($users->id)],'class'=>'form-horizontal','method'=>'PUT','autocomplete'=>'off'))}}
	            @include('backend.user.partials._form')
	        {{Form::close()}}

	    </div>
    </div>
</div>
@stop