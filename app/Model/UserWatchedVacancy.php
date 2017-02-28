<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserWatchedVacancy extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function vacancy()
    {
    	return  $this->belongsTo('App\Model\Vacancy', 'vacancy_id');
    }
}
