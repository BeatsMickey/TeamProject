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

Route::get('/', 'HomeController@index')->name('homeindex');

Route::group([
    'prefix' => 'traininglog',
    'namespace' => 'TrainingLog',
    'as' => 'trainingLog.'
], function (){
    Route::get('/calendar', 'TrainingController@index')->name('calendar');
    Route::get('/view_day/{month}/{day}/{today}', 'TrainingController@viewDay')->name('view_day');
    Route::post('/today/add_exercises/{day}/{month}/{today}', 'TrainingController@addExercises')->name('add_exercises');
    Route::get('/today/del_exercises/{day}/{month}/{id}/{today}', 'TrainingController@delExercises')->name('del_exercises');
});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
