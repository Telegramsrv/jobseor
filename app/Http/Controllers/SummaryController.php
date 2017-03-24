<?php

namespace App\Http\Controllers;

use App\Model\Bookmark;
use App\Model\Category;
use App\Model\Currency;
use App\Model\Employment;
use App\Model\Profession;
use App\Model\Summary;
use App\Model\UserWatchedSummary;
use App\Model\VipSummary;
use App\Model\VipSummarySettings;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * @param Request  $request
	 * @param Category $category
	 * @param Currency $currency
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function addNew(Request $request, Category $category, Currency $currency, Employment $employment)
	{
		$this->data['categories'] = $category->getForm();
		$this->data['currencies'] = $currency->getForm();
		$this->data['employments'] = $employment->getForm();
		$this->data['summary'] = new Summary();

		return view('user.applicant.addsummary', $this->data);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function createNew(Request $request, Summary $summary)
	{
		$request['user_id'] = $request->user()->user_id;
		foreach ($summary->getFillable() as $array_key) {
			if (!array_key_exists($array_key, $request->toArray())) {
				return redirect(route('summary.add'));//TODO error page
			}
		}

		Category::whereCategoryId($request->category_id)->firstOrFail();
		Profession::whereProfessionId($request->profession_id)->firstOrFail();
		Currency::whereCurrencyId($request->currency_id)->firstOrFail();
		Employment::whereEmploymentId($request->employment_id)->firstOrFail();

		Summary::create($request->toArray());

		return redirect(route('user.notepad'));
	}

	/**
	 * @param Request $request
	 */

	public function getPreview(Request $request)
	{
		if ($request->ajax()) {
			$this->data['title'] = $request->title;
			$this->data['salary'] = $request->salary;
			$this->data['information'] = $request->information;
			$this->data['currency'] = Currency::whereCurrencyId($request->currency_id)->firstOrFail();
			$this->data['user'] = $request->user();

			echo view('summary.preview', $this->data);
		}
	}

	/**
	 * @param          $id
	 * @param Request  $request
	 * @param Category $category
	 * @param Currency $currency
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function edit($id, Request $request, Category $category, Currency $currency)
	{
		$summary = Summary::whereSummaryId($id)->firstOrFail();
		if ($summary->user_id != $request->user()->user_id) {
			dd(504);//TODO add error page
		}
		$this->data['categories'] = $category->getForm();
		$this->data['currencies'] = $currency->getForm();
		$this->data['summary'] = $summary;

		return view('user.applicant.addsummary', $this->data);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */

	public function editPost(Request $request, Summary $summary)
	{
		$request['user_id'] = $request->user()->user_id;

		foreach ($summary->getFillable() as $array_key) {
			if (!array_key_exists($array_key, $request->toArray())) {
				return redirect(route('user.notepad'));//TODO error page
			}
		}
		Category::whereCategoryId($request->category_id)->firstOrFail();
		Profession::whereProfessionId($request->profession_id)->firstOrFail();
		Currency::whereCurrencyId($request->currency_id)->firstOrFail();
		Employment::whereEmploymentId($request->employment_id)->firstOrFail();

		$oldsummary = Summary::whereUserId($request->user()->user_id)->whereSummaryId(
			$request->summary_id
		)->firstOrFail();
		$oldsummary->update($request->toArray());
		$oldsummary->save();

		return redirect(route('user.notepad'));
	}

	/**
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */

	public function remove($id, Request $request)
	{
		$summary = Summary::whereUserId($request->user()->user_id)->whereSummaryId($id)->firstOrFail();
		$summary->delete();

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
		$summary = Summary::whereSummaryId($id)->firstOrFail();
		$this->data['summary'] = $summary;
		$this->data['user'] = $summary->user;
		$this->data['isBookmark'] = Bookmark::whereItemId($id)->whereUserId($request->user()->user_id)->whereVacancy(
			0
		)->get()->isNotEmpty();

		if ($request->user()->user_id != $summary->user_id && $request->user()->role_id != 1) {
			$summary_view = UserWatchedSummary::whereUserId($request->user()->user_id)
			                                  ->firstOrCreate(
				                                  [
					                                  'user_id'    => $request->user()->user_id,
					                                  'summary_id' => $summary->summary_id
				                                  ]
			                                  );
			$summary_view->save();
		}

		return view('summary.index', $this->data);
	}

	/**
	 * @param         $id
	 * @param Request $request
	 */

	public function bookmark($id, Request $request)
	{
		if ($request->ajax()) {
			if (Summary::whereSummaryId($id)->first()->user_id == $request->user()->user_id) {
				die('Failed');
			}

			$bookmark = Bookmark::firstOrCreate(
				['user_id' => $request->user()->user_id, 'item_id' => $id, 'vacancy' => '0']
			);
			if (!$bookmark->wasRecentlyCreated) {
				$bookmark->delete();
			}
		}
	}

	/**
	 * @param                    $id
	 * @param Request            $request
	 * @param VipSummarySettings $settings
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */

	public function getVip($id, Request $request, VipSummarySettings $settings)
	{
		$summary = Summary::whereSummaryId($id)->whereUserId($request->user()->user_id)->firstOrFail();
		if ($summary->isVip()) {
			return redirect(route('user.notepad'));
		}
		else {
			$this->data['user'] = $request->user();
			$this->data['settings'] = $settings->getForm();

			return view('summary.vip', $this->data);
		}
	}

	/**
	 * @param         $id
	 * @param Request $request
	 */

	public function postVip($id, Request $request)
	{
		if ($request->ajax()) {
			$summary = Summary::whereSummaryId($id)->whereUserId($request->user()->user_id)->firstOrFail();
			$settings = VipSummarySettings::whereId($request->settings_id)->firstOrFail();

			if ($request->user()->balance >= $settings->cost) {
				VipSummary::create(
					[
						'summary_id'  => $summary->summary_id,
						'settings_id' => $settings->id
					]
				);
				$request->user()->balance -= $settings->cost;
				$request->user()->save();

				echo json_encode(['class' => 'success', 'message' => 'VIP резюме успешно активировано!']);
			}
			else {
				echo json_encode(['class' => 'danger', 'message' => 'Недостаточно средств!Пожалуйста пополните Ваш счёт.']);
			}
		}
	}
}
