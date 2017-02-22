<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',
        \App\Category::class => 'App\Http\Sections\Category',
        \App\Subcategory::class => 'App\Http\Sections\Subcategory',
        \App\Country::class => 'App\Http\Sections\Country',
        \App\Region::class => 'App\Http\Sections\Region',
        \App\Company::class => 'App\Http\Sections\Company',
        \App\Employer::class => 'App\Http\Sections\Employer',
        \App\Payment::class => 'App\Http\Sections\Payment',
        \App\Role::class => 'App\Http\Sections\Role',
        \App\User::class => 'App\Http\Sections\User',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
