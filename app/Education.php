<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Education
 *
 * @property int $education_id
 * @property int $user_id
 * @property string $name
 * @property int $year_start
 * @property int $year_end
 * @property string $specialize
 * @property int $education_type_id
 * @method static \Illuminate\Database\Query\Builder|\App\Education whereEducationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Education whereEducationTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Education whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Education whereSpecialize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Education whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Education whereYearEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Education whereYearStart($value)
 * @mixin \Eloquent
 * @property-read \App\EducationType $type
 * @property-read \App\User $user
 */
class Education extends Model
{
    protected $primaryKey = 'education_id';

	public $timestamps = false;

	public function type()
	{
		return $this->belongsTo('App\EducationType','education_type_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User','user_id');
	}
}
