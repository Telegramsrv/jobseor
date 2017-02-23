<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Experience
 *
 * @property int $experience_id
 * @property int $user_id
 * @property string $name
 * @property int $year_start
 * @property int $year_end
 * @property string $position
 * @method static \Illuminate\Database\Query\Builder|\App\Experience whereExperienceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Experience whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Experience wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Experience whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Experience whereYearEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Experience whereYearStart($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 */
class Experience extends Model
{
    protected $primaryKey = 'experience_id';

    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
