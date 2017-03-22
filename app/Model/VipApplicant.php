<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VipApplicant extends Model
{
	public function applicant()
	{
		return $this->belongsTo('App\Model\Applicant', 'applicant_id');
	}

	public function settings()
	{
		return $this->belongsTo('App\Model\VipApplicantSetting', 'vip_applicant_settings_id');
	}
}
