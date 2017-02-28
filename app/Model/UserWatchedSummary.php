<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserWatchedSummary extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function summary()
    {
    	return $this->belongsTo('App\Model\Summary', 'summary_id');
    }
}
