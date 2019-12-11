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

Route::get('/posts', 'PostController@index');
Route::post('/post/add', 'PostController@store');
Route::delete('/post/delete/{post}', 'PostController@destroy');
Route::post('/post/publish/{id}', 'PostController@publish');
Route::get('/categories', 'CategoryController@index');

Route::post('/users/register', 'UserController@register')->middleware('guest');
Route::post('/users/login', 'UserController@login')->middleware('guest');
Route::get('/users/logout', 'UserController@logout')->middleware('auth');
