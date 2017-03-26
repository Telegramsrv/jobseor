<?php

namespace App\Http\Controllers;

use App\Model\Bookmark;
use App\Model\Category;
use App\Model\Country;
use App\Model\Currency;
use App\Model\EducationType;
use App\Model\Employment;
use App\Model\ExperienceType;
use App\Model\Profession;
use App\Model\UserWatchedVacancy;
use App\Model\Vacancy;
use App\Model\VipVacancy;
use App\Model\VipVacancySettings;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * @param Request        $request
	 * @param Category       $category
	 * @param Country        $country
	 * @param EducationType  $educationType
	 * @param Employment     $employment
	 * @param Currency       $currency
	 * @param ExperienceType $experienceType
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function addNew(
		Request $request,
		Category $category,
		Country $country,
		EducationType $educationType,
		Employment $employment,
		Currency $currency,
		ExperienceType $experienceType
	) {
		$this->data['vacancy'] = new Vacancy();
		$this->data['categories'] = $category->getForm();
		$this->data['countries'] = $country->getForm();
		$this->data['education_types'] = $educationType->getForm();
		$this->data['employments'] = $employment->getForm();
		$this->data['currencies'] = $currency->getForm();
		$this->data['experience_types'] = $experienceType->getForm();

		return view('user.company.addvacancy', $this->data);
	}

	/**
	 * @param Request    $request
	 * @param Profession $profession
	 */

	public function getProfession(Request $request, Profession $profession)
	{
		if ($request->ajax()) {
			$this->data['professions'] = $profession->getForm($request->category_id);

			echo view('vacancy.profession', $this->data);
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */

	public function createNew(Request $request)
	{
		$vacancy = new Vacancy();

		$request['user_id'] = $request->user()->user_id;
		foreach ($vacancy->getFillable() as $array_key) {
			if (!array_key_exists($array_key, $request->toArray())) {
				dd(504);//TODO error page
			}
		}

		Category::whereCategoryId($request->category_id)->firstOrFail();
		Profession::whereProfessionId($request->profession_id)->firstOrFail();
		Country::whereCountryId($request->country_id)->firstOrFail();
		EducationType::whereEducationTypeId($request->education_type_id)->firstOrFail();
		Employment::whereEmploymentId($request->employment_id)->firstOrFail();
		Currency::whereCurrencyId($request->currency_id)->firstOrFail();
		ExperienceType::whereExperienceTypeId($request->experience_type_id)->firstOrFail();

		Vacancy::create($request->toArray());

		return redirect(route('user.notepad'));
	}

	/**
	 * @param Request $request
	 */

	public function preview(Request $request)
	{
		if ($request->ajax()) {
			$this->data['vacancy'] = $request;
			$this->data['country'] = Country::whereCountryId($request->country_id)->firstOrFail()->name;
			$this->data['category'] = Category::whereCategoryId($request->category_id)->firstOrFail()->name;
			$this->data['profession'] = Profession::whereProfessionId($request->profession_id)->firstOrFail()->name;
			$this->data['currency'] = Currency::whereCurrencyId($request->currency_id)->firstOrFail()->name;
			$this->data['experience_type'] = ExperienceType::whereExperienceTypeId(
				$request->exepience_type_id
			)->firstOrFail()->name;
			$this->data['education_type'] = EducationType::whereEducationTypeId(
				$request->education_type_id
			)->firstOrFail()->name;
			$this->data['employment'] = Employment::whereEmploymentId($request->employment_id)->firstOrFail()->name;
			$this->data['user'] = $request->user();

			echo view('vacancy.preview', $this->data);
		}
	}

	/**
	 * @param                $id
	 * @param Request        $request
	 * @param Category       $category
	 * @param Country        $country
	 * @param EducationType  $educationType
	 * @param Employment     $employment
	 * @param Currency       $currency
	 * @param ExperienceType $experienceType
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function edit(
		$id,
		Request $request,
		Category $category,
		Country $country,
		EducationType $educationType,
		Employment $employment,
		Currency $currency,
		ExperienceType $experienceType
	) {
		$vacancy = Vacancy::whereVacancyId($id)->firstOrFail();
		if ($vacancy->user_id != $request->user()->user_id) {
			dd(504);//TODO add error page
		}
		$this->data['vacancy'] = $vacancy;

		$this->data['categories'] = $category->getForm();
		$this->data['countries'] = $country->getForm();
		$this->data['education_types'] = $educationType->getForm();
		$this->data['employments'] = $employment->getForm();
		$this->data['currencies'] = $currency->getForm();
		$this->data['experience_types'] = $experienceType->getForm();

		return view('user.company.addvacancy', $this->data);
	}

	/**
	 * @param Request $request
	 * @param Vacancy $vacancy
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */

	public function editPost(Request $request, Vacancy $vacancy)
	{
		$request['user_id'] = $request->user()->user_id;

		foreach ($vacancy->getFillable() as $array_key) {
			if (!array_key_exists($array_key, $request->toArray())) {
				return redirect(route('user.notepad'));//TODO error page
			}
		}

		Category::whereCategoryId($request->category_id)->firstOrFail();
		Profession::whereProfessionId($request->profession_id)->firstOrFail();
		Country::whereCountryId($request->country_id)->firstOrFail();
		EducationType::whereEducationTypeId($request->education_type_id)->firstOrFail();
		Employment::whereEmploymentId($request->employment_id)->firstOrFail();
		Currency::whereCurrencyId($request->currency_id)->firstOrFail();
		ExperienceType::whereExperienceTypeId($request->experience_type_id)->firstOrFail();

		$oldvacancy = Vacancy::whereUserId($request->user()->user_id)->whereVacancyId(
			$request->vacancy_id
		)->firstOrFail();
		$oldvacancy->update($request->toArray());
		$oldvacancy->save();

		return redirect(route('user.notepad'));
	}

	/**
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function view($id, Request $request)
	{
		$vacancy = Vacancy::whereVacancyId($id)->firstOrFail();
		$this->data['vacancy'] = $vacancy;
		$this->data['user'] = $vacancy->user;
		$this->data['isBookmark'] = Bookmark::whereItemId($id)->whereUserId($request->user()->user_id)->whereVacancy(
			1
		)->get()->isNotEmpty();
		if ($request->user()->user_id != $vacancy->user_id && $request->user()->role_id != 1) {
			$vacancy_view = UserWatchedVacancy::whereUserId($request->user()->user_id)
			                                  ->firstOrCreate(
				                                  [
					                                  'user_id'    => $request->user()->user_id,
					                                  'vacancy_id' => $vacancy->vacancy_id
				                                  ]
			                                  );
			$vacancy_view->save();
		}

		return view('vacancy.index', $this->data);
	}

	/**
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */

	public function remove($id, Request $request)
	{
		$vacancy = Vacancy::whereVacancyId($id)->firstOrFail();
		if ($vacancy->user_id != $request->user()->user_id) {
			dd(504);//TODO add error page
		}
		$vacancy->delete();

		return redirect(route('user.notepad'));
	}

	/**
	 * @param         $id
	 * @param Request $request
	 */

	public function bookmark($id, Request $request)
	{
		if ($request->ajax()) {
			if (Vacancy::whereVacancyId($id)->first()->user_id == $request->user()->user_id) {
				die('Failed');
			}

			$bookmark = Bookmark::firstOrCreate(
				['user_id' => $request->user()->user_id, 'item_id' => $id, 'vacancy' => '1']
			);
			if (!$bookmark->wasRecentlyCreated) {
				$bookmark->delete();
			}
		}
	}

	/**
	 * @param                    $id
	 * @param Request            $request
	 * @param VipVacancySettings $settings
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */

	public function getVip($id, Request $request, VipVacancySettings $settings)
	{
		$vacancy = Vacancy::whereVacancyId($id)->whereUserId($request->user()->user_id)->firstOrFail();
		if ($vacancy->isVip()) {
			return redirect(route('user.notepad'));
		}
		else {
			$this->data['user'] = $request->user();
			$this->data['settings'] = $settings->getForm();

			return view('vacancy.vip', $this->data);
		}
	}

	/**
	 * @param         $id
	 * @param Request $request
	 */

	public function postVip($id, Request $request)
	{
		if ($request->ajax()) {
			$vacancy = Vacancy::whereVacancyId($id)->whereUserId($request->user()->user_id)->firstOrFail();
			$settings = VipVacancySettings::whereId($request->settings_id)->firstOrFail();
			$end_date = date('Y-m-d H:i:s', strtotime('+' . $settings->time . ' day'));
			if ($request->user()->balance >= $settings->cost) {
				VipVacancy::create(
					[
						'vacancy_id'  => $vacancy->vacancy_id,
						'settings_id' => $settings->id,
						'end_date'    => $end_date
					]
				);
				$request->user()->balance -= $settings->cost;
				$request->user()->save();

				echo json_encode(['class' => 'success', 'message' => 'VIP резюме успешно активировано!']);
			}
			else {
				echo json_encode(
					['class' => 'danger', 'message' => 'Недостаточно средств!Пожалуйста пополните Ваш счёт.']
				);
			}
		}
	}
}
