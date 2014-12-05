<?php

class MessageController extends \BaseController
{

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
        $this->beforeFilter('auth');
    }

    /**
     * Display a listing of all the messages for the user
     * If it is admin, have the list of all messages where the status is not read not sent by an admin
     *
     * @return Response
     */
    public function index()
    {
        // need to display better with dropdown menu
        $currentuser = Auth::user();
        if ($currentuser->HasRole('Admin')) {

            $messages = DB::select("SELECT m.updated_at,
                m.user_id,
                u.username,
                COUNT(message) AS count_msg,
                COUNT(CASE WHEN unread_admin = '1' THEN TRUE END) AS unread_admin
                FROM messages m, users u
                WHERE m.user_id = u.id
                GROUP BY m.user_id");
            return View::make('backend.message.all')->withMessages($messages);
        }
    }


    /**
     * Show the form for creating a new resource. (same form will be added as part of the index)
     *
     * @return Response
     */
    public function create()
    {
        $currentuser = Auth::User();
        return View::make('backend.message.partials._create')->withUser($currentuser);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //begin validate
        $rules = array
        (
            'message' => array('required'),
        );

        //Validate the entries
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            if(Input::get('request_corporate') == 1){
                return Redirect::action('CorporateController@request_corporate')->withErrors($validator)->withInput();
            }else{
                return Redirect::action('MessageController@show',Input::get('user_id'))->withErrors($validator)->withInput();
            }
        }

        //check the message user
        if (Auth::User()->HasRole('Admin')) {
            $currentuser = User::findorFail(Hashids::decode(Input::get('user_id'))[0]);

            $messagedata = array(
                'name'                  =>  $currentuser->name,
                'email'                 =>  $currentuser->email,
                'user_id'               =>  $currentuser->id,
                'admin'                 =>  TRUE,
                'message'               =>  Input::get('message'),
                'email_user'            => [
                    'h4'       =>  Lang::get('email.hello').$currentuser->name.',',
                    'TopText'  =>  Lang::get('email.vitajaya_msg'),
                    'MiddleText' => Input::get('message').'<br /><br />'.Lang::get('email.for_reply'),
                    'Link' => url('/message/'.Hashids::encode($currentuser->id)),
                    'BottomText' => NULL,
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
                'email_admin'            => '',
            );

        } else {
            $currentuser = Auth::User();

            $messagedata = array(
                'name'                  =>  $currentuser->name,
                'email'                 =>  $currentuser->email,
                'user_id'               =>  $currentuser->id,
                'admin'                 =>  FALSE,
                'message'               =>  Input::get('message'),
                'email_user'            => '',
                'email_admin'            => [
                    'h4'       =>  Lang::get('email.hello').'Admin,',
                    'TopText'  =>  $currentuser->name.Lang::get('email.leave_msg'),
                    'MiddleText' => Input::get('message').'<br /><br />'.Lang::get('email.for_reply'),
                    'Link' => url('/message/'.Hashids::encode($currentuser->id)),
                    'BottomText' => NULL,
                    'user_id' =>  Hashids::encode($currentuser->id),
                ],
            );
        }

        //Run add function from the CommonFunction Class
        $repo = App::make('CommonFunctions');
        $repo->add($messagedata);

        return Redirect::action('MessageController@show', array('id' => Hashids::encode($currentuser->id)))->withMsg(Lang::get('messages.success_store'));
        
    }

    /**
     * Only for admin -> to see the content of a particular conversation with a given user
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {   
        $id = Hashids::decode($id)[0];
        $currentuser = User::with('messages')->findOrFail($id);

        if (!Auth::User()->hasRole('Admin') && Auth::User()->id != $id){
            return Redirect::action('HomeController@indexBackend')->withError(Lang::get('messages.error_accessrights'));
        }

        if(Auth::user()->hasRole('Admin'))
            Message::where('user_id', '=', $id)->update(array('unread_admin' => 0));
        else
            Message::where('user_id', '=', $id)->update(array('unread_client' => 0));

        return View::make('backend.message.index')
            ->withMessages($currentuser->messages)
            ->withUser($currentuser);
    }


    /**
     * Message can't be edited
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage / to be performed by Admin only
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id = Hashids::decode($id)[0];
        Message::findOrFail($id)->delete();
        return Redirect::action('MessageController@index')->withMsg(Lang::get('messages.success_destroy'));
    }
}
