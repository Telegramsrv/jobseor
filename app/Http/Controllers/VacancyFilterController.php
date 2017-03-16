<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Country;
use App\Model\EducationType;
use App\Model\Employment;
use App\Model\ExperienceType;
use App\Model\Profession;
use App\Model\Vacancy;
use Illuminate\Http\Request;

class VacancyFilterController extends Controller
{
	public function index(
		Request $request,
		Category $category,
		Country $country,
		Employment $employment,
		ExperienceType $experienceType,
		EducationType $educationType
	) {
		$this->data['categories'] = $category->getForm();
		$this->data['countries'] = $country->getForm();
		$this->data['employments'] = $employment->getForm();
		$this->data['education_types'] = $educationType->getForm();
		$this->data['experience_types'] = $experienceType->getForm();

		return view('filterpage.vacancyindex', $this->data);
	}

	public function get(Request $request)
	{
		$vacancy = Vacancy::whereCategoryId($request->category_id)
		                  ->whereEmploymentId($request->employment_id)
		                  ->whereCountryId($request->country_id)
		                  ->get();
		dd($vacancy);
	}

	public function getProfession(Request $request, Profession $profession)
	{
		if ($request->ajax())
		{
			$this->data['professions'] = $profession->getForm($request->category_id);

			echo view('vacancy.profession', $this->data);
		}
	}
}
