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
 * Роуты к авторизации
 */
Auth::routes();

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
 * Роуты упражнениям
 */
Route::group([
    'prefix' => 'exercises',
    'namespace' => 'Exercises',
    'as' => 'exercises.'
], function (){
    Route::get('/', 'ExercisesController@index')->name('index');
    Route::get('/categories/{id}', 'ExercisesController@categories')->name('categories');
    Route::get('/exercises_card/{id}', 'ExercisesController@card')->name('card');
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
        /*
         * Редактирование пользователей
         */
        Route::view('/', 'admin.admin_menu')->name('main');
        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
        ], function () {
            Route::get('/all', 'AdminUsersController@index')->name('all');
            Route::get('/update/{id}', 'AdminUsersController@update')->name('update');
            Route::post('/save/{id}', 'AdminUsersController@save')->name('save');
        });

        /*
         * Редактирование упражнений
         */
        Route::group([
            'prefix' => 'exercises',
            'as' => 'exercises.',
        ], function () {
            Route::get('/all', 'AdminExercisesController@index')->name('all');
        });

        /*
         * Редактирование программ
         */
        Route::group([
            'prefix' => 'program',
            'as' => 'program.',
        ], function () {
            Route::get('/all', 'AdminProgramController@index')->name('all');
        });


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
        Route::post('/change', 'PersonalArea@change')->name('change');
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




