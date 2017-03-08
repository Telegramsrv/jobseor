<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Currency;
use App\Model\Summary;
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

	public function addNew(Request $request, Category $category, Currency $currency)
	{
		$this->data['categories'] = $category->getForm();
		$this->data['currencies'] = $currency->getForm();
		$this->data['summary'] = new Summary();

		return view('user.applicant.addsummary', $this->data);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function createNew(Request $request)
	{
		$summary = new Summary();
		if (isset($request->category_id) && isset($request->title) && isset($request->salary) && isset($request->currency_id) && isset($request->information)) {
			$summary->user_id = $request->user()->user_id;
			$summary->title = $request->title;
			$summary->salary = $request->salary;
			if (Category::whereCategoryId($request->category_id)->count()) {
				$summary->category_id = $request->category_id;
			}

			if (Currency::whereCurrencyId($request->currency_id)->count()) {
				$summary->currency_id = $request->currency_id;
			}
			$summary->information = $request->information;
			$summary->save();

			return redirect(route('user.notepad'));
		}
		else {
			return redirect(route('summary.add'));
		}
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

	public function editPost(Request $request)
	{
		$summary = Summary::whereSummaryId($request->summary_id)->firstOrFail();
		if ($summary->user_id != $request->user()->user_id) {
			dd(504);//TODO add error page
		}
		if (isset($request->category_id) && isset($request->title) && isset($request->salary) && isset($request->currency_id) && isset($request->information)) {
			$summary->title = $request->title;

			$summary->information = $request->information;

			if (Category::whereCategoryId($request->category_id)->count()) {
				$summary->category_id = $request->category_id;
			}

			if (Currency::whereCurrencyId($request->currency_id)->count()) {
				$summary->currency_id = $request->currency_id;
			}

			$summary->salary = $request->salary;
			$summary->save();
		}

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
		$summary = Summary::whereSummaryId($id)->firstOrFail();
		if ($summary->user_id != $request->user()->user_id) {
			dd(504);//TODO add error page
		}
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
		//TODO add userWatchSummary
		return view('summary.index', $this->data);
	}
}
