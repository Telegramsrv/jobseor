<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ExperienceType
 *
 * @property int $experience_type_id
 * @property string $name
 * @property int $weight
 * @method static \Illuminate\Database\Query\Builder|\App\ExperienceType whereExperienceTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ExperienceType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ExperienceType whereWeight($value)
 * @mixin \Eloquent
 */
class ExperienceType extends Model
{
    protected $primaryKey = 'experience_type_id';

    public $timestamps = false;
}
