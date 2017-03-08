<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ExperienceType
 *
 * @property int $experience_type_id
 * @property string $name
 * @property int $weight
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ExperienceType whereExperienceTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ExperienceType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ExperienceType whereWeight($value)
 * @mixin \Eloquent
 */
class ExperienceType extends Model
{
    protected $primaryKey = 'experience_type_id';

    public $timestamps = false;

	public function getForm()
	{
		$buff = [];
		foreach ($this->get() as $item)
		{
			$buff[$item->experience_type_id] = $item->name;
		}
		return $buff;
	}
}
