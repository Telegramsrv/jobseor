<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\UserWatchedSummary
 *
 * @property-read \App\Model\Summary $summary
 * @property-read \App\Model\User $user
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $summary_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedSummary whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedSummary whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedSummary whereSummaryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedSummary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserWatchedSummary whereUserId($value)
 */
class UserWatchedSummary extends Model
{
	protected $fillable = [
		'user_id', 'summary_id'
	];

    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function summary()
    {
    	return $this->belongsTo('App\Model\Summary', 'summary_id');
    }
}
