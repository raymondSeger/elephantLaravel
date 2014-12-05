@extends('layout.master')

@section('title')
{{{ Lang::get('static.homeTitle') }}}
@stop

@section('navbarItems')
	@include('backend.navbar')
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<h2>{{{ Lang::get('user.all_user') }}}</h2>
			<br />
			<div class="table-responsive">
				<table class="table table-striped">
				<thead>
					<th>{{{ Lang::get('user.date_created') }}}</th>
					<th>{{{ Lang::get('user.username') }}}</th>
					<th>{{{ Lang::get('user.name') }}}</th>
					<th>{{{ Lang::get('user.email') }}}</th>
					<th>{{{ Lang::get('user.mobile_phone') }}}</th>
		            <th>Admin?</th>
					<th>{{{ Lang::get('user.confirmed') }}}</th>
					<th>{{{ Lang::get('user.company') }}}</th>
					<th colspan="6">{{{ Lang::get('user.action') }}}</th>
				</thead>

				@foreach($datas AS $data)
					<tr>
						<td>{{{$data->created_at}}}</td>
						<td>{{{$data->username}}}</td>
						<td>{{{$data->name}}}</td>
						<td>{{{$data->email}}}</td>
						<td>{{{$data->phone_mobile}}}</td>
		                <td>
		                    @if($data->hasRole('Admin'))
		                    yes
		                    @else
		                    no
		                    @endif
		                </td>
						<td>
							@if($data->confirmed == 1)
							yes
							@else
							no
							@endif
						</td>
						<td>{{$data->corporate->name or '<span class="text-primary">Not yet set</span>'}}</td>
						<td>
		                    {{link_to_action('UserController@edit','Update',[Hashids::encode($data->id)],array('class'=>'btn btn-success'))}}
						</td>

		                <td>
		                    {{Form::model($data,['action'=>['UserController@destroy',Hashids::encode($data->id)],'method'=>'delete'])}}
		                        {{Form::button('delete',['type'=>'submit','class'=>'btn btn-danger'])}}
		                    {{Form::close()}}
		                </td>

						<td>

						</td>
					</tr>
				@endforeach
				</table>
			</div>

		</div>
	</div>
</div>
@stop