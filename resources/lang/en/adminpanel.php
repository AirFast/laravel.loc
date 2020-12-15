<?php

return [

    'admin' => [

        'menu-title' => 'Admin Menu',
        'title'      => 'Admin Panel',

        'settings' => [

            'stand' => [

                'title'      => 'The ministry with a stand',
                'time-start' => 'The start of the ministry',
                'time-end'   => 'The end of the ministry',

            ],

            'records' => [

                'title'    => 'The records on the page',
                'per-page' => 'Show no more than',

            ],

            'message' => [

                'title'      => 'The admin message',
                'global-msg' => 'The message will be shown to all users',

            ],

            'status' => 'Settings has been saved!',

        ],

    ],

    'user' => [

        'menu-title' => 'User Menu',
        'title'      => 'User Profile',
        'add-new'    => 'Add New User',
        'no-users'   => 'No users...',

        'table' => [

            'col-name' => 'Name',
            'col-role' => 'Role',
            'admin'    => 'Admin',
            'user'     => 'User',
            'unsigned' => 'Unsigned',

        ],

        'popup' => [

            'delete'  => 'Do you really want to delete user',
            'btn-no'  => 'No',
            'btn-yes' => 'Yes, I want',

        ],

        'alert' => [

            'create' => 'User :name has been successfully added!',
            'update' => 'User has been successfully updated!',
            'delete' => 'User has been deleted!',

        ]

    ],

    'territories' => [

        'title'          => 'Territory',
        'marker-title'   => 'Your territory is here',
        'address'        => 'Address',
        'user'           => 'Preacher',
        'no-territories' => 'There are no territories...',

        'form' => [

            'number'        => 'Number',
            'coordinates'   => 'Coordinates',
            'description'   => 'Description',
            'assign'        => 'Assign to',
            'assign-nobody' => 'Nobody',

            'add-new' => [

                'title' => 'Add new territory',
                'btn'   => 'Add territory'

            ],

            'update' => [

                'title' => 'Update: ',
                'btn'   => 'Update territory'

            ],

        ],

        'status' => [

            'title'     => 'Status',
            'all'       => 'All',
            'processed' => 'Іn process',
            'free'      => 'Is free',
            'pending'   => 'Pending',

        ],

        'popup' => [

            'delete'  => 'Do you really want to delete the territory',
            'btn-no'  => 'No',
            'btn-yes' => 'Yes, I want',

        ],

        'alert' => [

            'create' => 'The territory :name has been successfully added!',
            'update' => 'The territory has successfully updated!',
            'delete' => 'The territory has been deleted!',

        ],

    ],

    'menu' => [

        'settings'    => 'Settings',
        'users'       => 'Users',
        'territories' => 'Territories',
        'schedule'    => 'The ministry schedule with stand'

    ]

];
