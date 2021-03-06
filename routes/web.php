<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [
	'as' => 'page.index',
    'uses' => 'PageController@index'
]);

Route::get('/country', [
	'as' => 'country.list',
	'uses' => 'CountryController@index'
]);

Route::get('/region/{slug}', [
	'as' => 'region.index',
	'uses' => 'CountryController@region'
]);

Route::get('/country/{slug}', [
	'as' => 'country.index',
	'uses' => 'CountryController@getOne'
]);

Route::get('/category/{slug}', [
	'as' => 'category.index',
	'uses' => 'PageController@getCategory'
]);

//

Route::get('/user/{id}', [
	'as' => 'user.index',
	'uses' => 'UserController@getUser'
]);

Route::get('/user/{id}/notepad', [
	'as' => 'user.index.notepad',
	'uses' => 'UserController@getUserNotepad'
]);

// VACANCY

Route::get('/vacancy/add', [
	'as' => 'vacancy.add',
	'uses' => 'VacancyController@addNew'
]);

Route::post('/vacancy/add', [
	'as' => 'vacancy.add.post',
	'uses' => 'VacancyController@createNew'
]);

Route::post('/vacancy/get/profession', [
	'as' => 'vacancy.profession',
	'uses' => 'VacancyController@getProfession'
]);

Route::post('/vacancy/preview', [
	'as' => 'vacancy.preview',
	'uses' => 'VacancyController@preview'
]);

Route::get('/vacancy/{id}/edit', [
	'as' => 'vacancy.edit',
	'uses' => 'VacancyController@edit'
]);

Route::post('/vacancy/edit', [
	'as' => 'vacancy.edit.post',
	'uses' => 'VacancyController@editPost'
]);

Route::get('/vacancy/{id}', [
	'as' => 'vacancy.view',
	'uses' => 'VacancyController@view'
]);

Route::get('/vacancy/{id}/vip', [
	'as' => 'vacancy.vip',
	'uses' => 'VacancyController@getVip'
]);

Route::post('/vacancy/{id}/vip', [
	'as' => 'vacancy.vip.post',
	'uses' => 'VacancyController@postVip'
]);

Route::post('/vacancy/{id}/delete', [
	'as' => 'vacancy.remove',
	'uses' => 'VacancyController@remove'
]);

Route::post('/vacancy/{id}/bookmark', [
	'as' => 'vacancy.bookmark',
	'uses' => 'VacancyController@bookmark'
]);
// SUMMARY

Route::get('/summary/add', [
	'as' => 'summary.add',
	'uses' => 'SummaryController@addNew'
]);

Route::post('/summary/add', [
	'as' => 'summary.add.post',
	'uses' => 'SummaryController@createNew'
]);

Route::post('/summary/edit', [
	'as' => 'summary.edit.post',
	'uses' => 'SummaryController@editPost'
]);

Route::post('/summary/preview', [
	'as' => 'summary.preview',
	'uses' => 'SummaryController@getPreview'
]);

Route::get('/summary/{id}/edit', [
	'as' => 'summary.edit',
	'uses' => 'SummaryController@edit'
]);

Route::post('/summary/{id}/delete', [
	'as' => 'summary.remove',
	'uses' => 'SummaryController@remove'
]);

Route::get('/summary/{id}', [
	'as' => 'summary.view',
	'uses' => 'SummaryController@view'
]);

Route::get('/summary/{id}/vip', [
	'as' => 'summary.vip',
	'uses' => 'SummaryController@getVip'
]);

Route::post('/summary/{id}/vip', [
	'as' => 'summary.vip.post',
	'uses' => 'SummaryController@postVip'
]);


Route::post('/summary/{id}/bookmark', [
	'as' => 'summary.bookmark',
	'uses' => 'SummaryController@bookmark'
]);
//USER

Route::get('/confirm/token={token}', [
	'as' => 'email.confirm',
	'uses' =>   'PageController@confirmEmail'
]);

Route::get('/home', [
	'as' => 'user.home',
    'uses' =>   'UserController@index'
]);

