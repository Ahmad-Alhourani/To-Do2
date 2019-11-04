<?php

/**
 * Todo Management
 * All route names are prefixed with 'admin.todo'.
 */
Route::group(
    [
        'namespace' => 'Todo',
        'middleware' => 'role:administrator'
    ],
    function () {
        /*
         * Todo CRUD
         */
        Route::resource('todo', 'TodoController');
        Route::get('category/{id}/todos', 'TodoController@category')->name(
            'todo.category'
        );
        Route::get('man/{id}/todos', 'TodoController@man')->name('todo.man');
    }
);
