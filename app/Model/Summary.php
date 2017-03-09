<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Summary
 *
 * @property int $summary_id
 * @property int $user_id
 * @property string $title
 * @property int $salary
 * @property int $currency_id
 * @property string $information
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\Currency $currency
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereInformation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereSalary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereSummaryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereUserId($value)
 * @mixin \Eloquent
 * @property int $category_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereCategoryId($value)
 */
class Summary extends Model
{
    protected $primaryKey = 'summary_id';

    protected $fillable = [
        'user_id', 'category_id', 'title', 'salary', 'currency_id', 'information'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Model\User','user_id');
    }

    public function currency()
    {
    	return $this->belongsTo('App\Model\Currency','currency_id');
    }
}
