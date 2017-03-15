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

	public function index(Request $request, Message $message)
	{
		$message->getDialogs($request->user()->user_id);
	}
}
