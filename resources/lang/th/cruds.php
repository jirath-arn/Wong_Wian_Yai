<?php

return [
    'setting'       => [
        'title'          => 'ตั้งค่า',
        'title_singular' => 'ตั้งค่า',
    ],
    'profile'       => [
        'title'          => 'ประวัติของฉัน',
    ],
    'restaurant'    => [
        'title'             => 'ร้านอาหาร',
        'title_singular'    => 'ร้านอาหาร',
        'fields'            => [
            'id'                    => 'ไอดี',
            'user_id'               => 'ผู้ใช้งาน',
            'category_id'           => 'ประเภท',
            'name'                  => 'ชื่อ',
            'description'           => 'คำอธิบาย',
            'image'                 => 'รูปภาพ',
            'telephone'             => 'โทรศัพท์',
            'address'               => 'ที่อยู่',
            'website'               => 'เว็บไซต์',
            'created_at'            => 'สร้างเมื่อ',
            'updated_at'            => 'อัปเดตเมื่อ',
        ],
    ],
    'review'        => [
        'title'             => 'รีวิว',
        'title_singular'    => 'รีวิว',
        'fields'            => [
            'id'                    => 'ไอดี',
            'user_id'               => 'ผู้ใช้งาน',
            'restaurant_id'         => 'ร้านอาหาร',
            'description'           => 'คำอธิบาย',
            'score'                 => 'คะแนน',
            'created_at'            => 'สร้างเมื่อ',
            'updated_at'            => 'อัปเดตเมื่อ',
        ],
    ],
    'category'      => [
        'title'             => 'ประเภท',
        'title_singular'    => 'ประเภท',
        'fields'            => [
            'id'                    => 'ไอดี',
            'title'                 => 'หัวข้อ',
            'created_at'            => 'สร้างเมื่อ',
            'updated_at'            => 'อัปเดตเมื่อ',
        ],
    ],
    'permission'    => [
        'title'             => 'สิทธิ์',
        'title_singular'    => 'สิทธิ์',
        'fields'            => [
            'id'                    => 'ไอดี',
            'title'                 => 'หัวข้อ',
            'created_at'            => 'สร้างเมื่อ',
            'updated_at'            => 'อัปเดตเมื่อ',
        ],
    ],
    'role'          => [
        'title'             => 'ตำแหน่ง',
        'title_singular'    => 'ตำแหน่ง',
        'fields'            => [
            'id'                    => 'ไอดี',
            'title'                 => 'หัวข้อ',
            'created_at'            => 'สร้างเมื่อ',
            'updated_at'            => 'อัปเดตเมื่อ',
        ],
    ],
    'user'          => [
        'title'             => 'ผู้ใช้งาน',
        'title_singular'    => 'ผู้ใช้งาน',
        'fields'            => [
            'id'                    => 'ไอดี',
            'username'              => 'ชื่อผู้ใช้',
            'roles'                 => 'ตำแหน่ง',
            'email'                 => 'อีเมล',
            'email_verified_at'     => 'ตรวจสอบอีเมลเมื่อ',
            'password'              => 'รหัสผ่าน',
            'remember_token'        => 'โทเค็น',
            'created_at'            => 'สร้างเมื่อ',
            'updated_at'            => 'อัปเดตเมื่อ',
        ],
    ],
];
