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

Route::get('/projects/{slug}/edit', 'ProjectsController@editProjectView')
	->where('slug', '[a-zA-Z0-9_-]+')
	->name('project-edit')
	->middleware(['role:owner']);

Route::post('/projects/{slug}/edit', 'ProjectsController@editProject')
	->where('slug', '[a-zA-Z0-9_-]+')
	->name('project-edit-submit')
	->middleware(['role:owner']);

Route::get('/projects/{slug}/delete', 'ProjectsController@deleteProject')
	->where('slug', '[a-zA-Z0-9_-]+')
	->name('project-delete-submit')
	->middleware(['role:owner']);

Route::get('/projects/{slug}', 'ProjectsController@singleProject')
	->name('project')
	->where('slug', '[a-zA-Z0-9_-]+');

Route::get('/projects/{project_id}/screenshots/{id}/delete', 'ProjectsController@deleteScreenshot')
	->name('project-screenshot-delete-submit')
	->where('project_id', '[0-9]+')
	->where('id', '[0-9]+')
	->middleware(['role:owner']);

Route::get('/projects/{project_id}/screenshots', 'ProjectsController@projectScreenshotsJson')
	->name('project-screenshots')
	->where('project_id', '[0-9]+')
	->middleware(['role:owner']);
#-----------------------------------------------------------------------------------
#Project comments
#
#
Route::get('/projects/{slug}/comments', 'ProjectCommentsController@projectComments')
	->name('project-comments')
	->where('slug', '[a-zA-Z0-9_-]+');

Route::post('/projects/comments/add', 'ProjectCommentsController@addComment')
	->name('project-comment-add');
#-----------------------------------------------------------------------------------
#Tickets
#
#
Route::get('/projects/{project_slug}/tickets', 'TicketsController@projectTickets')
	->name('project-tickets')
	->where('project_slug', '[a-zA-Z0-9_-]+');

Route::get('/projects/{project_slug}/tickets/{id}', 'TicketsController@singleTicket')
	->name('ticket')
	->where('project_slug', '[a-zA-Z0-9_-]+')
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
#Developers
#
#
Route::get('/developers', 'DevelopersController@allDevelopers')
	->name('developers');

Route::get('/developers/{surname}', 'DevelopersController@singleDeveloper')
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