Route::get('/bookmarks', [
	'as' => 'user.bookmarks',
	'uses' =>   'UserController@getBookMarks'
]);

Route::get('/notepad', [
	'as' => 'user.notepad',
	'uses' =>   'UserController@notepad'
]);

Route::get('/notepad/viewers', [
	'as' => 'user.notepad.viewers',
	'uses' =>   'UserController@viewers'
]);

Route::get('/notepad/history', [
	'as' => 'user.notepad.history',
	'uses' =>   'UserController@history'
]);

Route::get('/settings', [
	'as' => 'user.edit',
	'uses' =>   'UserController@edit'
]);

Route::post('/settings/pwd', [
	'as' => 'user.edit.pwd',
	'uses' =>   'UserController@editPWD'
]);

Route::post('/settings/notification', [
	'as' => 'user.edit.notification',
	'uses' =>   'UserController@editNotification'
]);


Route::post('/settings/info', [
	'as' => 'user.edit.info',
	'uses' =>   'UserController@editInfo'
]);

Route::post('/settings/image', [
	'as' => 'user.edit.image',
	'uses' =>   'UserController@updateImage'
]);


//EXPERIENCE

Route::post('/settings/experience/new', [
	'as' => 'experience.new',
	'uses' =>   'ExperienceController@newExperience'
]);

Route::post('/settings/experience/add', [
	'as' => 'experience.add',
	'uses' =>   'ExperienceController@addExperience'
]);

Route::post('/settings/experience', [
	'as' => 'experience.edit',
	'uses' =>   'ExperienceController@editExperience'
]);

Route::post('/settings/experience/remove', [
	'as' => 'experience.remove',
	'uses' =>   'ExperienceController@removeExperience'
]);

// EDUCATION
Route::post('/settings/education', [
	'as' => 'education.edit',
	'uses' =>   'EducationController@editEducation'
]);

Route::post('/settings/education/new', [
	'as' => 'education.new',
	'uses' =>   'EducationController@newEducation'
]);

Route::post('/settings/education/remove', [
	'as' => 'education.remove',
	'uses' =>   'EducationController@removeEducation'
]);

Route::post('/settings/education/add', [
	'as' => 'education.add',
	'uses' =>   'EducationController@addEducation'
]);

// AVAILABLE CONTACT

Route::post('/contact/index', [
	'as' => 'contact.index',
	'uses' =>   'AvailableContactController@index'
]);

Route::post('/contact/open', [
	'as' => 'contact.open',
	'uses' =>   'AvailableContactController@open'
]);

// MESSAGE

Route::get('/message', [
	'as' => 'message.list',
	'uses' => 'MessageController@index'
]);

Route::get('/message/{id}', [
	'as' => 'message.user',
	'uses' => 'MessageController@view'
]);

Route::post('/message/{id}', [
	'as' => 'message.send',
	'uses' => 'MessageController@send'
]);

// FILTER PAGE Vacancy

Route::get('/vacancy', [
	'as' => 'vacancy.index',
	'uses' => 'VacancyFilterController@index'
]);

Route::post('/vacancy', [
	'as' => 'vacancy.filter',
	'uses' => 'VacancyFilterController@get'
]);

Route::post('/vacancy/profession', [
	'as' => 'vacancy.filter.profession',
	'uses' => 'VacancyFilterController@getProfession'
]);

// FILTER PAGE Summary

Route::get('/summary', [
	'as' => 'summary.index',
	'uses' => 'SummaryFilterController@index'
]);

Route::post('/summary', [
	'as' => 'summary.filter',
	'uses' => 'SummaryFilterController@get'
]);

// PAYMENTS

Route::get('/payment', [
	'as' => 'payment',
	'uses' => 'PaymentController@getPayment'
]);

Route::post('/payment', [
	'as' => 'payment',
	'uses' => 'PaymentController@postPayment'
]);

Route::post('/payment/callback', [
	'as' => 'payment.callback',
	'uses' => 'PaymentController@callbackLiqPay'
]);