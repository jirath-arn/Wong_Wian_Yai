<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'id'            => 1,
                'user_id'       => 1,
                'category_id'   => 2,
                'name'          => 'Copper International Buffet',
                'description'   => 'เป็นอาหารประเภทอิตาเลียนที่นำวัตถุจากประเทศอิตาลีโดยเฉพาะ จึงทำให้อาหารมีรสชาติและกลิ่นเป็นเอกลักษณ์',
                'image'         => 'test1.jpg',
                'telephone'     => '0812345678',
                'address'       => '11/11 ต.คลองหนึ่ง อ.คลองหลวง จ.ปทุมธานี 12120',
                'website'       => null,
                'created_at'    => '2021-04-11 17:01:44',
                'updated_at'    => '2021-04-11 17:01:44',
            ],
            [
                'id'            => 2,
                'user_id'       => 1,
                'category_id'   => 1,
                'name'          => 'เจ๊โอว ข้าวต้มเป็ด',
                'description'   => 'ข้าวต้มเป็ดเจ้าแรกของจังหวัดปทุมธานี ที่มีน้ำซุปรสเด็ด เป็ดเนื้อเด้ง แน่นๆ',
                'image'         => 'test2.jpg',
                'telephone'     => '0822334455',
                'address'       => '22/22 ต.คลองหนึ่ง อ.คลองหลวง จ.ปทุมธานี 12120',
                'website'       => 'https://www.wongnai.com/restaurants/jaeo?ref=ct',
                'created_at'    => '2021-04-11 17:02:44',
                'updated_at'    => '2021-04-11 17:02:44',
            ],
            [
                'id'            => 3,
                'user_id'       => 2,
                'category_id'   => 2,
                'name'          => 'Midwinter Green',
                'description'   => 'อร่อย! เด็ด! วัตถุดิบเกรด A+',
                'image'         => 'test3.jpg',
                'telephone'     => '0887654321',
                'address'       => '33/33 ต.คลองหนึ่ง อ.คลองหลวง จ.ปทุมธานี 12120',
                'website'       => 'https://www.wongnai.com/restaurants/midwintergreen?ref=ct',
                'created_at'    => '2021-04-11 17:03:44',
                'updated_at'    => '2021-04-11 17:03:44',
            ],
        ];

        Restaurant::insert($restaurants);
    }
}
