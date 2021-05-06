<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2021-04-11 17:01:44',
                'updated_at' => '2021-04-11 17:01:44',
            ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2021-04-11 17:02:44',
                'updated_at' => '2021-04-11 17:02:44',
            ],
        ];

        Role::insert($roles);
    }
}
