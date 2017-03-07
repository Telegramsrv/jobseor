<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Currency
 *
 * @property int $currency_id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Currency whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Currency whereName($value)
 * @mixin \Eloquent
 */
class Currency extends Model
{
	protected $primaryKey = 'currency_id';

	public $timestamps = false;

	public function getForm()
	{
		$buff = [];
		foreach ($this->get() as $currency)
		{
			$buff[$currency->currency_id] = $currency->name;
		}
		return $buff;
	}
}
