<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role
 *
 * @property int $role_id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereRoleId($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    protected $primaryKey = 'role_id';

    public $timestamps = false;
}
