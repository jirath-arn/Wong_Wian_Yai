<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id'         => 1,
                'title'      => 'อาหารไทย',
                'created_at' => '2021-04-11 17:01:44',
                'updated_at' => '2021-04-11 17:01:44',
            ],
            [
                'id'         => 2,
                'title'      => 'อาหารอิตาเลียน',
                'created_at' => '2021-04-11 17:02:44',
                'updated_at' => '2021-04-11 17:02:44',
            ],
        ];

        Category::insert($categories);
    }
}
