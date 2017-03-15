<?php

namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
	/**
	 * MessageController constructor.
	 */

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * @param Request $request
	 * @param Message $message
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function index(Request $request, Message $message)
	{
		$this->data['dialogs'] = $message->getDialogs($request->user()->user_id);
		$this->data['user'] = $request->user();
		return view('message.dialogs', $this->data);
	}
}
