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

	public function index(Request $request)
	{
		if ($request->ajax()) {
			if ($request->user_id != $request->user()->user_id) {

				$availableContact = AvailableContact::whereUserId($request->user_id)->whereOwnerId($request->user()->user_id)
				                                    ->orWhere('user_id', $request->user()->user_id)->whereOwnerId($request->user_id)
				                                    ->get();//TODO Add date

				$this->data['user'] = User::whereUserId($request->user_id)->firstOrFail();

				if ($availableContact->isEmpty()) {
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

				echo view('contact.get', $this->data);
			}
			else {
				echo 'Пополните баланс';//TODO open payment page
			}
		}
	}
}
