<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Contacts
 *
 * @property int $contact_id
 * @property int $user_id
 * @property string $phone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contacts whereContactId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contacts whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contacts wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contacts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Contacts whereUserId($value)
 * @mixin \Eloquent
 */
class Contacts extends Model
{
	protected $primaryKey = 'contact_id';
}
