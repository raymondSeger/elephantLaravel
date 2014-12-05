@extends('layout.master')

{{--@section('navbarItems')
	@include('backend.navbar')
@stop--}}

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
	
		@if (Session::has('msg'))
				<div class="btn-success">{{{Session::get('msg')}}}</div>
		@endif

		<h2>Update Corporate for User</h2><br />
		{{Form::model($message,array('action'=>['MessageController@do_give_corporate',Hashids::encode($message->user->id)],'class'=>'form-horizontal','autocomplete'=>'off'))}}
			<div class="form-group">
				{{Form::label('','Username', array('class'=>'col-sm-3 control-label'))}}
			    <div class="col-sm-5">
			    {{Form::label('',$message->user->username,array('class'=>'form-control'))}}
			    </div>
			    <div class="clear"></div><br />
			    {{Form::label('','Message', array('class'=>'col-sm-3 control-label'))}}
			    <div class="col-sm-5">
			    {{Form::label('',$message->message,array('class'=>'form-control'))}}
			    </div>
			    <div class="clear"></div><br />
			    {{Form::label('','Corporate', array('class'=>'col-sm-3 control-label'))}}
			    <div class="col-sm-3">
			    	<select name="corporate_id" class="form-control">
	                   @foreach($corporates AS $corporate)
	                       <option value= {{{ Hashids::encode($corporate->id) }}} >{{{$corporate->name}}}</option>
	                   @endforeach
	                </select>
			    </div>
			    <div class="clear"></div><br />
			    <div class="form-group">
			        <div class="col-sm-9 col-sm-offset-3">
			            {{Form::submit('Submit', array('class'=>'btn btn-primary'))}}
			        </div>
			    </div>

			    <p class="error">{{{$errors->first('message',':message')}}}</p>
			</div>

		{{Form::close()}}
		
		</div>
	</div>
</div>
@stop