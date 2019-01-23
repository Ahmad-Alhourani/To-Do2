<?php

/**
 * Comment Management
 * All route names are prefixed with 'admin.comment'.
 */
Route::group(
    [
        'namespace' => 'Comment',
        'middleware' => 'role:administrator'
    ],
    function () {
        /*
         * Comment CRUD
         */
        Route::resource('comment', 'CommentController');
        Route::get('man/{id}/comments', 'CommentController@man')->name(
            'comment.man'
        );
        Route::get('todo/{id}/comments', 'CommentController@todo')->name(
            'comment.todo'
        );
    }
);
