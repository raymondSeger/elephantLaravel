<?php

class HomeController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function contactFormSubmit()
    {

        //Check the content with filters
        $rules = array
        (
            //follow the same set of rules as Confide
            'email' => array('required', 'email'),
            'message' => array('required'),
            'name' => array('required'),
            'phone' => array('numeric'),
        );

        //Validate the entries
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $url = URL::route('home') . '#contact';
            return Redirect::to($url)->withErrors($validator)->withInput();
        }

        // Check if the email exists - if not instantiate a new user
        $user = User::firstOrNew(array('email' => Input::get('email')));

        if (is_null(($user->id))) {

            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->username = preg_replace("/[^a-z0-9\s\-]/i", "-", Input::get('email'));
            $user->phone_mobile = Input::get('phone');
            $user->confirmation_code = md5(uniqid(mt_rand(), true));
            //The user is already confirmed since he will get his login details from email
            $user->confirmed = TRUE;
            //Generate a 6 digit random password for the user
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randompassword = '';
            for ($i = 0; $i < 6; $i++) {
                $randompassword .= $characters[rand(0, strlen($characters) - 1)];
            }
            $user->password = $randompassword;

            //password_confirmation required by confide
            $user->password_confirmation = $randompassword;
            $user->save();

            $toptext = Lang::get('email.account_created').'<br /><br />'.Lang::get('email.username').'<b>'.$user->username.'</b>'.Lang::get('email.registered_email').'<br />'.
                Lang::get('email.your_password').'<b>'.$randompassword.'</b>'.'<br /><br />'.Lang::get('email.history_msg');

        } else {
            // Prepare custom message and email for the user - He needs to reset his password
            $toptext = Lang::get('email.toptext');
        }

        $messagedata = array(
            'name'                  =>  $user->name,
            'email'                 =>  $user->email,
            'user_id'               =>  $user->id,
            'message'               =>  Input::get('message'),
            'admin'                 =>  FALSE,
            'email_user'            => [
                'h4'       =>  Lang::get('email.hello'). Input::get('name') .',',
                'TopText'  =>  $toptext,
                'MiddleText' => Lang::get('email.access'),
                'Link' => url('/users/login/'),
                'BottomText' => NULL,
                'user_id' =>  Hashids::encode($user->id),
            ],
            'email_admin'            => [
                'h4'       =>  Lang::get('email.hello').' Admin,',
                'TopText'  =>  Lang::get('email.activity_from').$user->name,
                'MiddleText' => $user->name.Lang::get('email.join'),
                'Link' => "http://www.vitajaya.com/message/". Hashids::encode($user->id),
                'BottomText' => Lang::get('email.contact_form'). ": " . Input::get('message'),
                'user_id' =>  Hashids::encode($user->id),
            ],
        );


        //Run add function from the CommonFunction Class
        $repo = App::make('CommonFunctions');
        $repo->add($messagedata);

        $url = URL::route('home') . '#contact';
        return Redirect::to($url)->withMsg(Lang::get('email.new_user_with_mail'));

    }

    public function indexBackend()
    {
        $currentuser = Auth::user();
        return View::make('backend.index')->withUser($currentuser);
    }
}
