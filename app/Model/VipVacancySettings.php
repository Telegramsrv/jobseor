<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\VipVacancySettings
 *
 * @property int $id
 * @property string $name
 * @property int $cost
 * @property int $time
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancySettings whereCost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancySettings whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancySettings whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipVacancySettings whereTime($value)
 * @mixin \Eloquent
 */
class VipVacancySettings extends Model
{
    public $timestamps = false;

	public function getForm()
	{
		$buff = [];
		foreach ($this->get() as $item)
		{
			$buff[$item->id] = $item->name;
		}
		return $buff;
	}
}
