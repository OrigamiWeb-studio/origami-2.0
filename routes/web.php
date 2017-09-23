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
Route::get('/locale/{code}', 'LocalesController@setLocale')
	->name('set-locale');
#-----------------------------------------------------------------------------------
#Homepage
#
#
Route::get('/', 'HomeController@index')
	->name('home');

Route::get('/home', 'HomeController@index');
#-----------------------------------------------------------------------------------
#Projects
#
#
Route::get('/projects', 'ProjectsController@allProjects')
	->name('projects');

Route::post('/projects', 'ProjectsController@allProjectsJson')
	->name('projects-json');

Route::get('/projects/add', 'ProjectsController@addProjectView')
	->name('project-add')
	->middleware(['role:owner']);

Route::post('/projects/add', 'ProjectsController@addProject')
	->name('project-add-submit')
	->middleware(['role:owner']);

Route::get('/projects/{id}/edit', 'ProjectsController@editProjectView')
	->name('project-edit')
	->middleware(['role:owner']);

Route::post('/projects/{id}/edit', 'ProjectsController@editProject')
	->name('project-edit-submit')
	->middleware(['role:owner']);

Route::get('/projects/{id}/delete', 'ProjectsController@deleteProject')
	->where('id', '[0-9]+')
	->name('project-delete-submit')
	->middleware(['role:owner']);

Route::get('/projects/{id}', 'ProjectsController@singleProject')
	->name('project')
	->where('id', '[0-9]+');

Route::get('/projects/screenshots/{id}/delete', 'ProjectsController@deleteScreenshot')
	->name('project-screenshot-delete-submit')
	->where('id', '[0-9]+')
	->middleware(['role:owner']);
#-----------------------------------------------------------------------------------
#Tickets
#
#
Route::get('/projects/{project_id}/tickets', 'TicketsController@projectTickets')
	->name('project-tickets')
	->where('project_id', '[0-9]+');

Route::get('/projects/{project_id}/tickets/{id}', 'TicketsController@singleTicket')
	->name('ticket')
	->where('project_id', '[0-9]+')
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
Route::get('/developers', 'TeamController@allDevelopers')
	->name('developers');

Route::get('/developers/{surname}', 'TeamController@singleDeveloper')
	->name('developer')
	->where('surname', '[a-z]+');
#-----------------------------------------------------------------------------------
#Email requests
#
#
Route::post('/email-requests/start-project', 'EmailRequestsController@saveStartProjectRequest')
	->name('save-start-project-request');

Route::post('/email-requests/contact-us', 'EmailRequestsController@saveContactUsRequest')
	->name('save-contact-us-request');