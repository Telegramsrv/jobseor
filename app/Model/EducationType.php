<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\EducationType
 *
 * @property int $education_type_id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EducationType whereEducationTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EducationType whereName($value)
 * @mixin \Eloquent
 * @property int $weight
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EducationType whereWeight($value)
 */
class EducationType extends Model
{
    protected $primaryKey = 'education_type_id';

	public $timestamps = false;

	public function getForm()
	{
		$buff = [];
		foreach ($this->get() as $education)
		{
			$buff[$education->education_type_id] = $education->name;
		}
		return $buff;
	}
}
