<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\MessageNotification
 *
 * @property int $id
 * @property int $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\MessageNotification whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\MessageNotification whereUserId($value)
 * @mixin \Eloquent
 */
class MessageNotification extends Model
{
    public $timestamps = false;

    protected $fillable = [ 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }
}
