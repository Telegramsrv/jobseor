<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\Model\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\Model\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\Model\User::class)

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],

    [
    	'title' => 'Категории и подкатегории',
        'pages' => [
	        (new Page(\App\Model\Category::class))
		        ->setPriority(0)
	            ->setTitle('Категории'),
	        (new Page(\App\Model\Subcategory::class))
		        ->setPriority(50)
	            ->setTitle('Подкатегории'),
        ]
    ],

    [
	    'title' => 'Страны и регионы',
	    'pages' => [
		    (new Page(\App\Model\Country::class))
			    ->setPriority(0)
			    ->setTitle('Страны'),
		    (new Page(\App\Model\Region::class))
			    ->setPriority(50)
			    ->setTitle('Регионы'),
	    ]
    ],

    [
	    'title' => 'Пользователи',
	    'pages' => [
		    (new Page(\App\Model\Applicant::class))
			    ->setPriority(50)
			    ->setTitle('Соискатели'),
		    (new Page(\App\Model\Company::class))
			    ->setPriority(100)
			    ->setTitle('Компании'),
		    (new Page(\App\Model\User::class))
			    ->setPriority(0)
			    ->setTitle('Пользователи'),
	    ]
    ],

    [
	    'title' => 'Стаж и образование',
	    'pages' => [
		    (new Page(\App\Model\Experience::class))
			    ->setPriority(50)
			    ->setTitle('Стаж'),
		    (new Page(\App\Model\Education::class))
			    ->setPriority(100)
			    ->setTitle('Образование'),
	    ]
    ],

    [
	    'title' => 'Резюме и вакансии',
	    'pages' => [
		    (new Page(\App\Model\Summary::class))
			    ->setPriority(50)
			    ->setTitle('Резюме'),
		    (new Page(\App\Model\Vacancy::class))
			    ->setPriority(100)
			    ->setTitle('Вакансии'),
	    ]
    ],

    [
	    'title' => 'Настройки',
	    'pages' => [
		    (new Page(\App\Model\Currency::class))
			    ->setPriority(0)
			    ->setTitle('Валюта'),
		    (new Page(\App\Model\Role::class))
			    ->setPriority(100)
			    ->setTitle('Роли'),
		    (new Page(\App\Model\EducationType::class))
			    ->setPriority(150)
			    ->setTitle('Виды образования'),
		    (new Page(\App\Model\Employment::class))
			    ->setPriority(200)
			    ->setTitle('Типы зайнятости'),
		    (new Page(\App\Model\ExperienceType::class))
			    ->setPriority(250)
			    ->setTitle('Виды стажа'),
	    ]
    ],

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\Model\User::class,
    //
    //        // or
    //
    //        (new Page(\App\Model\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];