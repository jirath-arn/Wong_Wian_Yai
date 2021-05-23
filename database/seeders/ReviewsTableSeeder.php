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
            [
                'id'            => 3,
                'user_id'       => 2,
                'restaurant_id' => 2,
                'description'   => 'อาหารอร่อยมาก น่ารับประทาน ร้านสะอาด',
                'score'         => 4,
                'created_at'    => '2021-04-11 17:03:44',
                'updated_at'    => '2021-04-11 17:03:44',
            ],
            [
                'id'            => 4,
                'user_id'       => 1,
                'restaurant_id' => 3,
                'description'   => 'เดินทางสะดวก ร้านสะอาดแต่พนักงานบริการไม่ค่อยดี',
                'score'         => 3,
                'created_at'    => '2021-04-11 17:04:44',
                'updated_at'    => '2021-04-11 17:04:44',
            ],
            [
                'id'            => 5,
                'user_id'       => 1,
                'restaurant_id' => 3,
                'description'   => 'อาหารไม่อร่อย',
                'score'         => 1,
                'created_at'    => '2021-04-11 17:05:44',
                'updated_at'    => '2021-04-11 17:05:44',
            ],
            [
                'id'            => 6,
                'user_id'       => 1,
                'restaurant_id' => 3,
                'description'   => 'พนักงานบริการไม่ดี',
                'score'         => 1,
                'created_at'    => '2021-04-11 17:06:44',
                'updated_at'    => '2021-04-11 17:06:44',
            ],
            [
                'id'            => 7,
                'user_id'       => 1,
                'restaurant_id' => 4,
                'description'   => 'อาหารอร่อยมากๆ',
                'score'         => 5,
                'created_at'    => '2021-04-11 17:07:44',
                'updated_at'    => '2021-04-11 17:07:44',
            ],
            [
                'id'            => 8,
                'user_id'       => 2,
                'restaurant_id' => 4,
                'description'   => 'อาหารอร่อยมากๆ สุดยอด',
                'score'         => 5,
                'created_at'    => '2021-04-11 17:08:44',
                'updated_at'    => '2021-04-11 17:08:44',
            ],
        ];

        Review::insert($reviews);
    }
}
