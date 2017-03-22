<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Model\Vacancy
 *
 * @property int $Vacancy_id
 * @property int $user_id
 * @property string $title
 * @property int $category_id
 * @property int $subcategory_id
 * @property int $country_id
 * @property string $city
 * @property int $education_type_id
 * @property string $employment
 * @property int $salary
 * @property int $currency_id
 * @property int $experience_type_id
 * @property int $age_min
 * @property int $age_max
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\Category $category
 * @property-read \App\Model\Country $country
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereAgeMax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereAgeMin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereEducationTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereEmployment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereExperienceTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereSalary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereSubcategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereVacancyId($value)
 * @mixin \Eloquent
 * @property int $vacancy_id
 * @property int $employment_id
 * @property-read \App\Model\Currency $currency
 * @property-read \App\Model\ExperienceType $experiencetype
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereEmploymentId($value)
 * @property-read \App\Model\ExperienceType $experience_type
 * @property-read \App\Model\EducationType $education
 * @property-read \App\Model\Profession $profession
 * @property int $profession_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereProfessionId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\UserWatchedVacancy[] $viewers
 * @property \Carbon\Carbon $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Vacancy whereDeletedAt($value)
 */
class Vacancy extends Model
{
	use SoftDeletes;

	protected $primaryKey = 'vacancy_id';

	protected $dates = [ 'deleted_at'];

	protected $fillable = [
		'user_id', 'title', 'category_id', 'profession_id', 'country_id', 'city', 'education_type_id', 'employment_id',
	    'salary', 'currency_id', 'experience_type_id', 'age_min', 'age_max', 'description'
	];

	public function user()
	{
		return $this->belongsTo('App\Model\User', 'user_id');
	}

	public function category()
	{
		return $this->belongsTo('App\Model\Category', 'category_id');
	}

	public function profession()
	{
		return $this->belongsTo('App\Model\Profession', 'profession_id');
	}

	public function country()
	{
		return $this->belongsTo('App\Model\Country', 'country_id');
	}

	public function currency()
	{
		return $this->belongsTo('App\Model\Currency', 'currency_id');
	}

	public function experience_type()
	{
		return $this->belongsTo('App\Model\ExperienceType', 'experience_type_id');
	}

	public function employment()
	{
		return $this->belongsTo('App\Model\Employment', 'employment_id');
	}

	public function education()
	{
		return $this->belongsTo('App\Model\EducationType', 'education_type_id');
	}

	public function viewers()
	{
		return $this->hasMany('App\Model\UserWatchedVacancy', 'vacancy_id', 'vacancy_id');
	}
}
