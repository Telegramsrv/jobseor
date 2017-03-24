<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
