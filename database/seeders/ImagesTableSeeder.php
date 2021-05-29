<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                'id'            => 1,
                'restaurant_id' => 1,
                'filename'      => '1622264489_1.jpg',
                'path'          => '1/restaurant_1/1622264489_1.jpg',
                'size'          => 457300,
                'created_at'    => '2021-04-11 17:01:44',
                'updated_at'    => '2021-04-11 17:01:44',
            ],
            [
                'id'            => 2,
                'restaurant_id' => 1,
                'filename'      => '1622264489_2.jpg',
                'path'          => '1/restaurant_1/1622264489_2.jpg',
                'size'          => 580544,
                'created_at'    => '2021-04-11 17:02:44',
                'updated_at'    => '2021-04-11 17:02:44',
            ],
            [
                'id'            => 3,
                'restaurant_id' => 1,
                'filename'      => '1622264489_3.jpg',
                'path'          => '1/restaurant_1/1622264489_3.jpg',
                'size'          => 368672,
                'created_at'    => '2021-04-11 17:03:44',
                'updated_at'    => '2021-04-11 17:03:44',
            ],
            [
                'id'            => 4,
                'restaurant_id' => 2,
                'filename'      => '1622264489_1.jpg',
                'path'          => '1/restaurant_2/1622264489_1.jpg',
                'size'          => 140331,
                'created_at'    => '2021-04-11 17:04:44',
                'updated_at'    => '2021-04-11 17:04:44',
            ],
            [
                'id'            => 5,
                'restaurant_id' => 2,
                'filename'      => '1622264489_2.jpg',
                'path'          => '1/restaurant_2/1622264489_2.jpg',
                'size'          => 207099,
                'created_at'    => '2021-04-11 17:05:44',
                'updated_at'    => '2021-04-11 17:05:44',
            ],
            [
                'id'            => 6,
                'restaurant_id' => 2,
                'filename'      => '1622264489_3.jpg',
                'path'          => '1/restaurant_2/1622264489_3.jpg',
                'size'          => 463458,
                'created_at'    => '2021-04-11 17:06:44',
                'updated_at'    => '2021-04-11 17:06:44',
            ],
            [
                'id'            => 7,
                'restaurant_id' => 4,
                'filename'      => '1622264489_1.jpg',
                'path'          => '1/restaurant_4/1622264489_1.jpg',
                'size'          => 359975,
                'created_at'    => '2021-04-11 17:07:44',
                'updated_at'    => '2021-04-11 17:07:44',
            ],
            [
                'id'            => 8,
                'restaurant_id' => 4,
                'filename'      => '1622264489_2.jpg',
                'path'          => '1/restaurant_4/1622264489_2.jpg',
                'size'          => 206704,
                'created_at'    => '2021-04-11 17:08:44',
                'updated_at'    => '2021-04-11 17:08:44',
            ],
            [
                'id'            => 9,
                'restaurant_id' => 4,
                'filename'      => '1622264489_3.jpg',
                'path'          => '1/restaurant_4/1622264489_3.jpg',
                'size'          => 617859,
                'created_at'    => '2021-04-11 17:09:44',
                'updated_at'    => '2021-04-11 17:09:44',
            ],
            [
                'id'            => 10,
                'restaurant_id' => 5,
                'filename'      => '1622264489_1.jpg',
                'path'          => '1/restaurant_5/1622264489_1.jpg',
                'size'          => 213015,
                'created_at'    => '2021-04-11 17:10:44',
                'updated_at'    => '2021-04-11 17:10:44',
            ],
            [
                'id'            => 11,
                'restaurant_id' => 5,
                'filename'      => '1622264489_2.jpg',
                'path'          => '1/restaurant_5/1622264489_2.jpg',
                'size'          => 331734,
                'created_at'    => '2021-04-11 17:11:44',
                'updated_at'    => '2021-04-11 17:11:44',
            ],
            [
                'id'            => 12,
                'restaurant_id' => 5,
                'filename'      => '1622264489_3.jpg',
                'path'          => '1/restaurant_5/1622264489_3.jpg',
                'size'          => 435313,
                'created_at'    => '2021-04-11 17:12:44',
                'updated_at'    => '2021-04-11 17:12:44',
            ],
            [
                'id'            => 13,
                'restaurant_id' => 3,
                'filename'      => '1622264489_1.jpg',
                'path'          => '2/restaurant_3/1622264489_1.jpg',
                'size'          => 257047,
                'created_at'    => '2021-04-11 17:13:44',
                'updated_at'    => '2021-04-11 17:13:44',
            ],
            [
                'id'            => 14,
                'restaurant_id' => 3,
                'filename'      => '1622264489_2.jpg',
                'path'          => '2/restaurant_3/1622264489_2.jpg',
                'size'          => 453248,
                'created_at'    => '2021-04-11 17:14:44',
                'updated_at'    => '2021-04-11 17:14:44',
            ],
            [
                'id'            => 15,
                'restaurant_id' => 3,
                'filename'      => '1622264489_3.jpg',
                'path'          => '2/restaurant_3/1622264489_3.jpg',
                'size'          => 243214,
                'created_at'    => '2021-04-11 17:15:44',
                'updated_at'    => '2021-04-11 17:15:44',
            ],
            [
                'id'            => 16,
                'restaurant_id' => 6,
                'filename'      => '1622264489_1.jpg',
                'path'          => '2/restaurant_6/1622264489_1.jpg',
                'size'          => 223869,
                'created_at'    => '2021-04-11 17:16:44',
                'updated_at'    => '2021-04-11 17:16:44',
            ],
            [
                'id'            => 17,
                'restaurant_id' => 6,
                'filename'      => '1622264489_2.jpg',
                'path'          => '2/restaurant_6/1622264489_2.jpg',
                'size'          => 456572,
                'created_at'    => '2021-04-11 17:17:44',
                'updated_at'    => '2021-04-11 17:17:44',
            ],
            [
                'id'            => 18,
                'restaurant_id' => 6,
                'filename'      => '1622264489_3.jpg',
                'path'          => '2/restaurant_6/1622264489_3.jpg',
                'size'          => 152610,
                'created_at'    => '2021-04-11 17:18:44',
                'updated_at'    => '2021-04-11 17:18:44',
            ],
        ];

        Image::insert($images);
    }
}
