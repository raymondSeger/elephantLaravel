<?php

class UserController extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
        $this->beforeFilter('auth');
    }

    public function index()
    {
        $datas = User::with('corporate')->get();
        return View::make('backend.user.list_user')->withDatas($datas);
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

        #for localization
        foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
            $langs[$key] = $value['native'];
        }

        // Prepare the arrays for drop down list
        $corporates = Corporate::lists('name', 'id');
        $corporates = array(0 => 'No Company') + $corporates; #set array 0

        $roles = Role::lists('name','id');

        return View::make('backend.user.create_user')
            ->withUsers(Auth::User())
            ->withCorporates($corporates)
            ->withRoles($roles)
            ->withId(0)
            ->withLangs($langs);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (!Auth::User()->hasRole('Admin')) {
            return View::make('backend.index')->withError(Lang::get('messages.error_accessrights'));
        }
        //begin validate
        $rules = array(
            'email' => array('required', 'email', 'unique:users'),
            'username' => array('required', 'unique:users'),
            'password' => array('required', 'confirmed', 'min:4'),
            'phone_mobile' => array('numeric'),
            'phone_extension' => array('numeric'),
        );

        //pass all input to validator
        $validator = Validator::make(Input::all(), $rules);

        //condition when input fails
        if ($validator->fails()) {
            return Redirect::action('UserController@create')->withErrors($validator)->withInput();
        }

        //$roleid = Hashids::decode(Input::get('role_id'))[0];
        //$corporateid = Hashids::decode(Input::get('corporate_id'))[0];

        $input = new User();
        $input->corporate_id = Input::get('corporate_id');
        $input->name = Input::get('name');
        $input->email = Input::get('email');
        $input->phone_mobile = Input::get('phone_mobile');
        $input->phone_extension = Input::get('phone_extension');
        $input->lang = Input::get('lang');
        $input->username = Input::get('username');
        $input->password = Input::get('password');
        $input->password_confirmation = Input::get('password_confirmation');
        $input->confirmed = 1;
        $input->save();

        //attach the role into the pivot table
        $input->roles()->attach(Input::get('role_id'));

        return Redirect::action('UserController@index')->withMsg(Lang::get('messages.success_store'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

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
        $user = User::with('corporate')->findOrFail($id);

        #for localization
        foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
            $langs[$key] = $value['native'];
        }
        
        if (Auth::User()->hasRole('Admin')) {

            // Prepare the arrays for drop down list
            $corporates = Corporate::lists('name', 'id');
            $corporates = array(0 => 'No Company') + $corporates; #set array 0

            $roles = Role::lists('name','id');

            return View::make('backend.user.edit_user')
                ->withUsers($user)
                ->withCorporates($corporates)
                ->withRoles($roles)
                ->withId($id)
                ->withLangs($langs);
        } else {
            if (Auth::User()->id != $id) {
                return Redirect::action('HomeController@indexBackend')->withError(Lang::get('messages.error_accessrights'));
            }
            $corporate = $user->corporate;
            return View::make('backend.user.edit_user')
                ->withUsers($user)
                ->withCorporate($corporate)
                ->withLangs($langs);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $id = Hashids::decode($id)[0];
        $currentuser = User::findorFail($id);

        //begin validate
        $rules = array(
            'email' => 'required|unique:users,email' . ($id ? ",$id" : ''),
            'username' => 'required|unique:users,username' . ($id ? ",$id" : ''),
            'phone_mobile' => 'required|unique:users,phone_mobile' . ($id ? ",$id" : ''),
            'phone_extension' => array('numeric'),
        );

        //if email is modified, keep in mind that it is required to re-confirm the email except if the user is admin
        if (Input::get('email') <> $currentuser->email) {
            $rules['email'] = array('required', 'email', 'unique:users');
        }

        if (Input::get('username') <> $currentuser->username) {
            $rules['username'] = array('required', 'unique:users');
        }

        if (Input::get('password') <> '') {
            if (!Auth::User()->HasRole('Admin') && !Hash::check(Input::get('old_password'), $currentuser->password)) {
                return Redirect::action('UserController@edit', Hashids::encode($currentuser->id))->withError(Lang::get('notice.old_password_wrong'))->withInput();
            }
            $rules['password'] = array('required', 'confirmed', 'min:4');
        }

        //pass all input to validator
        $validator = Validator::make(Input::all(), $rules);


        //condition when input fails
        if ($validator->fails()) {
            return Redirect::action('UserController@edit', Hashids::encode($currentuser->id))->withErrors($validator)->withInput();
        }

        $currentuser->name = Input::get('name');
        $currentuser->email = Input::get('email');
        $currentuser->phone_mobile = Input::get('phone_mobile');
        $currentuser->phone_extension = Input::get('phone_extension');
        $currentuser->lang = Input::get('lang');
        $currentuser->subscribed = Input::get('subscribed');
        if (Auth::User()->HasRole('Admin')) {
            $currentuser->corporate_id = Input::get('corporate_id');
            $roleid = Input::get('role_id');
            //attach the role into the pivot table
            $currentuser->roles()->detach();
            $currentuser->roles()->attach($roleid);
        }
        if (Input::get('password') <> '') {
            $currentuser->password = Input::get('password');
            $currentuser->password_confirmation = Input::get('password_confirmation');
        }
        $currentuser->username = Input::get('username');
        $currentuser->save();

        //start send activity to message & email
        if (Auth::User()->HasRole('Admin')) {
            $messagedata = array(
                'name'                  =>  $currentuser->name,
                'email'                 =>  $currentuser->email,
                'user_id'               =>  $currentuser->id,
                'admin'                 => TRUE,
                'message'               =>  Lang::get('email.update_profile_by_admin'),
                'email_user'            => [
                    'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                    'TopText'  =>  Lang::get('email.new_activity'),
                    'MiddleText' => Lang::get('email.update_profile_by_admin'),
                    'Link' => NULL,
                    'BottomText' => NULL,
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
                'email_admin'            => '',
            );
        }else{
            $messagedata = array(
                'name'                  =>  $currentuser->name,
                'email'                 =>  $currentuser->email,
                'user_id'               =>  $currentuser->id,
                'admin'                 => FALSE,
                'message'               =>  $currentuser->name.Lang::get('email.update_profile'),
                'email_user'            => [
                    'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                    'TopText'  =>  Lang::get('email.new_activity'),
                    'MiddleText' => $currentuser->name.Lang::get('email.update_profile'),
                    'Link' => NULL,
                    'BottomText' => Lang::get('email.ensure'),
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
                'email_admin'            => [
                    'h4'       =>  Lang::get('email.hello').'Admin,',
                    'TopText'  =>  Lang::get('email.activity_from').$currentuser->name,
                    'MiddleText' => $currentuser->name.Lang::get('email.update_profile'),
                    'Link' => NULL,
                    'BottomText' => NULL,
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
            );
        }

        $repo = App::make('CommonFunctions');
        $repo->add($messagedata);
        //end send activity to message & email
        if(!Auth::Guest() && Auth::User()->lang != NULL){
            LaravelLocalization::setLocale(Input::get('lang'));
        }
        //return Redirect::action('HomeController@indexBackend')->withMsg(Lang::get('messages.success_update'));
        return Redirect::intended('/homepage')->withMsg(Lang::get('messages.success_update'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if (!Auth::User()->hasRole('Admin')) {
            return View::make('backend.index')->withError(Lang::get('messages.error_accessrights'));
        }

        $id = Hashids::decode($id)[0];
        $input = User::findOrFail($id);
        User::findOrFail($id)->delete();

        return Redirect::action('UserController@index')->withMsg(Lang::get('messages.success_destroy'));
    }

    public function unsubscribed($id){
        $id = Hashids::decode($id)[0];
        $input = User::findOrFail($id);
        $input->subscribed = FALSE;
        $input->update();

        return View::make('email.unsubscribed')->withUnsubscribed('unsubscribed')->withUser_id($id);
    }

}
