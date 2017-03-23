<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\VipSummarySettings
 *
 * @property int $id
 * @property string $name
 * @property int $cost
 * @property int $time
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummarySettings whereCost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummarySettings whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummarySettings whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummarySettings whereTime($value)
 * @mixin \Eloquent
 */
class VipSummarySettings extends Model
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
