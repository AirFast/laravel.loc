<?php

return [

    'admin' => [

        'menu-title' => 'Admin menu',
        'title'      => 'Admin panel',

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

            'territory' => [

                'admin-title'             => 'Responsible for the territory',
                'admin-default'           => 'Select responsible for the territory',
                'map-title'               => 'Map of the territory',
                'map-zoom'                => 'Map zoom',
                'map-zoom-control'        => 'Map zoom control',
                'map-type-control'        => 'Map type control',
                'map-street-view-control' => 'Map street view control',
                'map-scroll-wheel'        => 'Mouse scroll wheel control',
                'map-full-screen-control' => 'Full screen control',

            ],

            'status' => 'Settings has been saved!',

        ],

    ],

    'user' => [

        'menu-title' => 'User menu',
        'title'      => 'User profile',
        'add-new'    => 'Add new user',
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

        ],

        'message' => [

            'verified'     => 'This user has verified their email.',
            'not-verified' => 'This user has not verified their email.',

        ]

    ],

    'territories' => [

        'title'          => 'Territory',
        'your-title'     => 'Your territories',
        'marker-title'   => 'Your territory is here',
        'address'        => 'Address',
        'user'           => 'Preacher',
        'time-to'        => 'Work until',
        'time-start'     => 'Beginning',
        'time-end'       => 'Completion',
        'no-territories' => 'There are no territories...',
        'no-data'        => 'No data yet...',
        'statistics'     => 'Statistics on processing',
        'btn-start'      => 'Take the territory',
        'btn-end'        => 'Give the territory',

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

            'update-start' => 'You really want to ask about territories',
            'update-end'   => 'You really want to hand over the territory',
            'delete'       => 'Do you really want to delete the territory',
            'btn-no'       => 'No',
            'btn-yes'      => 'Yes, I want',

        ],

        'alert' => [

            'create' => 'The territory :name has been successfully added!',
            'update' => 'The territory has successfully updated!',
            'delete' => 'The territory has been deleted!',
            'error'  => 'Nobody is assigned to cultivate the territory.',

        ],

        'message' => [

            'territory-pending'      => ':name wants to process this territory.',
            'territory-warning'      => 'The territory is pending. No one preacher can take it for processing.',
            'territory-warning-user' => 'The territory is pending. You can\'t process it until the person in charge of the territory assigns it to you.',
            'territory-end-short'    => 'Time for processing of the territory ended.',
            'territory-end'          => 'Time for processing of the territory ended. Please hand it over to the person in charge of the territory.',
            'territory-take'         => 'Your request for processing of the territory was sent to the person in charge of the territory.',
            'territory-give'         => 'The territory is handed over.',

        ]

    ],

    'menu' => [

        'settings'    => 'Settings',
        'user'        => 'My page',
        'users'       => 'Users',
        'territories' => 'Territories',
        'schedule'    => 'The ministry schedule with stand'

    ]

];
