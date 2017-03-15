<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * App\Model\Message
 *
 * @property int                  $id
 * @property int                  $sender_id
 * @property int                  $recipient_id
 * @property string               $message
 * @property \Carbon\Carbon       $created_at
 * @property \Carbon\Carbon       $updated_at
 * @property-read \App\Model\User $recipient
 * @property-read \App\Model\User $sender
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Message whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Message whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Message whereRecipientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Message whereSenderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Message extends Model
{
	public function sender()
	{
		return $this->belongsTo('App\Model\User', 'sender_id');
	}

	public function recipient()
	{
		return $this->belongsTo('App\Model\User', 'recipient_id');
	}

	public function getDialogs($user_id)
	{
		$send = $this->whereIn('sender_id', $this->whereRecipientId($user_id)->get(['sender_id'])->unique())
		             ->orderBy('updated_at', 'desc')
		             ->get()
		             ->unique('sender_id');

		$recv = $this->whereIn('recipient_id', $this->whereSenderId($user_id)->get(['recipient_id'])->unique())
		             ->orderBy('updated_at', 'desc')
		             ->get()
		             ->unique('recipient_id');

		$dialogs = $recv->merge($send)->sortByDesc('updated_at');

		return $dialogs;
	}
}
