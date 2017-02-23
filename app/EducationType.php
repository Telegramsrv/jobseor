<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EducationType
 *
 * @property int $education_type_id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\EducationType whereEducationTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EducationType whereName($value)
 * @mixin \Eloquent
 * @property int $weight
 * @method static \Illuminate\Database\Query\Builder|\App\EducationType whereWeight($value)
 */
class EducationType extends Model
{
    protected $primaryKey = 'education_type_id';

	public $timestamps = false;
}
