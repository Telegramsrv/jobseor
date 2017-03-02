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
}
