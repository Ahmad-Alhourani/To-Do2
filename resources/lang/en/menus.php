<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access',

            'roles' => [
                'all' => 'All Roles',
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',
                'main' => 'Roles'
            ],

            'users' => [
                'all' => 'All Users',
                'change-password' => 'Change Password',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'main' => 'Users',
                'view' => 'View User'
            ]
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs'
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'General',
            'history' => 'History',
            'system' => 'System',

            //begin_Person_begin
            'men' => ' People',
            //finish_Person_finish
            //begin_Todo_begin
            'todos' => ' Todoes',
            //finish_Todo_finish
            //begin_Comment_begin
            'comments' => ' Comments',
            //finish_Comment_finish
            //begin_Category_begin
            'categories' => ' Categories'
            //finish_Category_finish
            // **********Do_Not_Delete_me****************
        ],

        //start_Person_start
        'men' => [
            'view' => 'View Person',
            'all' => 'All  People',
            'create' => 'Create Person',
            'edit' => 'Edit Person',
            'management' => 'Person Management',
            'main' => ' People'
        ],
        //end_Person_end

        //start_Todo_start
        'todos' => [
            'view' => 'View Todo',
            'all' => 'All  Todoes',
            'create' => 'Create Todo',
            'edit' => 'Edit Todo',
            'management' => 'Todo Management',
            'main' => ' Todoes'
        ],
        //end_Todo_end

        //start_Comment_start
        'comments' => [
            'view' => 'View Comment',
            'all' => 'All  Comments',
            'create' => 'Create Comment',
            'edit' => 'Edit Comment',
            'management' => 'Comment Management',
            'main' => ' Comments'
        ],
        //end_Comment_end

        //start_Category_start
        'categories' => [
            'view' => 'View Category',
            'all' => 'All  Categories',
            'create' => 'Create Category',
            'edit' => 'Edit Category',
            'management' => 'Category Management',
            'main' => ' Categories'
        ]
        //end_Category_end

        // Do not delete me :) I'm used for auto-generation
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'Arabic',
            'zh' => 'Chinese Simplified',
            'zh-TW' => 'Chinese Traditional',
            'da' => 'Danish',
            'de' => 'German',
            'el' => 'Greek',
            'en' => 'English',
            'es' => 'Spanish',
            'fa' => 'Persian',
            'fr' => 'French',
            'he' => 'Hebrew',
            'id' => 'Indonesian',
            'it' => 'Italian',
            'ja' => 'Japanese',
            'nl' => 'Dutch',
            'no' => 'Norwegian',
            'pt_BR' => 'Brazilian Portuguese',
            'ru' => 'Russian',
            'sv' => 'Swedish',
            'th' => 'Thai',
            'tr' => 'Turkish'
        ]
    ]
];
