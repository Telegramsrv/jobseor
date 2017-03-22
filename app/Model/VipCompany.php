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
}
