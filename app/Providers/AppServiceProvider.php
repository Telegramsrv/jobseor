<?php

namespace App\Providers;

use App\Company;
use App\Employer;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function ($user){
        	if ($user->role_id == 2) {
		        Company::create([
				        'user_id' => $user->user_id
		            ]);
	        }
	        if ($user->role_id == 3) {
		        Employer::create([
                        'user_id' => $user->user_id
                    ]);
	        }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
