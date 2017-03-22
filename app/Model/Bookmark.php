<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Bookmark
 *
 * @property int $id
 * @property int $user_id
 * @property int $item_id
 * @property \App\Model\Vacancy $vacancy
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\Summary $item
 * @property-read \App\Model\Summary $summary
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Bookmark whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Bookmark whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Bookmark whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Bookmark whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Bookmark whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Bookmark whereVacancy($value)
 * @mixin \Eloquent
 */
class Bookmark extends Model
{
	protected $fillable = [
		'user_id', 'item_id', 'vacancy',
	];


	public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function vacancy()
    {
    	return $this->belongsTo('App\Model\Vacancy', 'item_id');
    }

	public function summary()
	{
		return $this->belongsTo('App\Model\Summary', 'item_id');
	}

	public function item()
	{
		if ($this->vacancy)
			return $this->belongsTo('App\Model\Vacancy', 'item_id');
		else return $this->belongsTo('App\Model\Summary', 'item_id');
	}
}
