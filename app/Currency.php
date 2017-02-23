<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Currency
 *
 * @property int $currency_id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Currency whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Currency whereName($value)
 * @mixin \Eloquent
 */
class Currency extends Model
{
	protected $primaryKey = 'currency_id';

	public $timestamps = false;
}
