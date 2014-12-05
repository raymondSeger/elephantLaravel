

{{--<div class="container">
    <div class="row">

        {{Form::open(array('action'=>'ProjectController@store','class'=>'form','autocomplete'=>'off'))}}--}}

        <div class="form-group">
            <label for="purpose" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.purpose_Title') }} *</label>
            <div class="col-sm-3">
            <ul class="list-unstyled">
                <li>{{ Form::checkbox('purpose[]', '1')}} {{ Lang::get('formdetails.purpose_1') }}</li>
                <li>{{ Form::checkbox('purpose[]', '2') }} {{ Lang::get('formdetails.purpose_2') }}</li>
                <li>{{ Form::checkbox('purpose[]', '3') }} {{ Lang::get('formdetails.purpose_3') }}</li>
                <li>{{ Form::checkbox('purpose[]', '4') }} {{ Lang::get('formdetails.purpose_4') }}</li>
                <li>{{ Form::checkbox('purpose[]', '5') }} {{ Lang::get('formdetails.purpose_5') }}</li>
                <li>{{ Form::checkbox('purpose[]', '6') }} {{ Lang::get('formdetails.purpose_6') }}</li>
                <li>{{ Form::checkbox('purpose[]', '7') }} {{ Lang::get('formdetails.purpose_7') }}</li>
                <li>{{ Form::checkbox('purpose[]', '8') }} {{ Lang::get('formdetails.purpose_8') }}</li>
                <li>{{ Form::checkbox('purpose[]', '9') }} {{ Lang::get('formdetails.purpose_9') }}</li>
                <li>{{ Form::checkbox('purpose[]', '10') }} {{ Lang::get('formdetails.purpose_10') }}</li>
                <li>{{ Form::checkbox('purpose[]', '11') }} {{ Lang::get('formdetails.purpose_11') }}</li>
                <li>{{ Form::checkbox('purpose[]', '12') }} {{ Lang::get('formdetails.other') }} : {{
                    Form::text('purpose_other',null, array('class'=>'form-control')) }}
                </li>
            </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="target" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.target_Title') }} *</label>
            <div class="col-sm-3">
            <ul class="list-unstyled">
                <li>{{ Form::checkbox('target[]', '1') }} {{ Lang::get('formdetails.target_1') }}</li>
                <li>{{ Form::checkbox('target[]', '2') }} {{ Lang::get('formdetails.target_2') }}</li>
                <li>{{ Form::checkbox('target[]', '3') }} {{ Lang::get('formdetails.target_3') }}</li>
                <li>{{ Form::checkbox('target[]', '4') }} {{ Lang::get('formdetails.target_4') }}</li>
                <li>{{ Form::checkbox('target[]', '5') }} {{ Lang::get('formdetails.target_5') }}</li>
                <li>{{ Form::checkbox('target[]', '6') }} {{ Lang::get('formdetails.other') }} : {{
                    Form::text('target_other',null, array('class'=>'form-control')) }}
                </li>
            </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="targetAge" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.targetAge_Title') }} *</label>
            <div class="col-sm-3">
            <ul class="list-unstyled">
                <li>{{ Form::checkbox('targetAge[]', '1') }} {{ Lang::get('formdetails.targetAge_1') }}</li>
                <li>{{ Form::checkbox('targetAge[]', '2') }} {{ Lang::get('formdetails.targetAge_2') }}</li>
                <li>{{ Form::checkbox('targetAge[]', '3') }} {{ Lang::get('formdetails.targetAge_3') }}</li>
                <li>{{ Form::checkbox('targetAge[]', '4') }} {{ Lang::get('formdetails.targetAge_4') }}</li>
                <li>{{ Form::checkbox('targetAge[]', '5') }} {{ Lang::get('formdetails.targetAge_5') }}</li>
            </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="gender" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.gender_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::select('gender', array(
                '1' => Lang::get('formdetails.gender_1'),
                '2' => Lang::get('formdetails.gender_2')
            ), null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="providedInformation" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.providedInformation_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('providedInformation', null, array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="likeToSee" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.likeToSee_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('ilikeToSee', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="expectToDo" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.expectToDo_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('expectToDo', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="InternetTime" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.InternetTime_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('internetTime', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="contentFrom" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.contentFrom_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('contentFrom', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="contentUpdate" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.contentUpdate_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('contentUpdate', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="static" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.static_Title') }} *</label>
            <div class="col-sm-3">
            <ul class="list-unstyled">
                <li>{{ Form::checkbox('static[]', '1') }} {{ Lang::get('formdetails.static_1') }}</li>
                <li>{{ Form::checkbox('static[]', '2') }} {{ Lang::get('formdetails.static_2') }}</li>
                <li>{{ Form::checkbox('static[]', '3') }} {{ Lang::get('formdetails.static_3') }}</li>
                <li>{{ Form::checkbox('static[]', '4') }} {{ Lang::get('formdetails.static_4') }}</li>
                <li>{{ Form::checkbox('static[]', '5') }} {{ Lang::get('formdetails.static_5') }}</li>
                <li>{{ Form::checkbox('static[]', '6') }} {{ Lang::get('formdetails.static_6') }}</li>
                <li>{{ Form::checkbox('static[]', '7') }} {{ Lang::get('formdetails.static_7') }}</li>
                <li>{{ Form::checkbox('static[]', '8') }} {{ Lang::get('formdetails.static_8') }}</li>
                <li>{{ Form::checkbox('static[]', '9') }} {{ Lang::get('formdetails.static_9') }}</li>
                <li>{{ Form::checkbox('static[]', '10') }} {{ Lang::get('formdetails.static_10') }}</li>
                <li>{{ Form::checkbox('static[]', '11') }} {{ Lang::get('formdetails.static_11') }}</li>
                <li>{{ Form::checkbox('static[]', '12') }} {{ Lang::get('formdetails.other') }} : {{
                    Form::text('static_other', null , array('class'=>'form-control')) }}
                </li>
            </ul>
            </div>
        </div>


        <div class="form-group">
            <label for="domain" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.domain_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::select('domain', array(
            '1' => Lang::get('formdetails.domain_1'),
            '2' => Lang::get('formdetails.domain_2'))
            , null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="noDomain" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.noDomain_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::text('noDomain', null , array('class'=>'form-control')) }}
            </div>
        </div>


        <div class="form-group">
            <label for="artwork" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.artwork_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::select('artwork', array(
                '1' => Lang::get('formdetails.artwork_1'),
                '2' => Lang::get('formdetails.artwork_2'),
                '3' => Lang::get('formdetails.artwork_3'),
            ), null , array('class'=>'form-control')) }}
            </div>
        </div>


        <div class="form-group">
            <label for="color" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.color_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::text('color', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="websiteStyle" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.websiteStyle_Title') }} *</label>
            <div class="col-sm-3">
            <ul class="list-unstyled">
                <li>{{ Form::checkbox('websiteStyle[]', '1') }} {{ Lang::get('formdetails.websiteStyle_1') }}</li>
                <li>{{ Form::checkbox('websiteStyle[]', '2') }} {{ Lang::get('formdetails.websiteStyle_2') }}</li>
                <li>{{ Form::checkbox('websiteStyle[]', '3') }} {{ Lang::get('formdetails.websiteStyle_3') }}</li>
                <li>{{ Form::checkbox('websiteStyle[]', '4') }} {{ Lang::get('formdetails.websiteStyle_4') }}</li>
                <li>{{ Form::checkbox('websiteStyle[]', '5') }} {{ Lang::get('formdetails.websiteStyle_5') }}</li>
                <li>{{ Form::checkbox('websiteStyle[]', '6') }} {{ Lang::get('formdetails.websiteStyle_6') }}</li>
                <li>{{ Form::checkbox('websiteStyle[]', '12') }} {{ Lang::get('formdetails.other') }} : {{
                    Form::text('websiteStyle_other', null , array('class'=>'form-control')) }}
                </li>
            </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="device" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.device_Title') }} *</label>
            <div class="col-sm-3">
            <ul class="list-unstyled">
                <li>{{ Form::checkbox('device[]', '1') }} {{ Lang::get('formdetails.device_1') }}</li>
                <li>{{ Form::checkbox('device[]', '2') }} {{ Lang::get('formdetails.device_2') }}</li>
                <li>{{ Form::checkbox('device[]', '3') }} {{ Lang::get('formdetails.device_3') }}</li>
                <li>{{ Form::checkbox('device[]', '4') }} {{ Lang::get('formdetails.device_4') }}</li>

            </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="effective" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.effective_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('effective', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="pleasing" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.pleasing_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('pleasing', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="dynamic" class="col-sm-3 control-label" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.dynamic_Title') }} *</label>
            <div class="col-sm-3">
            <ul class="list-unstyled">
                <li>{{ Form::checkbox('dynamic[]', '1') }} {{ Lang::get('formdetails.dynamic_1') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '2') }} {{ Lang::get('formdetails.dynamic_2') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '3') }} {{ Lang::get('formdetails.dynamic_3') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '4') }} {{ Lang::get('formdetails.dynamic_4') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '5') }} {{ Lang::get('formdetails.dynamic_5') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '6') }} {{ Lang::get('formdetails.dynamic_6') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '7') }} {{ Lang::get('formdetails.dynamic_7') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '8') }} {{ Lang::get('formdetails.dynamic_8') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '9') }} {{ Lang::get('formdetails.dynamic_9') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '10') }} {{ Lang::get('formdetails.dynamic_10') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '11') }} {{ Lang::get('formdetails.dynamic_11') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '12') }} {{ Lang::get('formdetails.dynamic_12') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '13') }} {{ Lang::get('formdetails.dynamic_13') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '14') }} {{ Lang::get('formdetails.dynamic_14') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '15') }} {{ Lang::get('formdetails.dynamic_15') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '16') }} {{ Lang::get('formdetails.dynamic_16') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '17') }} {{ Lang::get('formdetails.dynamic_17') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '18') }} {{ Lang::get('formdetails.dynamic_18') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '19') }} {{ Lang::get('formdetails.dynamic_19') }}</li>
                <li>{{ Form::checkbox('dynamic[]', '20') }} {{ Lang::get('formdetails.other') }} : {{
                    Form::text('dynamic_other', null , array('class'=>'form-control')) }}
                </li>
            </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="budget" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.budget_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::text('budget', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="knowledge" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.knowledge_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::select('knowledge', array(
            '1' => Lang::get('formdetails.knowledge_1'),
            '2' => Lang::get('formdetails.knowledge_2'),
            '3' => Lang::get('formdetails.knowledge_3'),
            '4' => Lang::get('formdetails.knowledge_4'),
            ), null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="date" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.date_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::text('date', null , array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="question" class="col-sm-3 control-label">{{ Lang::get( 'formdetails.question_Title') }} *</label>
            <div class="col-sm-3">
            {{ Form::textarea('question', null , array('class'=>'form-control')) }}
            </div>
        </div>


        {{--<div class="col-sm-9 col-sm-offset-3">
            {{Form::submit('Submit', array('class'=>'btn btn-primary'))}}
        </div>

        {{Form::close()}}
    </div>
</div>--}}


