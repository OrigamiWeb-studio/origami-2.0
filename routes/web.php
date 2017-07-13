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

#Locales
Route::get('/locale/{code}', 'HomeController@setLocale')
	->name('set-locale');

#Homepage
Route::get('/', 'HomeController@index')
	->name('home');
Route::get('/home', 'HomeController@index');
Route::post('/send-form', 'HomeController@sendForm')
	->name('home-send-form');

#Projects
Route::get('/projects', 'ProjectsController@allProjects')
	->name('projects');

Route::post('/projects', 'ProjectsController@allProjectsJson')
	->name('projects-json');

Route::get('/project/add', 'ProjectsController@addProjectView')
	->name('project-add');

Route::post('/project/add', 'ProjectsController@addProject')
	->name('project-add-submit');

Route::get('/project/{id}/edit', 'ProjectsController@editProjectView')
	->name('project-edit');

Route::post('/project/{id}/edit', 'ProjectsController@editProject')
	->name('project-edit-submit');

Route::get('/project/{id}', 'ProjectsController@singleProject')
	->name('project')
	->where('id', '[0-9]+');

#About
Route::get('/about', 'AboutController@index')
    ->name('about');

#Contacts
Route::get('/contacts', 'ContactsController@index')
    ->name('contacts');

#Team
Route::get('/team', 'TeamController@allDevelopers')
	->name('team');
Route::get('/developer/{id}', 'TeamController@singleDeveloper')
	->name('developer')
	->where('id', '[0-9]+');
