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




Route::post('/settings/name', [
	'as' => 'user.edit.name',
	'uses' =>   'UserController@editName'
]);

Route::post('/settings/pwd', [
	'as' => 'user.edit.pwd',
	'uses' =>   'UserController@editPWD'
]);

Route::post('/settings/contacts', [
	'as' => 'user.edit.contacts',
	'uses' =>   'UserController@editContacts'
]);