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
 * @property bool $read
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Message whereRead($value)
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
		$send = $this->whereSenderId($user_id)
		             ->distinct()
		             ->orderBy('updated_at', 'desc')
		             ->get()
		             ->unique('recipient_id');

		$recv = $this->whereRecipientId($user_id)
		             ->distinct()
		             ->orderBy('updated_at', 'desc')
		             ->get()
		             ->unique('sender_id');

		$dialogs = new Collection($send);

		foreach ($recv as $item) {
			if (!$dialogs->contains('recipient_id', $item->sender_id)) {
				$dialogs->push($item);
			}
			else {
				$buff = $dialogs->where('recipient_id', $item->sender_id)->first();
				if ($buff->updated_at < $item->updated_at) {
					$buff->delete();
					$dialogs->push($item);
				}
			}
		}

		return $dialogs;
	}

	public function getDialog($user_id, $to_user_id)
	{
		return $this->whereSenderId($user_id)
			->whereRecipientId($to_user_id)
			->orWhere('sender_id', $to_user_id)
			->whereRecipientId($user_id)
			->orderBy('updated_at', 'asc')
			->get();
	}

	public function readMessage($sender_id, $recipient_id)
	{
		return $this->whereSenderId($sender_id)->whereRecipientId($recipient_id)->whereRead(0)->update([ 'read' => 1]);
	}
}
