<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'         => 1,
                'title'      => 'review_create',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 2,
                'title'      => 'review_edit',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 3,
                'title'      => 'review_show',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 4,
                'title'      => 'review_delete',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 5,
                'title'      => 'review_access',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 6,
                'title'      => 'restaurant_create',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 7,
                'title'      => 'restaurant_edit',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 8,
                'title'      => 'restaurant_show',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 9,
                'title'      => 'restaurant_delete',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 10,
                'title'      => 'restaurant_access',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
        ];

        Permission::insert($permissions);
    }
}
