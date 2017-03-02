<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Country
 *
 * @property int $country_id
 * @property int $region_id
 * @property string $name
 * @property string $slug
 * @property string $body
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereRegionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Country whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Model\Region $region
 */
class Country extends Model
{
    protected $primaryKey = 'country_id';

    public function region()
    {
    	return $this->belongsTo('App\Model\Region','region_id');
    }

    public function getCountryBySlug($slug)
    {
    	return $this->whereSlug($slug)->firstOrFail();
    }

    public function getForm()
    {
    	$buff = [];
    	foreach ($this->get() as $country)
	    {
	    	$buff[$country->country_id] = $country->name;
	    }
	    return $buff;
    }
}
