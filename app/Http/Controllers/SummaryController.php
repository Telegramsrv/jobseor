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
		if ( isset($request->category_id) && isset($request->title) && isset($request->salary) && isset($request->currency_id) && isset($request->information)) {
			$summary->user_id = $request->user()->user_id;
			$summary->category_id = $request->category_id;
			$summary->title = $request->title;
			$summary->salary = $request->salary;
			$summary->currency_id = $request->currency_id;
			$summary->information = $request->information;
			$summary->save();

			return redirect(route('user.notepad'));
		}
		else return redirect(route('summary.add'));
    }

	/**
	 * @param Request $request
	 */

    public function getPreview(Request $request)
    {
    	if ($request->ajax())
	    {
	    	$this->data['title'] = $request->title;
	    	$this->data['salary'] = $request->salary;
	    	$this->data['information'] = $request->information;
	    	$this->data['currency'] = Currency::whereCurrencyId($request->currency_id)->firstOrFail();
	    	$this->data['user'] = $request->user();
			echo view('summary.preview', $this->data);
	    }
    }
}
