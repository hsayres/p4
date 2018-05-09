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

Route::get('/goals', 'GoalController@index');
Route::get('/goals/create', 'GoalController@create');

Route::get('/tasks', 'TaskController@index');


Route::post('goals', 'GoalController@store');

Route::get('/goals/search', 'GoalController@search');

Route::get('/goals/{id}', 'GoalController@show');

Route::get('/goals/{id}/edit', 'GoalController@edit');
Route::put('/goals/{id}', 'GoalController@update');

Route::get('/goals/{id}/delete', 'GoalController@delete');
Route::delete('/goals/{id}', 'GoalController@destroy');