<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Country
 *
 * @property int $country_id
 * @property int $region_id
 * @property string $name
 * @property string $slug
 * @property string $body
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereRegionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    protected $primaryKey = 'country_id';

    public function region()
    {
    	return $this->belongsTo('App\Region','region_id');
    }
}
