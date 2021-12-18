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
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'HomeController@index');
    Route::get('/posts', 'PostController@index');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/add_workout', 'PostController@add_workout');
    Route::post('/posts', 'PostController@store');
    Route::post('/posts', 'PostController@work_store');
    Route::get('/workouts/{workout}', 'WorkoutController@index');
    Route::get('/users/{user}', 'UserController@index');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

