<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Model\User
 *
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $type
 * @property string $image
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereUserId($value)
 * @mixin \Eloquent
 * @property int $role_id
 * @property int $balance
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereBalance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereRoleId($value)
 * @property-read \App\Model\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Contacts[] $contacts
 * @property-read \App\Model\Applicant $applicant
 * @property-read \App\Model\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Message[] $recivemessage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Message[] $sentmessage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Bookmark[] $bookmarks
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($id)
    {
    	return $this->role_id == $id;
    }

    public function role()
    {
    	return $this->belongsTo('App\Model\Role','role_id');
    }

    public function company()
    {
	    return $this->belongsTo('App\Model\Company', 'user_id', 'user_id');
    }

    public function applicant()
    {
	    return $this->belongsTo('App\Model\Applicant', 'user_id', 'user_id');
    }

	public function contacts()
	{
		return $this->hasOne('App\Model\Contacts', 'user_id', 'user_id');
    }

    public function setUserName($name)
    {
    	$this->name = $name;
    	$this->save();
    }

    public function sentmessage()
    {
		return $this->hasMany('App\Model\Message', 'user_id', 'sender_id');
    }

    public function recivemessage()
    {
	    return $this->hasMany('App\Model\Message', 'user_id', 'recipient_id');
    }

    public function bookmarks()
    {
		return $this->hasMany('App\Model\Bookmark', 'user_id', 'user_id');
    }

    public function getMessageNotificaion()
    {
    	return $this->belongsTo('App\Model\MessageNotification', 'user_id', 'user_id');
    }
}
