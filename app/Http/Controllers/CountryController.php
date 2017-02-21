<?php

namespace App\Http\Controllers;

use App\Country;
use App\Region;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Region $region)
    {
    	$this->data['regions'] = $region->get();//TODO add view foreach regions as region->countries
	    dd($this->data);
    }

    public function region($slug, Region $region)
    {
    	$this->data['countries'] = $region->getCountriesBySlug($slug);
    	dd($this->data);
    }

    public function getOne($slug, Country $country)
    {
    	$this->data['country'] = $country->getCountryBySlug($slug);
    	dd($this->data);
    }
}
