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
    return redirect('\home');
});

Route::get('/images', 'ImageController@index')->middleware('auth');
Route::get('/logout', function () {
	Auth::logout();
    return redirect('/home');
})->middleware('auth');
Route::get('/images/create', 'ImageController@create')->middleware('auth'); //form
Route::post('/images', 'ImageController@store')->middleware('auth');
Route::get('/images/{image}', 'ImageController@show')->middleware('auth');
Route::get('/images/{image}/edit', 'ImageController@edit')->middleware('auth'); //form
Route::put('/images/{image}', 'ImageController@update')->middleware('auth');
Route::get('/images/delete/{image}', 'ImageController@destroy')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
