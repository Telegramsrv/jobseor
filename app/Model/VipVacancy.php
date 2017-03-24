<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\VipVacancy
 *
 * @property int $id
 * @property int $vacancy_id
 * @property int $settings_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\VipSummarySettings $settings
 * @property-read \App\Model\Vacancy $vacancy
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancy whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancy whereSettingsId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancy whereVacancyId($value)
 * @mixin \Eloquent
 */
class VipVacancy extends Model
{
	protected $fillable = ['vacancy_id', 'settings_id'];

	public function vacancy()
	{
		return $this->belongsTo('App\Model\Vacancy', 'vacancy_id');
	}

	public function settings()
	{
		return $this->belongsTo('App\Model\VipSummarySettings', 'settings_id');
	}

	public function timeleft()
	{
		$date1 = new \DateTime(date('Y-m-d H:i:s'));
		$date2 = new \DateTime(
			date('Y-m-d H:i:s', strtotime($this->created_at) + $this->settings->time * 60 * 60 * 24)
		);

		return $date2->diff($date1);
	}
}
