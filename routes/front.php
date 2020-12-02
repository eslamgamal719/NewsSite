<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Front'], function() {


    Route::get('/', 'FrontController@index')->name('front');

    Route::get('content/{id}', 'FrontController@getContent')->name('content');

    Route::get('get-department/{id}', 'FrontController@getDepartment')->name('get-department');


});

