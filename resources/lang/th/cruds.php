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
            'id'                       => 'ID',
        ],
    ],
    'review'        => [
        'title'             => 'รีวิว',
        'title_singular'    => 'รีวิว',
        'fields'            => [
            'id'                       => 'ID',
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
            'email'                 => 'อีเมล',
            'email_verified_at'     => 'ตรวจสอบอีเมลเมื่อ',
            'password'              => 'รหัสผ่าน',
            'remember_token'        => 'โทเค็น',
            'created_at'            => 'สร้างเมื่อ',
            'updated_at'            => 'อัปเดตเมื่อ',
        ],
    ],
];
