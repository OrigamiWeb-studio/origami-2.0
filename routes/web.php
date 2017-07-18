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
#-----------------------------------------------------------------------------------
#Locales
#
#
Route::get('/locale/{code}', 'HomeController@setLocale')
	->name('set-locale');
#-----------------------------------------------------------------------------------
#Homepage
#
#
Route::get('/', 'HomeController@index')
	->name('home');
Route::get('/home', 'HomeController@index');
Route::post('/send-form', 'HomeController@sendForm')
	->name('home-send-form');
#-----------------------------------------------------------------------------------
#Projects
#
#
Route::get('/projects', 'ProjectsController@allProjects')
	->name('projects');

Route::post('/projects', 'ProjectsController@allProjectsJson')
	->name('projects-json');

Route::get('/project/add', 'ProjectsController@addProjectView')
	->name('project-add')
	->middleware(['role:admin']);

Route::post('/project/add', 'ProjectsController@addProject')
	->name('project-add-submit')
	->middleware(['role:admin']);

Route::get('/project/{id}/edit', 'ProjectsController@editProjectView')
	->name('project-edit')
	->middleware(['role:admin']);

//TODO change to PUT method
Route::post('/project/{id}/edit', 'ProjectsController@editProject')
	->name('project-edit-submit')
	->middleware(['role:admin']);

//TODO change to DELETE method
Route::get('/project/{id}/delete', 'ProjectsController@deleteProject')
	->name('project-delete-submit')
	->middleware(['role:admin']);

Route::get('/project/{id}', 'ProjectsController@singleProject')
	->name('project')
	->where('id', '[0-9]+');
#-----------------------------------------------------------------------------------
#Tickets
#
#
Route::get('/project/{project_id}/tickets', 'TicketsController@projectTickets')
	->name('project-tickets')
	->where('project_id', '[0-9]+');

Route::get('/ticket/{id}', 'TicketsController@singleTicket')
	->name('ticket')
	->where('id', '[0-9]+');
#-----------------------------------------------------------------------------------
#About
#
#
Route::get('/about', 'AboutController@index')
	->name('about');
#-----------------------------------------------------------------------------------
#Contacts
#
#
Route::get('/contacts', 'ContactsController@index')
	->name('contacts');
#-----------------------------------------------------------------------------------
#Team
#
#
Route::get('/team', 'TeamController@allDevelopers')
	->name('team');
Route::get('/developer/{id}', 'TeamController@singleDeveloper')
	->name('developer')
	->where('id', '[0-9]+');
