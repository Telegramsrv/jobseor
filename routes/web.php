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

Route::post('/vacancy/profession', [
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

Route::post('/vacancy/{id}/delete', [
	'as' => 'vacancy.remove',
	'uses' => 'VacancyController@remove'
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
//USER

Route::get('/home', [
	'as' => 'user.home',
    'uses' =>   'UserController@index'
]);

Route::get('/notepad', [
	'as' => 'user.notepad',
	'uses' =>   'UserController@notepad'
]);


Route::get('/settings', [
	'as' => 'user.edit',
	'uses' =>   'UserController@edit'
]);

Route::post('/settings/pwd', [
	'as' => 'user.edit.pwd',
	'uses' =>   'UserController@editPWD'
]);

Route::post('/settings/info', [
	'as' => 'user.edit.info',
	'uses' =>   'UserController@editInfo'
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