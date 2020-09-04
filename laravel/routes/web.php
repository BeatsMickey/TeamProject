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
    Route::get('/categories', 'ExercisesController@index')->name('index');
    Route::get('/exercises/{id}', 'ExercisesController@categories')->name('categories');
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
            Route::get('/categories', 'AdminExercisesController@index')->name('index');
            Route::post('/categories/change/{id}', 'AdminExercisesController@changeActiveCategories')->name('change.categories');
            Route::post('/categories/add', 'AdminExercisesController@addCategories')->name('add.categories');
            Route::get('/exercises/{id}', 'AdminExercisesController@exercises')->name('exercises');
            Route::post('/exercises/delete/{id}/{category_id}', 'AdminExercisesController@delExercises')->name('del.exercises');
            Route::get('/exercises_card', 'AdminExercisesController@exerciseCard')->name('card');
            Route::get('/exercises_card_update/{id}', 'AdminExercisesController@updateCard')->name('update.card');
            Route::post('/exercises/card/change/save/{id}', 'AdminExercisesController@saveCardExercises')->name('save.card');
            Route::post('/exercises/card/change_categories/save/{id}', 'AdminExercisesController@saveCategoryForExercise')->name('save.category.exercise');
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
        Route::get('/reset', 'ProgramController@resetProgram')->name('reset');
        Route::match(['get','post'],'/create', 'ProgramController@create')->name('create');
        Route::match(['get','post'],'/update/{id}', 'ProgramController@update')->name('update');
    });

Route::group([
    'prefix' => 'set/',
    'namespace' => 'Program',
    'as' => 'set.',
    'middleware' => 'auth.check'],
    function () {
        Route::get('/all', 'SetController@index')->name('index');
//        Route::get('/show/{id}', 'SetController@show')->name('show');
//        Route::get('/choose/{id}', 'ProgramController@chooseProgram')->name('choose');
//        Route::get('/reset', 'ProgramController@resetProgram')->name('reset');
        Route::match(['get','post'],'/create', 'SetController@create')->name('create');
        Route::match(['get','post'],'/update/{id}', 'SetController@update')->name('update');
        Route::get('/destroy/{set}', 'SetController@destroy')->name('destroy');
        Route::get('/delete_exercise/{set}/{exercise_id}', 'SetController@deleteExercise')->name('delete_exercise');
    });




