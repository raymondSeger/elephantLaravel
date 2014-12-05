<div class="form-group">
    <label for="corporate_id" class="col-sm-3 control-label">{{{ Lang::get('project.company') }}}</label>
    @if(Auth::User()->hasRole("Admin"))
    <div class="col-sm-3">
        {{--<select name="corporate_id" class="form-control">
            @foreach($corporates AS $corporate)
            <option value={{{Hashids::encode($corporate->id)}}}>{{{$corporate->name}}}</option>
            @endforeach
        </select>--}}
        {{ Form::select('corporate_id', $corporates,NULL,['class'=>'form-control']) }}
    </div>
    @else
    <div class="col-sm-3">
        {{Form::label('',Auth::User()->corporate->name,['class'=>'control-label']) }}
        {{ Form::hidden('corporate_id',Hashids::encode(Auth::user()->corporate_id)) }}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="name" class="col-sm-3 control-label">{{{ Lang::get('project.name') }}}</label>

    <div class="col-sm-3">
        {{Form::text('name',null,array('class'=>'form-control'))}}
    </div>
</div>

<div class="form-group">
    <label for="url" class="col-sm-3 control-label">{{{ Lang::get('project.url') }}}</label>

    <div class="col-sm-3">
        {{Form::text('url',null,array('class'=>'form-control'))}}
    </div>
</div>

@include ('backend.project.partials._formdetails')


<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        {{Form::submit('Submit', array('class'=>'btn btn-primary btn-lg'))}}
    </div>
</div>



