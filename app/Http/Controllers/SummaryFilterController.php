<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Country;
use App\Model\EducationType;
use App\Model\Employment;
use App\Model\ExperienceType;
use App\Model\Profession;
use App\Model\Summary;
use Illuminate\Http\Request;

class SummaryFilterController extends Controller
{
	/**
	 * @param Request        $request
	 * @param Category       $category
	 * @param Country        $country
	 * @param Employment     $employment
	 * @param EducationType  $educationType
	 * @param ExperienceType $experienceType
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function index(
		Request $request,
		Category $category,
		Country $country,
		Employment $employment,
		EducationType $educationType,
		ExperienceType $experienceType,
		Profession $profession
	) {
		$this->data['categories'] = $category->getForm();
		$this->data['categories']['-1'] = 'Все';

		$this->data['professions'] = $profession->getFormAll();
		$this->data['professions']['-1'] = 'Любая';

		$this->data['countries'] = $country->getForm();
		$this->data['countries']['-1'] = 'Любая';

		$this->data['employments'] = $employment->getForm();
		$this->data['employments']['-1'] = 'Любая';

		$this->data['education_types'] = $educationType->getForm();

		$this->data['experience_types'] = $experienceType->getForm();
		$this->data['experience_types']['-1'] = 'Любой';

		return view('filterpage.summaryindex', $this->data);
	}

	/**
	 * @param Request        $request
	 * @param Summary        $summary
	 * @param ExperienceType $experienceType
	 */

	public function get(Request $request, Summary $summary,ExperienceType $experienceType)
	{
		if ($request->ajax()) {
			if ($request->category_id != -1) {
				$summary = $summary->whereCategoryId($request->category_id);
			}

			if ($request->profession_id != -1) {
				$summary = $summary->whereProfessionId($request->profession_id);
			}

			if ($request->employment_id != -1) {
				$summary = $summary->whereEmploymentId($request->employment_id);
			}
			$summary = $summary->get();

			if ($request->country_id != -1) {
				$summary = $summary->filter(
					function ($item) use ($request) {
						return $item->user->applicant->country->country_id == $request->country_id;
					}
				);
			}

			if ($request->education_type_id != 5) {
				$summary = $summary->filter(
					function ($item) use ($request) {
						return $item->user->applicant->maxeducation()->education_type_id == $request->education_type_id;
					}
				);
			}

			if ($request->experience_type_id != -1) {
				$summary = $summary->filter(
					function ($item) use ($request,$experienceType) {
						return $item->user->applicant->experience_year() >= $experienceType->whereExperienceTypeId($request->experience_type_id)->firstOrFail()->weight;
					}
				);
			}

			echo view('filterpage.summarylist', [ 'summaries' => $summary]);
		}
	}
}
