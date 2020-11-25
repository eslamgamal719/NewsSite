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
/*
Route::get('/', function () {
    return view('welcome');
});*/









Route::group(['namespace' => 'dashboard', 'middleware' => 'auth'], function() {

    //Departments Routes
    Route::resource('departments', 'DepartmentsController')->except('show');

    //Employees Routes
    Route::get('add-employee', 'UsersController@addEmployee')->name('add-employee');
    Route::post('add-employee', 'UsersController@postAddEmployee')->name('post-add-employee');

    //Supervisors Routes
    Route::get('show-supervisors', 'UsersController@getSupervisors')->name('get-supervisors');
    Route::get('edit-supervisor/{id}', 'UsersController@editSupervisor')->name('edit-supervisor');
    Route::post('update-supervisor/{id}', 'UsersController@updateSupervisor')->name('update-supervisor');
    Route::get('delete-supervisor/{id}', 'UsersController@deleteSupervisor')->name('delete-supervisor');

    //Editors Routes
    Route::get('show-editors', 'UsersController@getEditors')->name('get-editors');
    Route::get('edit-editor/{id}', 'UsersController@editEditors')->name('edit-editor');
    Route::post('update-editor/{id}', 'UsersController@updateEditors')->name('update-editor');
    Route::get('delete-editor/{id}', 'UsersController@deleteEditors')->name('delete-editor');

    //Writer Routes
    Route::get('show-writers', 'UsersController@getWriters')->name('get-writers');
    Route::get('edit-writer/{id}', 'UsersController@editWriter')->name('edit-writer');
    Route::post('update-writer/{id}', 'UsersController@updateWriter')->name('update-writer');
    Route::get('delete-writer/{id}', 'UsersController@deleteWriter')->name('delete-writer');

    Route::get('editors', 'UsersController@getEditors')->name('get-editors');
    Route::get('writers', 'UsersController@getWriters')->name('get-writers');


    Route::resource('articles',  'ArticlesController');


    Route::get('/', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');

    Route::get('/admin', function () {
        return view('layouts.admin');
    });

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

