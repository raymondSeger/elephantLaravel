<?php

$user_id = Auth::user()->id;

if(Auth::user()->hasRole('Admin'))
	$messages = DB::select('SELECT COUNT(unread_admin) AS count_msg from messages WHERE unread_admin = 1');
else
	$messages = DB::select("SELECT COUNT(unread_client) AS count_msg from messages WHERE unread_client = 1 AND user_id = '{$user_id}' ");

return array( 'count_unread' => $messages[0]->count_msg );