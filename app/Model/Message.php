<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
}
