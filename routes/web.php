<?php


use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return Inertia::render('Welcome');
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
