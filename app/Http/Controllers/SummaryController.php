<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Currency;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function addNew(Request $request, Category $category, Currency $currency)
    {
    	$this->data['categories'] = $category->getForm();
    	$this->data['currencies'] = $currency->getForm();
		return view('user.applicant.addsummary', $this->data);
    }

    public function createNew(Request $request)
    {
    	dd($request);

    }

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
