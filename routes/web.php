<?php

use Illuminate\Support\Facades\Route;

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

// Make any other routes below Auth::routes() only accessible after authentication
Auth::routes();

Route::resource('/goals', 'GoalsController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('users', 'HomeController@getUsers')->name('get.users');
Route::resource('/logbooks', 'LogBooksController');
Route::resource('/objectives', 'ObjectivesController');
Route::resource('/steps', 'StepsController');
Route::resource('/tags', 'TagsController');
Route::put('/steps/done/{step}', 'StepsController@doneHandler')->name('step.isDone');


// Fetch API
Route::get('/getSteps', 'StepsController@getSteps');


