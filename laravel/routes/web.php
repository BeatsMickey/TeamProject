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

//<<<<<<< Updated upstream
//Route::get('/', function () {
//    return view('index');
//});

//Route::get('/calendar', function () {
//    return view('calendar');
//});
//
//Route::get('/alreadyDoneExercises', function () {
//    return view('alreadyDoneExercises');
//});
//
//Route::get('/exercise', function () {
//    return view('exercise');
//});

Route::get('/', 'HomeController@index')->name('homeindex');

Route::group([
    'prefix' => 'traininglog',
    'namespace' => 'TrainingLog',
    'as' => 'trainingLog.'
], function (){
    Route::get('/calendar/{month}', 'TrainingController@index')->name('calendar');
    Route::get('/today/{month}/{day}', 'TrainingController@today')->name('today');
    Route::post('/today/add_exercises/{day}/{month}', 'TrainingController@addExercises')->name('add_exercises');
    Route::get('/today/del_exercises/{day}/{month}/{id}', 'TrainingController@delExercises')->name('del_exercises');
    Route::get('/view/{month}/{day}', 'TrainingController@view')->name('view');
});


