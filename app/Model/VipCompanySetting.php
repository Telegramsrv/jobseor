<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VipCompanySetting extends Model
{
	public $timestamps = false;

	public function getForm()
	{
		$buff = [];
		foreach ($this->get() as $item) {
			$buff[$item->id] = $item->name;
		}

		return $buff;
	}
}
