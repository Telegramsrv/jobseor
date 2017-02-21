<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employer
 *
 * @property int $employer_id
 * @property int $user_id
 * @property string $birthday
 * @property string $summary
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereEmployerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereSummary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employer whereUserId($value)
 * @mixin \Eloquent
 */
class Employer extends Model
{
    protected $primaryKey = 'employer_id';
}
