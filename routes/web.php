<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/', 'HomeController@index');


// ADMIN
$router->get('/admin', 'AdminController@index');


// CATEGORY
$router->get('/admin/category', 'CategoryController@index');
$router->post('/admin/category', 'CategoryController@create');
$router->get('/admin/category/{id}', 'CategoryController@get');
$router->put('/admin/category/{id}', 'CategoryController@update');
$router->delete('/admin/category/{id}', 'CategoryController@delete');
$router->put('/admin/category/{id}/activate', 'CategoryController@activate');
$router->put('/admin/category/{id}/inactivate', 'CategoryController@inactivate');


// GENRE
$router->get('/admin/genre', 'GenreController@index');
$router->post('/admin/genre', 'GenreController@create');
$router->get('/admin/genre/{id}', 'GenreController@get');
$router->put('/admin/genre/{id}', 'GenreController@update');
$router->delete('/admin/genre/{id}', 'GenreController@delete');


// SHOW
$router->get('/admin/show', 'ShowController@index');
$router->post('/admin/show', 'ShowController@create');
$router->get('/admin/show/{id}', 'ShowController@get');
$router->put('/admin/show/{id}', 'ShowController@update');
$router->delete('/admin/show/{id}', 'ShowController@delete');
$router->post('/admin/show/{id}/uploadCover', 'ShowController@uploadCover');
$router->post('/admin/show/{id}/uploadTrailer', 'ShowController@uploadTrailer');
$router->put('/admin/show/{id}/activate', 'ShowController@activate');
$router->put('/admin/show/{id}/inactivate', 'ShowController@inactivate');



// UPLOAD
$router->get('/watch', 'ShowController@testVideo');