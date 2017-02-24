<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employment
 *
 * @property int $employment_id
 * @property string $name
 * @property int $weight
 * @method static \Illuminate\Database\Query\Builder|\App\Employment whereEmploymentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employment whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employment whereWeight($value)
 * @mixin \Eloquent
 */
class Employment extends Model
{
    protected $primaryKey = 'employment_id';

    public $timestamps = false;
}
