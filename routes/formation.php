<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth','prefix' => '/admin/formation/'], function () {

        Route::get('list', 'FormationController@index')
            ->name('formation')
            ->middleware('Admin:Formation');
        
        Route::get('create', 'FormationController@create')
            ->name('formation_create')
            ->middleware('Admin:Formation');
        
        Route::post('create', 'FormationController@store')
            ->name('formation_store')
            ->middleware('Admin:Formation');
        
        Route::get('{id}/delete', 'FormationController@destroy')
            ->name('formation_delete')
            ->middleware('Admin:Formation')
            ->where('id', '[0-9]+');
        
        /*Route::get('{id}', 'FormationController@show')
            ->name('formation_show')
            ->middleware('Admin:Formation')
            ->where('id', '[0-9]+');*/
        
        Route::get('{id}/edit', 'FormationController@edit')
            ->name('formation_edit')
            ->middleware('Admin:Formation')
            ->where('id', '[0-9]+');

        Route::get('{id}', 'FormationController@edit')
            ->name('formation_show')
            ->middleware('Admin:Formation')
            ->where('id', '[0-9]+');
        
        Route::post('{id}', 'FormationController@update')
            ->name('formation_update')
            ->middleware('Admin:Formation')
            ->where('id', '[0-9]+');
        
    });
});