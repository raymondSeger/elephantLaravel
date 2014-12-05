@extends('layout.master')

@section('navbarItems')
    @include('backend.navbar')
@stop

@section ('content')

@if(Auth::User()->corporate_id == 0)
<div class="container">
    <div class="row">
        <div class="col-sm-12">

        @if(Auth::user()->request_corporate == TRUE)
            <h2>{{{ Lang::get('company.thanks_for_request') }}}</h2>
        @else
        <h2>{{{ Lang::get('company.no_company') }}} : {{ HTML::linkAction('CorporateController@request_corporate',Lang::get('company.request')) }}</h2>
        @endif

        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-sm-12">

        <h2>{{{ Lang::get('homepage.your_information') }}}</h2>
        <br />
        <h3>{{{ Lang::get('homepage.company') }}} : {{{$user->corporate->name}}}</h3>
        <p>{{{$user->corporate->phone}}}</p>
        <p>{{{$user->corporate->email}}}</p>
        <p>{{{$user->corporate->address}}}</p>
        <hr />
        <br />
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>{{{ Lang::get('homepage.number') }}}</th>
                <th>{{{ Lang::get('homepage.project_name') }}}</th>
                <th>{{{ Lang::get('homepage.url') }}}</th>
                <th>{{{ Lang::get('homepage.action') }}}</th>
                </thead>
                <?php $count=0; ?>
                @foreach($user->corporate->projects AS $data)
                <?php $count++; ?>
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->url}}</td>
                    <td>{{link_to_action('ProjectController@edit','Update',[Hashids::encode($data->id)],array('class'=>'btn btn-success'))}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">

        {{{ Lang::get('homepage.your_company_data') }}} : {{ $user->corporate->name or '<a href="#"> Join or Create your first company</a>' }} <br>
        {{{ Lang::get('homepage.your_project_data') }}} : {{{ $user->corporate->projects->name or 'Create your first project' }}} <br>
        {{{ Lang::get('homepage.your_message') }}} : {{{ $user->messages->count() }}} <br>

        </div>
    </div>
</div>
@endif

@stop

