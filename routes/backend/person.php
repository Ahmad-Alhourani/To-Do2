<?php

/**
 * Person Management
 * All route names are prefixed with 'admin.man'.
 */
Route::group(
    [
        'namespace' => 'Person',
        'middleware' => 'role:administrator'
    ],
    function () {
        /*
         * Person CRUD
         */
        Route::resource('man', 'PersonController');
        Route::get('todo/{id}/men', 'PersonController@todo')->name('man.todo');
    }
);
