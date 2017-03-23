<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VipCompany extends Model
{
    protected $fillable = [ 'company_id', 'vip_company_settings_id'];

	public function company()
	{
		return $this->belongsTo('App\Model\Company', 'company_id');
	}

	public function settings()
	{
		return $this->belongsTo('App\Model\VipCompanySetting', 'vip_company_settings_id');
	}

	public function timeleft()
	{
		$date1 = new \DateTime(date('Y-m-d H:i:s'));
		$date2 = new \DateTime(date('Y-m-d H:i:s', strtotime($this->created_at) + $this->settings->time * 60 * 60 * 24));

		return $date2->diff($date1);
	}
}
