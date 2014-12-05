<div class="container">
    <div class="row">
        <div class="col-sm-12">

        <h2>{{{ Lang::get('messages.send_message') }}}</h2>
        {{Form::open(array('action'=>'MessageController@store','class'=>'form-horizontal','autocomplete'=>'off'))}}

        <div class="new-message col-md-12">
            <h3>{{{ Lang::get('messages.your_message') }}}</h3>
            <textarea name="message" class="form-control" rows="9" placeholder="{{{ Lang::get('messages.info_placeholder') }}}"></textarea>
            <div class="clear"></div><br />
            {{Form::hidden('user_id',Hashids::encode($user->id),array('class'=>'form-control'))}}

            <div class="form-group">
                <div class="col-sm-12">
                    {{Form::submit('Submit', array('class'=>'btn btn-primary btn-lg'))}}
                </div>
            </div>

        </div>

        {{Form::close()}}
        
        </div>
    </div>
</div>
