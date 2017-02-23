<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Applicant
 *
 * @property int $Applicant_id
 * @property int $user_id
 * @property string $birthday
 * @property string $summary
 * @method static \Illuminate\Database\Query\Builder|\App\Applicant whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Applicant whereApplicantId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Applicant whereSummary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Applicant whereUserId($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Applicant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Applicant whereUpdatedAt($value)
 * @property int $applicant_id
 */
class Applicant extends Model
{
    protected $primaryKey = 'Applicant_id';

	protected $fillable = [
		'user_id'
	];

    public function user()
    {
    	return $this->hasOne('App\User','user_id');
    }
}
