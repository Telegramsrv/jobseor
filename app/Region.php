<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Region
 *
 * @property int $region_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereRegionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Country[] $countries
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereSlug($value)
 */
class Region extends Model
{
    protected $primaryKey = 'region_id';

    public function countries()
    {
    	return $this->hasMany('App\Country','region_id','region_id');
    }

    public function getCountriesBySlug($slug)
    {
	    return $this->whereSlug($slug)->firstOrFail()->countries();
    }
}
