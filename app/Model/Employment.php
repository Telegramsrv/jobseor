<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Employment
 *
 * @property int $employment_id
 * @property string $name
 * @property int $weight
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Employment whereEmploymentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Employment whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Employment whereWeight($value)
 * @mixin \Eloquent
 */
class Employment extends Model
{
    protected $primaryKey = 'employment_id';

    public $timestamps = false;

    public function getForm()
    {
	    $buff = [];
	    foreach ($this->get() as $item)
	    {
		    $buff[$item->employment_id] = $item->name;
	    }
	    return $buff;
    }
}
