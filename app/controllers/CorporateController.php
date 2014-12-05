<?php

class CorporateController extends \BaseController {
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
        $this->beforeFilter('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::User()->hasRole("Admin")){
			$corporates = Corporate::all();
		}
		else{
			$corporates = Auth::user()->corporate;
		}
        return View::make('backend.corporate.list')->withDatas($corporates);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if (!Auth::User()->hasRole('Admin')) {
            return Redirect::action('HomeController@indexBackend')->withError(Lang::get('messages.error_accessrights'));
        }

		return View::make('backend.corporate.create')->withCorporate('');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'name' => 'required','unique:corporates',
            'address' => 'required',
            'phone' => 'numeric',
            'email' => 'email',
        );

        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails())
        {
            if(Input::get('request_corporate') == 1){
                return Redirect::action('CorporateController@request_corporate')->withErrors($validator)->withInput();
            }else{
                return Redirect::action('CorporateController@create')->withErrors($validator)->withInput();
            }
            
        }
        else{
            $input = new Corporate();
            $input->name = Input::get('name');
            $input->address = Input::get('address');
            $input->email = Input::get('email');
            $input->phone = Input::get('phone');
            if(Auth::user()->hasRole('Admin')){
                $input->confirmed = TRUE;
            }
            else{
                $input->confirmed = FALSE;
                $user = User::findOrFail(Auth::user()->id);
                $user->request_corporate = TRUE;
                $user->update();
            }
            $input->save();

            if(Auth::user()->hasRole('Admin')){

                //start send activity to message & email
                $currentuser = Auth::User();

                $messagedata = array(
                    'name'                  =>  $currentuser->name,
                    'email'                 =>  $currentuser->email,
                    'user_id'               =>  $currentuser->id,
                    'admin'                 => FALSE,
                    'message'               =>  $currentuser->name.Lang::get('company.created_new'),
                    'email_user'            => '',
                    'email_admin'            => [
                        'h4'       =>  Lang::get('email.hello').'Admin,',
                        'TopText'  =>  NULL,
                        'MiddleText' => $currentuser->name.Lang::get('company.created_new'),
                        'Link' => NULL,
                        'BottomText' => NULL,
                        'user_id' =>  Hashids::encode($currentuser->id),
                    ],
                );

                $repo = App::make('CommonFunctions');
                $repo->add($messagedata);
                //end send activity to message & email

                return Redirect::action('CorporateController@index')->withMsg(Lang::get('messages.success_store'));
            }
            else{

                //start send activity to message & email
                $currentuser = Auth::User();

                $messagedata = array(
                    'name'                  =>  $currentuser->name,
                    'email'                 =>  $currentuser->email,
                    'user_id'               =>  $currentuser->id,
                    'admin'                 => FALSE,
                    'message'               =>  $currentuser->name.Lang::get('email.has_request').Input::get('name'),
                    'email_user'            => [
                        'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                        'TopText'  =>  Lang::get('email.new_activity'),
                        'MiddleText' => $currentuser->name.Lang::get('email.has_request').Input::get('name'),
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

                return Redirect::action('CorporateController@request_corporate')->withMsg(Lang::get('messages.success_store'));
            }
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $id = Hashids::decode($id)[0];
        $currentuser = Auth::User();
        if (!$currentuser->hasRole('Admin') && $currentuser->corporate != Project::findOrFail($id)->corporate){
            return Redirect::action('HomeController@indexBackend')->withError(Lang::get('messages.error_accessrights'));
        }
        $corporate = Corporate::findOrFail($id);
        return View::make('backend.corporate.edit')->withCorporate($corporate);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $id = Hashids::decode($id)[0];
        $rules = array(
            'name' => 'required|unique:corporates,name' . ($id ? ",$id" : ''),
            'email' => 'required|email|unique:corporates,email' . ($id ? ",$id" : ''),
            'phone' => 'numeric|unique:corporates,phone'. ($id ? ",$id" : ''),
        );

        $validator = Validator::make(Input::all(),$rules);
        if($validator -> fails())
        {
            return Redirect::action('CorporateController@edit',Hashids::encode($id))->withErrors($validator)->withInput();
        }
        else{
            $input = Corporate::findOrFail($id);
            $input->name = Input::get('name');
            $input->address = Input::get('address');
            $input->email = Input::get('email');
            $input->phone = Input::get('phone');
            $input->update();

            //start send activity to message & email
            $currentuser = Auth::User();

            $messagedata = array(
                'name'                  =>  $currentuser->name,
                'email'                 =>  $currentuser->email,
                'user_id'               =>  $currentuser->id,
                'admin'                 => FALSE,
                'message'               =>  $currentuser->name.Lang::get('company.updated_company').$input->name,
                'email_user'            => [
                    'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                    'TopText'  =>  Lang::get('email.new_activity'),
                    'MiddleText' => $currentuser->name.Lang::get('company.updated_company').$input->name,
                    'Link' => NULL,
                    'BottomText' => NULL,
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
                'email_admin'            => [
                    'h4'       =>  Lang::get('email.hello').'Admin,',
                    'TopText'  =>  Lang::get('email.activity_from').$currentuser->name.' :',
                    'MiddleText' => $currentuser->name.Lang::get('company.updated_company').$input->name,
                    'Link' => NULL,
                    'BottomText' => NULL,
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
            );

            $repo = App::make('CommonFunctions');
            $repo->add($messagedata);
            //end send activity to message & email

            return Redirect::action('CorporateController@index')->withMsg(Lang::get('messages.success_update'));
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $id = Hashids::decode($id)[0];
        $input = Corporate::findOrFail($id);

        if (!Auth::User()->hasRole('Admin') && $currentuser->corporate != $id){
            return Redirect::action('HomeController@indexBackend')->withError(Lang::get('messages.error_accessrights'));
        }
        
        Corporate::findOrFail($id)->delete();

        //start send activity to message & email
        $currentuser = Auth::User();

        $messagedata = array(
            'name'                  =>  $currentuser->name,
            'email'                 =>  $currentuser->email,
            'user_id'               =>  $currentuser->id,
            'admin'                 => FALSE,
            'message'               =>  $currentuser->name.Lang::get('company.deleted_company').$input->name,
            'email_user'            => '',
            'email_admin'            => [
                'h4'       =>  Lang::get('email.hello').'Admin,',
                'TopText'  =>  Lang::get('email.have_message'),
                'MiddleText' => $currentuser->name.Lang::get('company.deleted_company').$input->name,
                'Link' => NULL,
                'BottomText' => NULL,
                'user_id' =>  Hashids::encode($currentuser->id),
            ],
        );

        $repo = App::make('CommonFunctions');
        $repo->add($messagedata);
        //end send activity to message & email

        return Redirect::action('CorporateController@index')->withMsg(Lang::get('messages.success_destroy'));
	}

	public function request_corporate()
	{
        $corporates = Corporate::all();
		return View::make('backend.corporate.request_corporate')->withCorporates($corporates);
	}

    public function store_request_corporate(){

        //begin validate
        /*$rules = array
        (
            'message' => array('required'),
        );

        //Validate the entries
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::action('CorporateController@request_corporate')->withErrors($validator)->withInput();
        }*/

        $currentuser = Auth::User();

        $messagedata = array(
            'name'                  =>  $currentuser->name,
            'email'                 =>  $currentuser->email,
            'user_id'               =>  $currentuser->id,
            'admin'                 =>  FALSE,
            'message'               =>  $currentuser->name.Lang::get('email.has_request').Input::get('corporate_name'),
            'email_user'            => [
                'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                'TopText'  =>  Lang::get('email.new_activity'),
                'MiddleText' => $currentuser->name.Lang::get('email.has_request').Input::get('corporate_name'),
                'Link' => NULL,
                'BottomText' => Lang::get('email.ensure'),
                'user_id' =>  Hashids::encode($currentuser->id),
            ],
            'email_admin'            => [
                'h4'       =>  Lang::get('email.hello').'Admin,',
                'TopText'  =>  Lang::get('email.activity_from').$currentuser->name.' :',
                'MiddleText' => $currentuser->name.Lang::get('email.has_request').Input::get('corporate_name'),
                'Link' => NULL,
                'BottomText' => NULL,
                'user_id' =>  Hashids::encode($currentuser->id),
            ],
        );

        //Run add function from the CommonFunction Class
        $repo = App::make('CommonFunctions');
        $repo->add($messagedata);

        $user = User::findOrFail(Auth::user()->id);
        $user->request_corporate = TRUE;
        $user->update();

        return Redirect::action('HomeController@indexBackend')->withMsg(Lang::get('messages.success_store'));    }

}
