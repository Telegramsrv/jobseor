<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VipApplicant extends Model
{
	protected $fillable = [ 'applicant_id', 'vip_applicant_settings_id'];

	public function applicant()
	{
		return $this->belongsTo('App\Model\Applicant', 'applicant_id');
	}

	public function settings()
	{
		return $this->belongsTo('App\Model\VipApplicantSetting', 'vip_applicant_settings_id');
	}

	public function timeleft()
	{
		$date1 = new \DateTime(date('Y-m-d H:i:s'));
		$date2 = new \DateTime(date('Y-m-d H:i:s', strtotime($this->created_at) + $this->settings->time * 60 * 60 * 24));

		return $date2->diff($date1);
	}
}
