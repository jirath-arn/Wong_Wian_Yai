<?php

return [
    'setting'       => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'profile'       => [
        'title'          => 'My Profile',
    ],
    'restaurant'    => [
        'title'             => 'Restaurants',
        'title_singular'    => 'Restaurant',
        'fields'            => [
            'id'                    => 'ID',
            'user_id'               => 'User',
            'category_id'           => 'Category',
            'name'                  => 'Name',
            'description'           => 'Description',
            'image'                 => 'Image',
            'telephone'             => 'Telephone',
            'address'               => 'Address',
            'website'               => 'Website',
            'created_at'            => 'Created At',
            'updated_at'            => 'Updated At',
        ],
    ],
    'review'        => [
        'title'             => 'Reviews',
        'title_singular'    => 'Review',
        'fields'            => [
            'id'                    => 'ID',
            'user_id'               => 'User',
            'restaurant_id'         => 'Restaurant',
            'description'           => 'Description',
            'score'                 => 'Score',
            'created_at'            => 'Created At',
            'updated_at'            => 'Updated At',
        ],
    ],
    'category'      => [
        'title'             => 'Categories',
        'title_singular'    => 'Category',
        'fields'            => [
            'id'                    => 'ID',
            'title'                 => 'Title',
            'created_at'            => 'Created At',
            'updated_at'            => 'Updated At',
        ],
    ],
    'permission'    => [
        'title'             => 'Permissions',
        'title_singular'    => 'Permission',
        'fields'            => [
            'id'                    => 'ID',
            'title'                 => 'Title',
            'created_at'            => 'Created At',
            'updated_at'            => 'Updated At',
        ],
    ],
    'role'          => [
        'title'             => 'Roles',
        'title_singular'    => 'Role',
        'fields'            => [
            'id'                    => 'ID',
            'title'                 => 'Title',
            'created_at'            => 'Created At',
            'updated_at'            => 'Updated At',
        ],
    ],
    'user'          => [
        'title'             => 'Users',
        'title_singular'    => 'User',
        'fields'            => [
            'id'                    => 'ID',
            'username'              => 'Username',
            'email'                 => 'Email',
            'email_verified_at'     => 'Email Verified At',
            'password'              => 'Password',
            'remember_token'        => 'Remember Token',
            'created_at'            => 'Created At',
            'updated_at'            => 'Updated At',
        ],
    ],
];
