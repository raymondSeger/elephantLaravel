@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">

		<h2>{{{ Lang::get('company.update_company') }}}</h2><br />
		{{Form::model($corporate,array('action'=>['CorporateController@update',Hashids::encode($corporate->id)],'class'=>'form-horizontal','method'=>'PUT','autocomplete'=>'off'))}}
	        @include('backend.corporate.partials._form')
		{{Form::close()}}

		</div>
	</div>
</div>
@stop