<?php

namespace App\Http\Controllers;

use App\Model\AvailableContact;
use App\Model\Message;
use App\Model\User;
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

	/**
	 * @param         $id
	 * @param Request $request
	 * @param Message $message
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function view($id, Request $request, Message $message, AvailableContact $availableContact)
	{
		if (!$availableContact->isAvailable($id, $request->user()->user_id)) {
			die('Пополните баланс');
		}
		else {
			$message->readMessage($id, $request->user()->user_id);
			$this->data['messages'] = $message->getDialog($request->user()->user_id, $id);
			$this->data['user'] = $request->user();
			return view('message.list', $this->data);
		}
	}

	/**
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */

	public function send($id, Request $request)
	{
		$recipient = User::whereUserId($id)->firstOrFail();
		$message = new Message();
		$message->sender_id = $request->user()->user_id;
		$message->recipient_id = $recipient->user_id;
		$message->message = $request->message;
		$message->save();

		//add send email
		if ($recipient->getMessageNotificaion){
			\Mail::send('dispatch.message', [
				'sender' => $request->user(),
			    'recipient' => $recipient
			], function ($m) use ($recipient) {
				$m->from('notification@jobseor.com', 'JobSeor');

				$m->to( $recipient->email, $recipient->name )->subject('Новое сообщение!');
			});
		}

		return redirect(route('message.user', [ 'id' => $id]));
	}
}
