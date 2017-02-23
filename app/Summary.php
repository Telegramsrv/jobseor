<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Summary
 *
 * @property int $summary_id
 * @property int $user_id
 * @property string $title
 * @property int $salary
 * @property int $currency_id
 * @property string $information
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Currency $currency
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Summary whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Summary whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Summary whereInformation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Summary whereSalary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Summary whereSummaryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Summary whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Summary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Summary whereUserId($value)
 * @mixin \Eloquent
 */
class Summary extends Model
{
    protected $primaryKey = 'summary_id';

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function currency()
    {
    	return $this->belongsTo('App\Currency','currency_id');
    }
}
