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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/projects/create', 'ProjectController@create')->name('projects.create');

Route::middleware('auth')->group(function() {

    Route::resource('projects', 'ProjectController');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->name('tasks.store');

    Route::post('/invitations/{project}', 'ProjectInvitationsController@store')->name('invitations.store');

	Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update')->name('tasks.update');
});
