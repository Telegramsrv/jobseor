<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Company
 *
 * @property int $company_id
 * @property int $user_id
 * @property string $name
 * @property string $website
 * @property bool $agency
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereAgency($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereWebsite($value)
 * @mixin \Eloquent
 * @property-read \App\Model\User $user
 * @property int $rating
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereRating($value)
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Company whereDescription($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Vacancy[] $vacancies
 */
class Company extends Model
{
    protected $primaryKey = 'company_id';

	protected $fillable = [
		'user_id'
	];

    public function user()
    {
    	return $this->belongsTo('App\Model\User','user_id');
    }

    public function vacancies()
    {
    	return $this->hasMany('App\Model\Vacancy','user_id','user_id');
    }
}
