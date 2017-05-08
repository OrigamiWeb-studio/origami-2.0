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

#Homepage
Route::get('/', 'HomeController@index')
	->name('home');
Route::get('/home', 'HomeController@index')
	->name('home');

#Projects
Route::get('/projects', 'ProjectsController@allProjects')
	->name('projects');
Route::get('/project/{id}', 'ProjectsController@singleProject')
	->name('project')
	->where('id', '[0-9]+');

#Team
Route::get('/team', 'TeamController@team')
	->name('team');
Route::get('/team/{id}', 'TeamController@singleDeveloper')
	->name('developer')
	->where('id', '[0-9]+');
