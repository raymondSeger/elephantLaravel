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

			@if(!Auth::User()->hasRole("Admin"))
		        <h2>{{{ Lang::get('project.your_information') }}}</h2>
		        <h3>{{{ Lang::get('project.company') }}} : {{{$corporate->name or 'You do not have any corporate'}}}</h3>
		        <p>{{{$corporate->phone or 'You do not have any corporate'}}}</p>
		        <p>{{{$corporate->email or 'You do not have any corporate'}}}</p>
		        <p>{{{$corporate->address or 'You do not have any corporate'}}}</p>
		        <hr />
			@endif
			<h2>{{{ Lang::get('project.all_project') }}}</h2>
			<br />
			<div class="table-responsive">
				<table class="table table-striped">
				<thead>
					<th>{{{ Lang::get('project.number') }}}</th>
					<th>{{{ Lang::get('project.project_name') }}}</th>
					<th>{{{ Lang::get('project.url') }}}</th>
					<th>{{{ Lang::get('project.company') }}}</th>
					<th colspan="2">{{{ Lang::get('project.action') }}}</th>
				</thead>
				<?php $count=0; ?>
				@foreach($datas AS $data)
					<?php $count++; ?>
					<tr>
						<td>{{{$count}}}</td>
						<td>{{{$data->name}}}</td>
						<td><a target="_blank" href={{{$data->url}}}>{{{$data->url}}}</a></a></td>
						<td>{{{$data->corporate->name}}}</td>
						<td>
							{{link_to_action('ProjectController@edit','Update',[Hashids::encode($data->id)],array('class'=>'btn btn-success'))}}
						</td>
						@if(Auth::User()->hasRole("Admin"))
						<td>
							{{Form::model($data,['action'=>['ProjectController@destroy',Hashids::encode($data->id)],'method'=>'delete'])}}
								{{Form::button('delete',['type'=>'submit','class'=>'btn btn-danger'])}}
							{{Form::close()}}
						</td>
						@endif
					</tr>
				@endforeach
				</table>
			</div>

		</div>
	</div>
</div>
@stop