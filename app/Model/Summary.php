<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Model\Summary
 *
 * @property int                                                                           $summary_id
 * @property int                                                                           $user_id
 * @property string                                                                        $title
 * @property int                                                                           $salary
 * @property int                                                                           $currency_id
 * @property string                                                                        $information
 * @property \Carbon\Carbon                                                                $created_at
 * @property \Carbon\Carbon                                                                $updated_at
 * @property-read \App\Model\Currency                                                      $currency
 * @property-read \App\Model\User                                                          $user
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereInformation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereSalary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereSummaryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereUserId($value)
 * @mixin \Eloquent
 * @property int                                                                           $category_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereCategoryId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\UserWatchedSummary[] $viewers
 * @property int                                                                           $profession_id
 * @property int                                                                           $employment_id
 * @property-read \App\Model\Employment                                                    $employment
 * @property-read \App\Model\Profession                                                    $profession
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereEmploymentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereProfessionId($value)
 * @property \Carbon\Carbon $deleted_at
 * @property-read \App\Model\Category $category
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Summary whereDeletedAt($value)
 */
class Summary extends Model
{
	use SoftDeletes;

	protected $primaryKey = 'summary_id';

	protected $dates = [ 'deleted_at'];

	protected $fillable = [
		'user_id',
		'category_id',
		'profession_id',
		'employment_id',
		'title',
		'salary',
		'currency_id',
		'information'
	];

	public function user()
	{
		return $this->belongsTo('App\Model\User', 'user_id');
	}

	public function currency()
	{
		return $this->belongsTo('App\Model\Currency', 'currency_id');
	}

	public function viewers()
	{
		return $this->hasMany('App\Model\UserWatchedSummary', 'summary_id', 'summary_id');
	}

	public function employment()
	{
		return $this->belongsTo('App\Model\Employment', 'employment_id');
	}

	public function profession()
	{
		return $this->belongsTo('App\Model\Profession', 'profession_id');
	}

	public function category()
	{
		return $this->belongsTo('App\Model\Category', 'category_id');
	}
}
