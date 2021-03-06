<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'roles' => [
            'created' => 'The role was successfully created.',
            'deleted' => 'The role was successfully deleted.',
            'updated' => 'The role was successfully updated.'
        ],

        'users' => [
            'cant_resend_confirmation' =>
                'The application is currently set to manually approve users.',
            'confirmation_email' =>
                'A new confirmation e-mail has been sent to the address on file.',
            'confirmed' => 'The user was successfully confirmed.',
            'created' => 'The user was successfully created.',
            'deleted' => 'The user was successfully deleted.',
            'deleted_permanently' => 'The user was deleted permanently.',
            'restored' => 'The user was successfully restored.',
            'session_cleared' => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated' => 'The user was successfully updated.',
            'updated_password' =>
                "The user's password was successfully updated."
        ]
    ],

    'frontend' => [
        'contact' => [
            'sent' =>
                'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.'
        ],

        //start_Person_start
        'man' => [
            'saved' => 'Person saved successfully.',
            'updated' => 'Person updated successfully.',
            'deleted' => 'Person deleted successfully.'
        ],
        //end_Person_end

        //start_Todo_start
        'todo' => [
            'saved' => 'Todo saved successfully.',
            'updated' => 'Todo updated successfully.',
            'deleted' => 'Todo deleted successfully.'
        ],
        //end_Todo_end

        //start_Comment_start
        'comment' => [
            'saved' => 'Comment saved successfully.',
            'updated' => 'Comment updated successfully.',
            'deleted' => 'Comment deleted successfully.'
        ],
        //end_Comment_end

        //start_Category_start
        'category' => [
            'saved' => 'Category saved successfully.',
            'updated' => 'Category updated successfully.',
            'deleted' => 'Category deleted successfully.'
        ]
        //end_Category_end

        // Do not delete me :) I'm used for auto-generation
    ]
];
