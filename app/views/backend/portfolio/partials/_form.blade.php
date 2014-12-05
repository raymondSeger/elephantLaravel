
        <div class="form-group">

        <label class="col-sm-3 control-label">{{{ Lang::get('portfolio.url') }}}</label>
        <div class="col-sm-3">
            {{Form::text('url', null ,array('class'=>'form-control'))}}
        </div>
        <div class="clear"></div><br />

        <label class="col-sm-3 control-label">{{{ Lang::get('portfolio.name') }}}</label>
        <div class="col-sm-3">
            {{Form::text('name', null ,array('class'=>'form-control'))}}
        </div>
        <div class="clear"></div><br />

        <label class="col-sm-3 control-label">{{{ Lang::get('portfolio.author') }}}</label>
        <div class="col-sm-3">
            {{Form::text('author', null ,array('class'=>'form-control'))}}
        </div>
        <div class="clear"></div><br />

        <label class="col-sm-3 control-label">{{{ Lang::get('portfolio.testimony') }}}</label>
        <div class="col-sm-3">
            {{Form::textarea('testimony', null ,array('class'=>'form-control'))}}
        </div>
        <div class="clear"></div><br />

