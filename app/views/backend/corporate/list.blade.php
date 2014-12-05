@extends('layout.master')

@section('navbarItems')
	@include('backend.navbar')
@stop

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">

		@if(Auth::User()->hasRole("Admin"))
			<h2>{{{ Lang::get('company.all_company') }}}</h2>
			<br />
			<div class="table-responsive">
				<table class="table table-striped">
				<thead>
					<th>{{{ Lang::get('company.created_at') }}}</th>
					<th>{{{ Lang::get('company.company') }}}</th>
					<th>{{{ Lang::get('company.phone') }}}</th>
					<th>{{{ Lang::get('company.email') }}}</th>
					<th>{{{ Lang::get('company.address') }}}</th>
					<th colspan="2">{{{ Lang::get('company.action') }}}</th>
				</thead>
				@foreach($datas AS $data)
					<tr>
						<td>{{{$data->created_at}}}</td>
						<td>{{{$data->name}}}</td>
						<td>{{{$data->phone}}}</td>
						<td>{{{$data->email}}}</td>
						<td>{{{$data->address}}}</td>
						<td>
							{{link_to_action('CorporateController@edit','Update',[Hashids::encode($data->id)],array('class'=>'btn btn-success'))}}
						</td>
						<td>
							{{Form::model($data,['action'=>['CorporateController@destroy',Hashids::encode($data->id)],'method'=>'delete'])}}
								{{Form::button('delete',['type'=>'submit','class'=>'btn btn-danger'])}}
							{{Form::close()}}
						</td>
					</tr>
				@endforeach
				</table>
			</div>
		@else
			<h2>{{{ Lang::get('company.your_information') }}}</h2>
			<br />
			<h3>{{{ Lang::get('company.company') }}} : {{{$datas->name}}}</h3>
			<p>{{{$datas->phone}}}</p>
			<p>{{{$datas->email}}}</p>
			<p>{{{$datas->address}}}</p>
	        <p>{{link_to_action('CorporateController@edit','Update',[Hashids::encode($datas->id)],array('class'=>'btn btn-success'))}}</p>
		@endif
		
		</div>
	</div>
</div>
@stop