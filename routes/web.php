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

Route::get('/', 'PageController@welcome');

Route::get('/tasklists', 'TasklistController@index');
Route::get('/tasklists/create', 'TasklistController@create');

Route::post('tasklists', 'TasklistController@store');

Route::get('/tasklists/search', 'TasklistController@search');

Route::get('/tasklists/{id}', 'TasklistController@show');

Route::get('/tasklists/{id}/edit', 'TasklistController@edit');
Route::put('/tasklists/{id}', 'TasklistController@update');

Route::get('/tasklists/{id}/delete', 'TasklistController@delete');
Route::delete('/tasklists/{id}', 'TasklistController@destroy');