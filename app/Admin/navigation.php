<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

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
	        (new Page(\App\Category::class))
		        ->setPriority(0)
	            ->setTitle('Категории'),
	        (new Page(\App\Subcategory::class))
		        ->setPriority(50)
	            ->setTitle('Подкатегории'),
        ]
    ],

    [
	    'title' => 'Страны и регионы',
	    'pages' => [
		    (new Page(\App\Country::class))
			    ->setPriority(0)
			    ->setTitle('Страны'),
		    (new Page(\App\Region::class))
			    ->setPriority(50)
			    ->setTitle('Регионы'),
	    ]
    ],

    [
	    'title' => 'Соискатели и компании',
	    'pages' => [
		    (new Page(\App\Employer::class))
			    ->setPriority(0)
			    ->setTitle('Соискатели'),
		    (new Page(\App\Company::class))
			    ->setPriority(50)
			    ->setTitle('Компании'),
	    ]
    ],

    [
	    'title' => 'Настройки',
	    'pages' => [
		    (new Page(\App\Role::class))
			    ->setPriority(0)
			    ->setTitle('Роли'),
		    (new Page(\App\User::class))
			    ->setPriority(50)
			    ->setTitle('Пользователи'),
	    ]
    ]

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
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