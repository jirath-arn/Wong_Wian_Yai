<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            [
                'id'            => 1,
                'user_id'       => 2,
                'restaurant_id' => 1,
                'description'   => 'อาหารอร่อยมาก น่ารับประทาน ร้านสะอาด',
                'score'         => 5,
                'created_at'    => '2021-04-11 17:01:44',
                'updated_at'    => '2021-04-11 17:01:44',
            ],
            [
                'id'            => 2,
                'user_id'       => 2,
                'restaurant_id' => 1,
                'description'   => 'เดินทางสะดวก ร้านสะอาดแต่พนักงานบริการไม่ค่อยดี',
                'score'         => 4,
                'created_at'    => '2021-04-11 17:02:44',
                'updated_at'    => '2021-04-11 17:02:44',
            ],
        ];

        Review::insert($reviews);
    }
}
