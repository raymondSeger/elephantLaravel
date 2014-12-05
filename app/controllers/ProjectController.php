<?php

class ProjectController extends \BaseController
{

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
        $this->beforeFilter('auth');

        //$this->beforeFilter('admin_role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $currentuser = Auth::User();
        if ($currentuser->hasRole("Admin")) {
            $projects = Project::with('corporate')->get();
            $corporate = "";
        } else {
            $projects = $currentuser->corporate->projects;
            $corporate = $currentuser->corporate;
        }
        return View::make('backend.project.list')->withDatas($projects)->withCorporate($corporate);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
        if (Auth::User()->hasRole("Admin")) {

            // Prepare the arrays for drop down list
            $corporates = Corporate::lists('name', 'id');

        } else {
            $corporates = Auth::User()->corporate;
        }
        return View::make('backend.project.create')
            ->withCorporates($corporates);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //begin validate
        $rules = array(
            'name' => array('required', 'unique:projects'),
            'url' => array('unique:projects','active_url'),
        );

        //pass all input to validator
        $validator = Validator::make(Input::all(), $rules);

        //condition when input fails
        if ($validator->fails()) {
            return Redirect::action('ProjectController@create')->withErrors($validator)->withInput();
        } else {
            $input = new Project();
            $input->corporate_id = Input::get('corporate_id');
            $input->name = Input::get('name');
            $input->url = Input::get('url');
            $input->purpose = json_encode(Input::get('purpose'));
            $input->purpose_other = Input::get('purpose_other');
            $input->target = json_encode(Input::get('target'));
            $input->target_other = Input::get('target_other');
            $input->targetAge = json_encode(Input::get('targetAge'));
            $input->gender = Input::get('gender');
            $input->providedInformation = Input::get('providedInformation');
            $input->ilikeToSee = Input::get('ilikeToSee');
            $input->expectToDo = Input::get('expectToDo');
            $input->internetTime = Input::get('internetTime');
            $input->contentFrom = Input::get('contentFrom');
            $input->contentUpdate = Input::get('contentUpdate');
            $input->static = json_encode(Input::get('static'));
            $input->static_other = Input::get('static_other');
            $input->domain = Input::get('domain');
            $input->noDomain = Input::get('noDomain');
            $input->artwork = Input::get('artwork');
            $input->color = Input::get('color');
            $input->websiteStyle = json_encode(Input::get('websiteStyle'));
            $input->websiteStyle_other = Input::get('websiteStyle_other');
            $input->device = json_encode(Input::get('device'));
            $input->effective = Input::get('effective');
            $input->pleasing = Input::get('pleasing');
            $input->dynamic = json_encode(Input::get('dynamic'));
            $input->dynamic_other = Input::get('dynamic_other');
            $input->budget = Input::get('budget');
            $input->knowledge = Input::get('knowledge');
            $input->date = Input::get('date');
            $input->question = Input::get('question');
            $input->save();

            //start send activity to message & email
            $currentuser = Auth::User();

            $messagedata = array(
                'name'                  =>  $currentuser->name,
                'email'                 =>  $currentuser->email,
                'user_id'               =>  $currentuser->id,
                'admin'                 => FALSE,
                'message'               =>  $currentuser->name.Lang::get('email.new_project').Input::get('name'),
                'email_user'            => [
                    'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                    'TopText'  =>  Lang::get('email.new_activity'),
                    'MiddleText' => $currentuser->name.Lang::get('email.new_project').Input::get('name'),
                    'Link' => NULL,
                    'BottomText' => Lang::get('email.ensure'),
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
                'email_admin'            => [
                    'h4'       =>  Lang::get('email.hello').'Admin,',
                    'TopText'  =>  Lang::get('email.activity_from').$currentuser->name,
                    'MiddleText' => $currentuser->name.Lang::get('email.new_project').Input::get('name'),
                    'Link' => NULL,
                    'BottomText' => NULL,
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
            );

            $repo = App::make('CommonFunctions');
            $repo->add($messagedata);
            //end send activity to message & email

            return Redirect::action('ProjectController@index')->withMsg(Lang::get('notice.project_inserted'));
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];
        $currentuser = Auth::User();

        if (!$currentuser->HasRole('Admin') && $currentuser->corporate != Project::findorFail($id)->corporate) {
            return View::make('backend.index')->withError(Lang::get('messages.error_accessrights'));
        }


        $project = Project::with('corporate')->findOrFail($id);
        $project->purpose = json_decode($project->purpose);
        $project->target = json_decode($project->target);
        $project->targetAge = json_decode($project->targetAge);
        $project->static = json_decode($project->static);
        $project->websiteStyle = json_decode($project->websiteStyle);
        $project->device = json_decode($project->device);
        $project->dynamic = json_decode($project->dynamic);

        // Prepare the arrays for drop down list
        $corporates = Corporate::lists('name', 'id');

        return View::make('backend.project.edit')
            ->withProject($project)
            ->withCorporates($corporates);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $currentuser = Auth::user();
        $id = Hashids::decode($id)[0];
        //if the user is not admin check that the project belongs to him:
        if ($currentuser->HasRole('Admin') || $currentuser->corporate == Project::findorFail($id)->corporate) {

            //begin validate
            $rules = array(
                'name' => 'required|unique:projects,name' . ($id ? ",$id" : ''),
                'url'  => 'required|active_url',
            );

            //pass all input to validator
            $validator = Validator::make(Input::all(), $rules);

            //condition when input fails
            if ($validator->fails()) {
                return Redirect::action('ProjectController@edit', Hashids::encode($id))->withErrors($validator)->withInput();
            } else {
                $input = Project::findOrFail($id);
                $input->corporate_id = Input::get('corporate_id');
                $input->name = Input::get('name');
                $input->url = Input::get('url');
                $input->purpose = json_encode(Input::get('purpose'));
                $input->purpose_other = Input::get('purpose_other');
                $input->target = json_encode(Input::get('target'));
                $input->target_other = Input::get('target_other');
                $input->targetAge = json_encode(Input::get('targetAge'));
                $input->gender = Input::get('gender');
                $input->providedInformation = Input::get('providedInformation');
                $input->ilikeToSee = Input::get('ilikeToSee');
                $input->expectToDo = Input::get('expectToDo');
                $input->internetTime = Input::get('internetTime');
                $input->contentFrom = Input::get('contentFrom');
                $input->contentUpdate = Input::get('contentUpdate');
                $input->static = json_encode(Input::get('static'));
                $input->static_other = Input::get('static_other');
                $input->domain = Input::get('domain');
                $input->noDomain = Input::get('noDomain');
                $input->artwork = Input::get('artwork');
                $input->color = Input::get('color');
                $input->websiteStyle = json_encode(Input::get('websiteStyle'));
                $input->websiteStyle_other = Input::get('websiteStyle_other');
                $input->device = json_encode(Input::get('device'));
                $input->effective = Input::get('effective');
                $input->pleasing = Input::get('pleasing');
                $input->dynamic = json_encode(Input::get('dynamic'));
                $input->dynamic_other = Input::get('dynamic_other');
                $input->budget = Input::get('budget');
                $input->knowledge = Input::get('knowledge');
                $input->date = Input::get('date');
                $input->question = Input::get('question');
                $input->update();

                //start send activity to message & email
                $currentuser = Auth::User();

                $messagedata = array(
                    'name'                  =>  $currentuser->name,
                    'email'                 =>  $currentuser->email,
                    'user_id'               =>  $currentuser->id,
                    'admin'                 => FALSE,
                    'message'               =>  $currentuser->name.Lang::get('email.update_project').Input::get('name'),
                    'email_user'            => [
                        'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                        'TopText'  =>  Lang::get('email.new_activity'),
                        'MiddleText' => $currentuser->name.Lang::get('email.update_project').Input::get('name'),
                        'Link' => NULL,
                        'BottomText' => Lang::get('email.ensure'),
                        'user_id' =>  Hashids::encode($currentuser->id),
                    ],
                    'email_admin'            => [
                        'h4'       =>  Lang::get('email.hello').'Admin,',
                        'TopText'  =>  Lang::get('email.activity_from').$currentuser->name,
                        'MiddleText' => $currentuser->name.Lang::get('email.update_project').Input::get('name'),
                        'Link' => NULL,
                        'BottomText' => NULL,
                        'user_id' =>  Hashids::encode($currentuser->id),
                    ],
                );

                $repo = App::make('CommonFunctions');
                $repo->add($messagedata);
                //end send activity to message & email

                return Redirect::action('ProjectController@index')->withMsg(Lang::get('notice.project_updated'));
            }


        } else {
            return Redirect::action('ProjectController@index')->withMsg(Lang::get('notice.project_right'));
        }

        if ($validator->fails()) {
            return Redirect::action('MessageController@show',Input::get('user_id'))->withErrors($validator)->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id = Hashids::decode($id)[0];
        $input = Project::findOrFail($id);
        Project::findOrFail($id)->delete();

        //start send activity to message & email
        $currentuser = Auth::User();

        $messagedata = array(
            'name'                  =>  $currentuser->name,
            'email'                 =>  $currentuser->email,
            'user_id'               =>  $currentuser->id,
            'admin'                 => FALSE,
            'message'               =>  $currentuser->name.Lang::get('email.delete_project').Input::get('name'),
            'email_user'            => [
                'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                'TopText'  =>  Lang::get('email.new_activity'),
                'MiddleText' => $currentuser->name.Lang::get('email.delete_project').Input::get('name'),
                'Link' => NULL,
                'BottomText' => Lang::get('email.ensure'),
                'user_id' =>  Hashids::encode($currentuser->id),
            ],
            'email_admin'            => [
                'h4'       =>  Lang::get('email.hello').'Admin,',
                'TopText'  =>  Lang::get('email.activity_from').$currentuser->name,
                'MiddleText' => $currentuser->name.Lang::get('email.delete_project').Input::get('name'),
                'Link' => NULL,
                'BottomText' => NULL,
                'user_id' =>  Hashids::encode($currentuser->id),
            ],
        );

        $repo = App::make('CommonFunctions');
        $repo->add($messagedata);
        //end send activity to message & email

        return Redirect::action('ProjectController@index')->withMsg(Lang::get('notice.project_deleted'));
    }


}
