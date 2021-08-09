<?php

return [
    'pages' => [
        'title' => 'Pages',
        'module' => true,
    ],
    'work' => [
        'title' => 'Work',
        'route' => 'admin.work.projects.index',
        'primary_navigation' => [
            'projects' => [
                'title' => 'Projects',
                'module' => true,
                'secondary_navigation' => [
                    'projectCustomers' => [
                        'title' => 'Customers',
                        'module' => true
                    ],
                ]
            ],
            'clients' => [
                'title' => 'Clients',
                'module' => true,
            ],
            'industries' => [
                'title' => 'Industries',
                'module' => true,
            ],
            'studios' => [
                'title' => 'Studios',
                'module' => true,
            ],
        ],
    ],
];
