<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Experience
 *
 * @property int $experience_id
 * @property int $user_id
 * @property string $name
 * @property int $year_start
 * @property int $year_end
 * @property string $position
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Experience whereExperienceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Experience whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Experience wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Experience whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Experience whereYearEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Experience whereYearStart($value)
 * @mixin \Eloquent
 * @property-read \App\Model\User $user
 */
class Experience extends Model
{
    protected $primaryKey = 'experience_id';

    public $timestamps = false;

    protected $fillable = [ 'user_id', 'name', 'year_start', 'year_end', 'position'];

    public function user()
    {
    	return $this->belongsTo('App\Model\User','user_id');
    }
}
