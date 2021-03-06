<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Model\Category::class => 'App\Http\Sections\Category',
        \App\Model\Profession::class => 'App\Http\Sections\Profession',
        \App\Model\Country::class => 'App\Http\Sections\Country',
        \App\Model\Region::class => 'App\Http\Sections\Region',
        \App\Model\Company::class => 'App\Http\Sections\Company',
        \App\Model\Applicant::class => 'App\Http\Sections\Applicant',
        \App\Model\Payment::class => 'App\Http\Sections\Payment',
        \App\Model\Role::class => 'App\Http\Sections\Role',
        \App\Model\User::class => 'App\Http\Sections\User',
        \App\Model\Education::class => 'App\Http\Sections\Education',
        \App\Model\EducationType::class => 'App\Http\Sections\EducationType',
        \App\Model\Experience::class => 'App\Http\Sections\Experience',
        \App\Model\Currency::class => 'App\Http\Sections\Currency',
        \App\Model\Summary::class => 'App\Http\Sections\Summary',
        \App\Model\Vacancy::class => 'App\Http\Sections\Vacancy',
        \App\Model\Employment::class => 'App\Http\Sections\Employment',
        \App\Model\ExperienceType::class => 'App\Http\Sections\ExperienceType',
        \App\Model\VipVacancySettings::class => 'App\Http\Sections\VipVacancySettings',
        \App\Model\VipSummarySettings::class => 'App\Http\Sections\VipSummarySettings',
        \App\Model\VipVacancy::class => 'App\Http\Sections\VipVacancy',
        \App\Model\VipSummary::class => 'App\Http\Sections\VipSummary',
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
