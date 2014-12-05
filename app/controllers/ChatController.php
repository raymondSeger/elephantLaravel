<?php

use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version1X;


class ChatController extends \BaseController {
  
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function send_msg(){
		$client = new Client(new Version1X('http://192.168.10.10:9900'));

		$client->initialize();

		$userdata[] = Auth::user();
		$inputz['username'] = Input::get('username');
		$inputz['theMessage'] = Input::get('theMessage');

		//dd($inputz);

		$client->emit('userdata', $inputz,$userdata);

		$client->close();
	}
}