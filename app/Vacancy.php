<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Vacancy
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
 * @property-read \App\Category $category
 * @property-read \App\Country $country
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereAgeMax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereAgeMin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereEducationTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereEmployment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereExperienceTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereSalary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereSubcategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereVacancyId($value)
 * @mixin \Eloquent
 * @property int $vacancy_id
 * @property int $employment_id
 * @property-read \App\Currency $currency
 * @property-read \App\ExperienceType $experiencetype
 * @method static \Illuminate\Database\Query\Builder|\App\Vacancy whereEmploymentId($value)
 */
class Vacancy extends Model
{
	protected $primaryKey = 'vacancy_id';

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}

	public function country()
	{
		return $this->belongsTo('App\Country', 'country_id');
	}

	public function currency()
	{
		return $this->belongsTo('App\Currency', 'currency_id');
	}

	public function experiencetype()
	{
		return $this->belongsTo('App\ExperienceType', 'experience_type_id');
	}
}
