<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'copyright' => 'Copyright',
        'custom' => 'Custom',
        'actions' => 'Actions',
        'active' => 'Active',
        'buttons' => [
            'save' => 'Save',
            'update' => 'Update'
        ],
        'hide' => 'Hide',
        'inactive' => 'Inactive',
        'none' => 'None',
        'show' => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
        'create_new' => 'Create New',
        'toolbar_btn_groups' => 'Toolbar with button groups',
        'more' => 'More',
        'none' => 'None'
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total'
                ]
            ],

            'users' => [
                'active' => 'Active Users',
                'all_permissions' => 'All Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'management' => 'User Management',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',
                'user_actions' => 'User Actions',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Created',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'abilities' => 'Abilities',
                    'roles' => 'Roles',
                    'social' => 'Social',
                    'total' => 'user total|users total'
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history' => 'History'
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmed',
                            'created_at' => 'Created At',
                            'deleted_at' => 'Deleted At',
                            'email' => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Last Updated',
                            'name' => 'Name',
                            'first_name' => 'First Name',
                            'last_name' => 'Last Name',
                            'status' => 'Status',
                            'timezone' => 'Timezone'
                        ]
                    ]
                ],

                'view' => 'View User'
            ]
        ],

        //start_Person_start
        'men' => [
            'management' => ' People Management',
            'create' => 'Create Person',
            'view' => 'View Person',
            'edit' => 'Edit Person',

            'table' => [
                'id' => "Id",
                'name' => "Name",
                'email' => "Email",
                'sms' => "SMS",
                'sort' => 'Sort',
                'total' => ' People total| People total'
            ],

            'content' => [
                'created_at' => 'Created At',
                'deleted_at' => 'Deleted At',
                'last_updated' => 'Last Update'
            ]
        ],
        //end_Person_end

        //start_Todo_start
        'todos' => [
            'management' => ' Todoes Management',
            'create' => 'Create Todo',
            'view' => 'View Todo',
            'edit' => 'Edit Todo',

            'table' => [
                'id' => "Id",
                'title' => "Title",
                'description' => "Description",
                'deadline' => "Deadline",
                'sort' => 'Sort',
                'total' => ' Todoes total| Todoes total'
            ],

            'content' => [
                'created_at' => 'Created At',
                'deleted_at' => 'Deleted At',
                'last_updated' => 'Last Update'
            ]
        ],
        //end_Todo_end

        //start_Comment_start
        'comments' => [
            'management' => ' Comments Management',
            'create' => 'Create Comment',
            'view' => 'View Comment',
            'edit' => 'Edit Comment',

            'table' => [
                'id' => "Id",
                'body' => "Body",
                'person_id' => "User Name",
                'todo_id' => "Todo Title",
                'sort' => 'Sort',
                'total' => ' Comments total| Comments total'
            ],

            'content' => [
                'created_at' => 'Created At',
                'deleted_at' => 'Deleted At',
                'last_updated' => 'Last Update'
            ]
        ],
        //end_Comment_end

        //start_Category_start
        'categories' => [
            'management' => ' Categories Management',
            'create' => 'Create Category',
            'view' => 'View Category',
            'edit' => 'Edit Category',

            'table' => [
                'id' => "Id",
                'name' => "Name",
                'sort' => 'Sort',
                'total' => ' Categories total| Categories total'
            ],

            'content' => [
                'created_at' => 'Created At',
                'deleted_at' => 'Deleted At',
                'last_updated' => 'Last Update'
            ]
        ]
        //end_Category_end

        // Do not delete me :) I'm used for auto-generation
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me'
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information'
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'update_password_button' => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link'
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password'
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'update_information' => 'Update Information'
            ]
        ]
    ]
];
