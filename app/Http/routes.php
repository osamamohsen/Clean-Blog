<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'ArticlesController@index');
Route::get('/home', 'ArticlesController@index');
Route::resource('/articles','ArticlesController',['except' => ['update','edit']]);

Route::get('/sections/create/{id}','SectionsController@create');
Route::get('/sections/{id}','SectionsController@delete');
Route::post('/sections','SectionsController@store');

Route::get('/login','UserController@indexlogin');
Route::post('/login','UserController@login');

Route::get('/register', 'UserController@indexRegister');
Route::post('/register', 'UserController@store');
Route::get('/logout', 'UserController@logout');


Route::get('/404','ExceptionController@notfound_404');

Route::get('/tags/{id}','TagsController@show');