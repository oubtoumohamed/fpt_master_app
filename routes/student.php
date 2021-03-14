<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth','prefix' => '/admin/student/'], function () {

        Route::get('list', 'StudentController@index')
            ->name('student')
            ->middleware('Admin:Student');
        
        Route::get('create', 'StudentController@create')
            ->name('student_create')
            ->middleware('Admin:Student');
        
        Route::post('create', 'StudentController@store')
            ->name('student_store')
            ->middleware('Admin:Student');
        
        Route::get('{id}/delete', 'StudentController@destroy')
            ->name('student_delete')
            ->middleware('Admin:Student')
            ->where('id', '[0-9]+');
        
        /*Route::get('{id}', 'StudentController@show')
            ->name('student_show')
            ->middleware('Admin:Student')
            ->where('id', '[0-9]+');*/
        
        Route::get('{id}/edit', 'StudentController@edit')
            ->name('student_edit')
            ->middleware('Admin:Student')
            ->where('id', '[0-9]+');

        Route::get('{id}', 'StudentController@edit')
            ->name('student_show')
            ->middleware('Admin:Student')
            ->where('id', '[0-9]+');
        
        Route::post('{id}', 'StudentController@update')
            ->name('student_update')
            ->middleware('Admin:Student')
            ->where('id', '[0-9]+');
        
    });
});