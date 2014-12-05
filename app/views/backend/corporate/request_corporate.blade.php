@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
	
		@if(Auth::user()->request_corporate == TRUE)
			<h2><h2>{{{ Lang::get('company.thanks_for_request') }}}</h2></h2>
		@else

		<h2>{{{ Lang::get('company.request') }}}</h2>
		<br />
		<label class="col-sm-3 control-label">{{{ Lang::get('company.already_have') }}}</label>
	    <div class="col-sm-3">
	    <label>
	    	{{Form::radio('corporate','','checked',array('id'=>'yes'))}} {{{ Lang::get('company.yes') }}}
	    </label>&nbsp;&nbsp;&nbsp;
	     <label>
	     	{{Form::radio('corporate','','',array('id'=>'no'))}} {{{ Lang::get('company.no') }}}
	    </label>
	    </div>
	    <div class="clear"></div><br />

		{{Form::open(array('action'=>'CorporateController@store_request_corporate','class'=>'form-horizontal','autocomplete'=>'off','id'=>'no_corporate'))}}
			<div class="form-group">
			    <label class="col-sm-3 control-label">{{{ Lang::get('company.your_company') }}}</label>
			    <div class="col-sm-3">
			    <select data-placeholder="Your Company" name="corporate_name" class="form-control chosen-select-deselect" tabindex="-1">
				   	@foreach($corporates AS $corporate)
		            	<option value="{{{$corporate->name}}}">{{{$corporate->name}}}</option>
		            @endforeach
		        </select>
			    {{--Form::text('message','',array('class'=>'form-control'))--}}
			    </div>
			    {{Form::hidden('request_corporate','1')}}
			    <div class="clear"></div><br />
			    <div class="form-group">
			        <div class="col-sm-9 col-sm-offset-3">
			            {{Form::submit('Submit', array('class'=>'btn btn-primary'))}}
			        </div>
			    </div>
			</div>

		{{Form::close()}}

		{{Form::open(array('action'=>'CorporateController@store','class'=>'form-horizontal','autocomplete'=>'off','id'=>'have_corporate'))}}
			{{Form::hidden('request_corporate','1')}}
			@include('backend.corporate.partials._form')
		{{Form::close()}}

		@endif

		</div>
	</div>
</div>
@stop

