<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Region
 *
 * @property int $region_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Region whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Region whereRegionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Region whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Country[] $countries
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Region whereSlug($value)
 */
class Region extends Model
{
    protected $primaryKey = 'region_id';

    public function countries()
    {
    	return $this->hasMany('App\Model\Country','region_id');
    }

    public function getRegionBySlug($slug)
    {
	    return $this->whereSlug($slug)->firstOrFail();
    }
}
