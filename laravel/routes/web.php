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

Route::get('/', 'HomeController@index')->name('home');

/*
 * Роуты к тренировочному дневнику
 */
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

/*
 * Роуты к админке
 */
Route::group([
    'prefix' => 'admin/',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => 'access.admin'],
    function () {

    });

/*
 * Роуты к личному кабинету
 */
Route::group([
    'prefix' => 'personal/',
    'namespace' => 'PersonalArea',
    'as' => 'personal.',
    'middleware' => 'auth.check'],
    function () {
        Route::get('/area', 'PersonalArea@index')->name('area');
    });

/*
 * Роуты к моим упражнениям
 */
Route::group([
    'prefix' => 'program/',
    'namespace' => 'Program',
    'as' => 'program.',
    'middleware' => 'auth.check'],
    function () {
        Route::get('/all', 'ProgramController@index')->name('index');
        Route::get('/show/{id}', 'ProgramController@show')->name('show');
        Route::get('/choose/{id}', 'ProgramController@chooseProgram')->name('choose');
    });


Auth::routes();

