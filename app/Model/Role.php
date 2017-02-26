<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Role
 *
 * @property int $role_id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Role whereRoleId($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    protected $primaryKey = 'role_id';

    public $timestamps = false;
}
