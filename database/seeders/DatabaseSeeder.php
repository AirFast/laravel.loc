<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
//        \App\Models\User::factory(100)->create();
//
        // Set Roles in DB
        DB::table( 'roles' )->insert( [
            [
                'name' => 'admin'
            ],
            [
                'name' => 'user'
            ],
            [
                'name' => 'unsigned'
            ],
        ] );

        // Set Admin user in DB
        DB::table( 'users' )->insert( [
            'name'     => 'Admin',
            'role_id'  => 1,
            'email'    => 'admin@email.com',
            'password' => Hash::make( 'password' ),
        ] );

        // Set Settings in DB
        DB::table( 'settings' )->insert( [
            [
                'name'  => 'count_per_page',
                'value' => '10'
            ],
            [
                'name'  => 'stand_time_start',
                'value' => '8'
            ],
            [
                'name'  => 'stand_time_end',
                'value' => '20'
            ],
            [
                'name'  => 'global_admin_message',
                'value' => ''
            ],
        ] );
    }
}
