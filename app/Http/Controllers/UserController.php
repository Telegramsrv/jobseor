<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Country;
use App\Model\Education;
use App\Model\EducationType;
use App\Model\User;
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
	public function index(Request $request,Country $country,EducationType $education)
	{
		$this->data['user'] = $request->user();

		if ($request->user()->role_id == 2)
		{
			$this->data['company'] = $request->user()->company;
			$this->data['agency'] = [ '0' => 'Прямой работодатель', '1' => 'Кадровое агенство'];
			return view('user.company.home', $this->data);
		}

		if ($request->user()->role_id == 3)
		{
			$this->data['applicant'] = $request->user()->applicant;
			$this->data['countries'] = $country->getForm();
			$this->data['educations'] = $education->getForm();
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
		dd('TODO');
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

	public function editInfo(Request $request)
	{
		if ($request->ajax())
		{
			if ( $request->user()->role_id == 3) {
				if (strcmp($request->user()->name, $request->name)) {
					$request->user()->name = $request->name;
				}

				if (strcmp($request->user()->email, $request->email)) {
					$invalidEmail = User::whereEmail($request->email)->count();
					if (!$invalidEmail) {
						$request->user()->email = $request->email;
					}
					else {
						echo json_encode(['class' => 'danger', 'message' => 'Ошибка!Данный email уже используеться!']);
					}
				}

				if (strcmp($request->user()->contacts->phone, $request->phone)) {
					$request->user()->contacts->phone = $request->phone;
				}

				if ($request->user()->applicant->country_id != $request->country_id) {
					$request->user()->applicant->country_id = $request->country_id;
				}

				if ($request->user()->applicant->birthday != $request->birthday) {
					$request->user()->applicant->birthday = $request->birthday;
				}

				if (strcmp($request->user()->applicant->city, $request->city)) {
					$request->user()->applicant->city = $request->city;
				}

				$request->user()->save();
				$request->user()->applicant->save();
				$request->user()->contacts->save();
				echo json_encode(['class' => 'success', 'message' => 'Изменения успешно сохранены!']);
			}
			if ( $request->user()->role_id == 2) {
				if (strcmp($request->user()->name, $request->name)) {
					$request->user()->name = $request->name;
				}

				if (strcmp($request->user()->email, $request->email)) {
					$invalidEmail = User::whereEmail($request->email)->count();
					if (!$invalidEmail) {
						$request->user()->email = $request->email;
					}
					else {
						echo json_encode(['class' => 'danger', 'message' => 'Ошибка!Данный email уже используеться!']);
					}
				}

				if (strcmp($request->user()->company->website, $request->website)) {
					$request->user()->company->website = $request->website;
				}
				if (strcmp($request->user()->company->description, $request->description)) {
					$request->user()->company->description = $request->description;
				}

				if ($request->user()->company->agency != $request->agency){
					$request->user()->company->agency = $request->agency;
				}

				$request->user()->save();
				$request->user()->company->save();

				echo json_encode(['class' => 'success', 'message' => 'Изменения успешно сохранены!']);
			}
		}
	}
}
