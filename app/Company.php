<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @property int $company_id
 * @property int $user_id
 * @property string $name
 * @property string $website
 * @property bool $agency
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereAgency($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereWebsite($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    protected $primaryKey = 'company_id';
}
