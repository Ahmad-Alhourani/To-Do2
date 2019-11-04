<?php

/**
 * Category Management
 * All route names are prefixed with 'admin.category'.
 */
Route::group(
    [
        'namespace' => 'Category',
        'middleware' => 'role:administrator'
    ],
    function () {
        /*
         * Category CRUD
         */
        Route::resource('category', 'CategoryController');
        Route::get('todo/{id}/categories', 'CategoryController@todo')->name(
            'category.todo'
        );
    }
);
