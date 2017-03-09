<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\UserWatchedVacancy
 *
 * @property-read \App\Model\User $user
 * @property-read \App\Model\Vacancy $vacancy
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $vacancy_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedVacancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedVacancy whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedVacancy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedVacancy whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedVacancy whereVacancyId($value)
 */
class UserWatchedVacancy extends Model
{
	protected $fillable = [
		'user_id', 'vacancy_id'
	];

    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function vacancy()
    {
    	return  $this->belongsTo('App\Model\Vacancy', 'vacancy_id');
    }
}
