<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Education
 *
 * @property int $education_id
 * @property int $user_id
 * @property string $name
 * @property int $year_start
 * @property int $year_end
 * @property string $specialize
 * @property int $education_type_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Education whereEducationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Education whereEducationTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Education whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Education whereSpecialize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Education whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Education whereYearEnd($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Education whereYearStart($value)
 * @mixin \Eloquent
 * @property-read \App\Model\EducationType $type
 * @property-read \App\Model\User $user
 */
class Education extends Model
{
    protected $primaryKey = 'education_id';

	public $timestamps = false;

	public function type()
	{
		return $this->belongsTo('App\Model\EducationType','education_type_id');
	}

	public function user()
	{
		return $this->belongsTo('App\Model\User','user_id');
	}
}
