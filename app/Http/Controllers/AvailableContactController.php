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

				$availableContact = AvailableContact::whereUserId($request->user_id)
				                                    ->orWhere('user_id', $request->user()->user_id)
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
}
