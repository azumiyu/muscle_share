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
    //トップ画面表示
    Route::get('/', 'HomeController@index');
    //主に筋トレ掲示板のルーティング
    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/add_workout', 'PostController@add_workout');
    Route::post('/posts', 'PostController@store');
    Route::post('/add_workout', 'WorkoutController@work_store');
    Route::get('/workouts/{workout}', 'WorkoutController@index');
    Route::get('/users/{user}', 'UserController@index');
    Route::post('posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
    Route::post('posts/{post}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');
    
    //主にコミュニティのルーティング
    Route::get('/communities', 'CommunityController@index')->name('communities');
    //主にランキングのルーティング
    
    //主に成長記録のルーティング
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

