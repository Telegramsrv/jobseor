<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Category::class => 'App\Http\Sections\Category',
        \App\Subcategory::class => 'App\Http\Sections\Subcategory',
        \App\Country::class => 'App\Http\Sections\Country',
        \App\Region::class => 'App\Http\Sections\Region',
        \App\Company::class => 'App\Http\Sections\Company',
        \App\Applicant::class => 'App\Http\Sections\Applicant',
        \App\Payment::class => 'App\Http\Sections\Payment',
        \App\Role::class => 'App\Http\Sections\Role',
        \App\User::class => 'App\Http\Sections\User',
        \App\Education::class => 'App\Http\Sections\Education',
        \App\EducationType::class => 'App\Http\Sections\EducationType',
        \App\Experience::class => 'App\Http\Sections\Experience',
        \App\Currency::class => 'App\Http\Sections\Currency',
        \App\Summary::class => 'App\Http\Sections\Summary',
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
