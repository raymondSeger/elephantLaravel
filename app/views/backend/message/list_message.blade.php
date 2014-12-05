@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">

		@if (Session::has('msg'))
			<div class="btn-success">{{{Session::get('msg')}}}</div>
		@endif

		<h2>{{{ Lang::get('messages.all_messages') }}}</h2>
		<br />
		<div class="table-responsive">
			<table class="table table-striped">
			<thead>
				<th>{{{ Lang::get('messages.number') }}}</th>
				<th>{{{ Lang::get('messages.username') }}}</th>
				<th>{{{ Lang::get('messages.message') }}}</th>
				<th colspan="2">{{{ Lang::get('messages.action') }}}</th>
			</thead>
			<?php $count=0; ?>
			@foreach($datas AS $data)
				<?php $count++; ?>
				<tr>
					<td>{{{$count}}}</td>
					<td>{{{$data->user->username}}}</td>
					<td>{{{$data->message}}}</td>
					<td>
						{{link_to_action('MessageController@give_corporate','Give Corporate',[Hashids::encode($data->id)],array('class'=>'btn btn-success'))}}
					</td>
					<td>
						{{Form::model($data,['action'=>['MessageController@destroy',Hashids::encode($data->id)],'method'=>'delete'])}}
							{{Form::button('delete',['type'=>'submit','class'=>'btn btn-danger'])}}
						{{Form::close()}}
					</td>
				</tr>
			@endforeach
			</table>
		</div>
		@endif

		</div>
	</div>
</div>
@stop