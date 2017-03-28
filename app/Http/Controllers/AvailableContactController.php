<?php

namespace App\Http\Controllers;

use App\Model\AvailableContact;
use App\Model\User;
use Illuminate\Http\Request;

class AvailableContactController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * @param Request $request
	 */

	public function index(Request $request, AvailableContact $availableContact)
	{
		if ($request->ajax()) {
			if ($request->user_id != $request->user()->user_id) {
				$this->data['user'] = User::whereUserId($request->user_id)->firstOrFail();

				if (!$availableContact->isAvailable($request->user()->user_id, $request->user_id)) {
					echo view('contact.index');
				}
				else {
					echo view('contact.get', $this->data);
				}
			}
		}
	}

	/**
	 * @param Request $request
	 */

	public function open(Request $request)
	{
		if ($request->ajax()) {
			if ($request->user()->balance >= 5)//TODO change value
			{
				$this->data['user'] = User::whereUserId($request->user_id)->firstOrFail();

				$availableContact = new AvailableContact();
				$availableContact->owner_id = $request->user()->user_id;
				$availableContact->user_id = $request->user_id;
				$availableContact->save();

				$user = $request->user();
				$user->balance -= 5;
				$user->save();

				//add send email
				\Mail::send('dispatch.contacts', $this->data, function ($m) use ($request) {
					$m->from('oleksii.yaryi@gmail.com', 'JobSeor');

					$m->to( $request->user()->email, $request->user()->name )->subject('Открытие контактов пользователя!');
				});

				echo view('contact.get', $this->data);
			}
			else {
				echo 'Пополните баланс';//TODO open payment page
			}
		}
	}
}
