<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth','prefix' => '/admin/note/'], function () {

        Route::get('list', 'NoteController@index')
            ->name('note')
            ->middleware('Admin:Note');
        
        Route::get('create', 'NoteController@create')
            ->name('note_create')
            ->middleware('Admin:Note');
        
        Route::post('create', 'NoteController@store')
            ->name('note_store')
            ->middleware('Admin:Note');
        
        Route::get('note_students', 'NoteController@students')
            ->name('note_students')
            ->middleware('Admin:Note');
        
    });
});