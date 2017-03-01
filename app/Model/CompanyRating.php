<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\CompanyRating
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property int $rating
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\CompanyRating whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\CompanyRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\CompanyRating whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\CompanyRating whereRating($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\CompanyRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\CompanyRating whereUserId($value)
 */
class CompanyRating extends Model
{
	//
}
