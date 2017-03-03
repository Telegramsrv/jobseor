<?php

namespace App\Http\Controllers;

use App\Model\Country;
use App\Model\EducationType;
use Illuminate\Http\Request;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$this->data['user'] = $request->user();

		if ($request->user()->role_id == 2)
		{
			$this->data['company'] = $request->user()->company;
			return view('user.company.home', $this->data);
		}

		if ($request->user()->role_id == 3)
		{
			$this->data['applicant'] = $request->user()->applicant;
			return view('user.applicant.home', $this->data);
		}
		if ($request->user()->role_id == 1)
			return redirect('/admin');
		return redirect('/');
	}

	/**
	 * @param Request $request
	 */

	public function notepad(Request $request)
	{
		$this->data['user'] = $request->user();
		if ($request->user()->role_id == 2)
		{
			$this->data['vacancies'] = $request->user()->company->vacancies;
			return view('user.company.notepad', $this->data);
		}

		if ($request->user()->role_id == 3)
		{
			$this->data['summaries'] = $request->user()->applicant->summaries;
			return view('user.applicant.notepad', $this->data);
		}
	}

	/**
	 * @param Request       $request
	 * @param Country       $country
	 * @param EducationType $education
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function edit(Request $request, Country $country, EducationType $education)
	{
		$this->data['user'] = $request->user();

		if ($request->user()->role_id == 2)
		{
			$this->data['vacancies'] = $request->user()->company->vacancies;
			return view('user.company.notepad', $this->data);
		}

		if ($request->user()->role_id == 3)
		{
			$this->data['applicant'] = $request->user()->applicant;
			$this->data['countries'] = $country->getForm();
			$this->data['educations'] = $education->getForm();
			return view('user.applicant.edit', $this->data);
		}
	}

	/**
	 * @param Request $request
	 *
	 */

	public function editName(Request $request)
	{
		if ($request->ajax()) {
			if (isset($request->name)) {
				$request->user()->setUserName($request->name);
			}
		}
	}

	/**
	 * @param Request $request
	 *
	 */
	public function editPWD(Request $request)
	{
		if ($request->ajax()) {
			if (\Hash::check($request->password, $request->user()->getAuthPassword())) {
				$request->user()->password = \Hash::make($request->new_password);
				$request->user()->save();
				echo 'Пароль успешно изменен!';
			}
			else {
				die('Неверный пароль!');
			}
		}
	}
}
