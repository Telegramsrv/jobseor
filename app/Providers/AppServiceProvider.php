<?php

namespace App\Providers;

use App\Model\Company;
use App\Model\Applicant;
use App\Model\Contacts;
use App\Model\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;//commit must fixed


class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Schema::defaultStringLength(191);
		User::created(
			function ($user) {
				if ($user->role_id == 2) {
					Company::create(
						[
							'user_id' => $user->user_id
						]
					);
				}
				if ($user->role_id == 3) {
					Applicant::create(
						[
							'user_id' => $user->user_id
						]
					);
				}

				Contacts::create(
					[
						'user_id' => $user->user_id,
					    'phone' => ''
					]
				);
			}
		);
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
