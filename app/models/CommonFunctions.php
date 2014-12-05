<?php



/**

 */
class CommonFunctions
{
    /**
     * add the message to the db and send emails function - No verefication is done there !!
     * @param  array $messagedata (
     * @return void
     */
    public function add($messagedata)
    {
        //add the message
        $message = New Message();
        $message->user_id = $messagedata['user_id'];
        $message->message = $messagedata['message'];
        $message->admin = $messagedata['admin'];
        $message->save();

        if(Auth::user() != ""){
            if(Auth::user()->subscribed == 1 && $messagedata['email_user'] != ''){
                // Queue the mail to be sent to the user (using the envelop)
                Mail::queue('email.content.contact', $messagedata['email_user'], function ($message) use ($messagedata) {
                    $message->to($messagedata['email'],$messagedata['name'])->subject(Lang::get('email.new_title'));
                });
            }
        }else{
            if($messagedata['email_user'] != ''){
                 // Queue the mail to be sent to the user (using the envelop)
                Mail::queue('email.content.contact', $messagedata['email_user'], function ($message) use ($messagedata) {
                    $message->to($messagedata['email'],$messagedata['name'])->subject(Lang::get('email.new_title'));
                });
            }
        }   

        if($messagedata['email_admin'] != ''){
            // Queue the mail to be sent to VITAJAYA
            Mail::queue('email.content.contact', $messagedata['email_admin'], function ($message) use ($messagedata) {
                $message->to('vitajaya@vitajaya.com', 'Admin')->subject(Lang::get('email.new_title'));
            });
        }
    }
}