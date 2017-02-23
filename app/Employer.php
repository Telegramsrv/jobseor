<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employer
 *
 * @property int $employer_id
 * @property int $user_id
 * @property string $birthday
 * @property string $summary
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereEmployerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereSummary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereUserId($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereUpdatedAt($value)
 */
class Employer extends Model
{
    protected $primaryKey = 'employer_id';

	protected $fillable = [
		'user_id'
	];

    public function user()
    {
    	return $this->hasOne('App\User','user_id');
    }
}
