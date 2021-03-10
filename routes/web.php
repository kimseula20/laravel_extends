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

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');
Route::post('/tasks/create', 'TaskController@store')->name('tasks.store');
Route::get('/tasks/create/{task}', 'TaskController@edit');
Route::post('/tasks/create/{task}', 'TaskController@update')->name('tasks.update');
Route::get('/tasks/show/{task}', 'TaskController@show');
//Route::get('/tasks/delete/{task}', 'TaskController@destroy');
Route::delete('/tasks/{task}', 'TaskController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
