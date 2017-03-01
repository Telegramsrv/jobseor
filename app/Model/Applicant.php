<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Applicant
 *
 * @property int $Applicant_id
 * @property int $user_id
 * @property string $birthday
 * @property string $summary
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereApplicantId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereSummary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereUserId($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereUpdatedAt($value)
 * @property int $applicant_id
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereDescription($value)
 * @property-read \App\Model\Country $country
 * @property int $country_id
 * @property string $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Education[] $education
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Applicant whereCountryId($value)
 */
class Applicant extends Model
{
    protected $primaryKey = 'applicant_id';

	protected $fillable = [
		'user_id'
	];

    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function country()
    {
    	return $this->belongsTo('App\Model\Country', 'country_id');
    }

    public function education()
    {
    	return $this->hasMany('App\Model\Education', 'education_id');
    }

	public function experience()
	{
		return $this->hasMany('App\Model\Experience', 'user_id', 'user_id');
	}
}
