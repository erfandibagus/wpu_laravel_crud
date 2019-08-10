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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');

// Students Route Manual
// Route::get('/students', 'StudentsController@index');
// Route::get('/students/create', 'StudentsController@create');
// Route::get('/students/{student}', 'StudentsController@show');
// Route::post('/students', 'StudentsController@store');
// Route::delete('/students/{student}', 'StudentsController@destroy');
// Route::get('/students/{student}/edit', 'StudentsController@edit');
// Route::put('/students/{student}', 'StudentsController@update');

// Student Route with Resource
Route::resource('students', 'StudentsController');

// Soft Delete Student Route
Route::get('/students/{id}/trashed', 'StudentsController@trashed');
Route::put('/students/{id}/trashed', 'StudentsController@undelete');
Route::delete('/students/{id}/trashed', 'StudentsController@delete');
