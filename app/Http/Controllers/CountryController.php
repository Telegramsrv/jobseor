<?php

namespace App\Http\Controllers;

use App\Country;
use App\Region;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Region $region)
    {
    	$this->data['regions'] = $region->get();
	    return view('country.list', $this->data);
    }

    public function region($slug, Region $region)
    {
    	$this->data['regions'][] = $region->getRegionBySlug($slug);
	    return view('country.list', $this->data);
    }

    public function getOne($slug, Country $country)
    {
    	$this->data['country'] = $country->getCountryBySlug($slug);
    	return view('country.one', $this->data);
    }
}
