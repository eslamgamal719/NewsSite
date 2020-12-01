<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'departments' => 'c,r,u,d',
            'articles' => 'c,r,u,d',
            'supervisors' => 'c,r,u,d',
            'editors' => 'c,r,u,d',
            'writers' => 'c,r,u,d',
            'users' => 'c,r,u,d'
        ],

        'supervisor' => [
            'departments' => 'r,u,d',
            'articles' => 'r,u,d',
        ],

        'editor' => [
            'departments' => 'r',
            'articles' => 'r,u,d',
        ],
        'writer' => [
            'articles' => 'c,r,u,d',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
