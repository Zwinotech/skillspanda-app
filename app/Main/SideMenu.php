<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'inbox',
                'route_name' => 'dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
            ],

            'devider',
            'courses' => [
                'icon' => 'edit',
                'title' => 'Courses',
                'sub_menu' => [
                    'courses' => [
                        'icon' => '',
                        'route_name' => 'courses',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Course List'
                    ],
                    'create-course' => [
                        'icon' => '',
                        'route_name' => 'courses/create',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Create Course'
                    ],
                    'course-categories' => [
                        'icon' => '',
                        'title' => 'Categories',
                        'sub_menu' => [
                            'courses' => [
                                'icon' => '',
                                'route_name' => 'courses/categories',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Category List'
                            ],
                            'create-course' => [
                                'icon' => '',
                                'route_name' => 'courses/categories/create',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Create Category'
                            ],
                        ]
                    ],
                ]
            ],
            'users' => [
                'icon' => 'edit',
                'title' => 'Users',
                'sub_menu' => [
                    'users' => [
                        'icon' => '',
                        'route_name' => 'users',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'User List'
                    ],
                    'create-users' => [
                        'icon' => '',
                        'route_name' => 'users/create',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Create User'
                    ],

                ]
            ],
            'roles' => [
                'icon' => 'edit',
                'title' => 'Roles',
                'sub_menu' => [
                    'roles' => [
                        'icon' => '',
                        'route_name' => 'roles',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Roles'
                    ],
                    'create-roles' => [
                        'icon' => '',
                        'route_name' => 'roles/create',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Create Role'
                    ],

                ]
            ],

        ];
    }
}
