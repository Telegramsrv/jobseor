<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Country;
use App\Model\EducationType;
use App\Model\Employment;
use App\Model\ExperienceType;
use App\Model\Summary;
use Illuminate\Http\Request;

class SummaryFilterController extends Controller
{
	public function index(
		Request $request,
		Category $category,
		Country $country,
		Employment $employment,
		EducationType $educationType,
		ExperienceType $experienceType
	) {
		$this->data['categories'] = $category->getForm();
		$this->data['categories']['-1'] = 'Все';

		$this->data['countries'] = $country->getForm();
		$this->data['countries']['-1'] = 'Любая';

		$this->data['employments'] = $employment->getForm();
		$this->data['employments']['-1'] = 'Любая';

		$this->data['education_types'] = $educationType->getForm();
		$this->data['education_types']['-1'] = 'Любое';

		$this->data['experience_types'] = $experienceType->getForm();
		$this->data['experience_types']['-1'] = 'Любой';

		return view('filterpage.summaryindex', $this->data);
	}
}
