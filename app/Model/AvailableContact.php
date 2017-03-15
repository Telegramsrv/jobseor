<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\AvailableContact
 *
 * @property int $id
 * @property int $owner_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\User $owner
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Model\AvailableContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\AvailableContact whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\AvailableContact whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\AvailableContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\AvailableContact whereUserId($value)
 * @mixin \Eloquent
 */
class AvailableContact extends Model
{
    public function owner()
    {
    	return $this->belongsTo('App\Model\User', 'owner_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function isAvailable($first_user,$second_user)
    {
	    $availableContact = AvailableContact::whereUserId($first_user)->whereOwnerId($second_user)
	                                        ->orWhere('user_id', $second_user)->whereOwnerId($first_user)
	                                        ->get();//TODO Add date

	    if ($availableContact->isEmpty()) {
		    return false;
	    }
	    else {
	        return true;
	    }
    }
}
