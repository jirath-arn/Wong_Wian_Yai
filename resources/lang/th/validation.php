<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute จะต้องได้รับการยอมรับ',
    'active_url' => ':attribute ไม่ใช่ URL ที่ถูกต้อง',
    'after' => ':attribute ต้องเป็นวันที่หลังจากนั้น :date',
    'after_or_equal' => ':attribute ต้องเป็นวันที่หลังหรือเท่ากับ :date',
    'alpha' => ':attribute อาจมีเฉพาะตัวอักษร',
    'alpha_dash' => ':attribute ต้องประกอบด้วยตัวอักษร, ตัวเลข, ขีดกลาง และขีดล่างเท่านั้น',
    'alpha_num' => ':attribute ต้องประกอบด้วยตัวอักษรและตัวเลขเท่านั้น',
    'array' => ':attribute ต้องเป็นรายการ',
    'before' => ':attribute ต้องเป็นวันที่ก่อน :date',
    'before_or_equal' => ':attribute ต้องเป็นวันที่ก่อนหรือเท่ากับ :date',
    'between' => [
        'numeric' => ':attribute ต้องอยู่ระหว่าง :min และ :max',
        'file' => ':attribute ต้องอยู่ระหว่าง :min และ :max กิโลไบต์',
        'string' => ':attribute ต้องอยู่ระหว่าง :min และ :max อักขระ',
        'array' => ':attribute ต้องอยู่ระหว่าง :min และ :max รายการ',
    ],
    'boolean' => ':attribute ฟิลด์ต้องเป็นจริงหรือเท็จ',
    'confirmed' => ':attribute การยืนยันไม่ตรงกัน',
    'date' => ':attribute ไม่ใช่วันที่ที่ถูกต้อง',
    'date_equals' => ':attribute ต้องเป็นวันที่เท่ากับ :date',
    'date_format' => ':attribute ไม่ตรงกับรูปแบบ :format',
    'different' => ':attribute และ :other ต้องแตกต่างกัน',
    'digits' => ':attribute ต้องเป็น :digits ตัวเลข',
    'digits_between' => ':attribute ต้องอยู่ระหว่าง :min และ :max ตัวเลข',
    'dimensions' => ':attribute มีขนาดภาพที่ไม่ถูกต้อง',
    'distinct' => ':attribute ฟิลด์มีค่าที่ซ้ำกัน',
    'email' => ':attribute จะต้องเป็นที่อยู่อีเมลที่ถูกต้อง',
    'ends_with' => ':attribute ต้องลงท้ายด้วยข้อใดข้อหนึ่งต่อไปนี้: :values',
    'exists' => 'ที่เลือก :attribute ไม่ถูกต้อง',
    'file' => ':attribute ต้องเป็นไฟล์',
    'filled' => ':attribute ฟิลด์ต้องมีค่า',
    'gt' => [
        'numeric' => ':attribute ต้องมากกว่า :value',
        'file' => ':attribute ต้องมากกว่า :value กิโลไบต์',
        'string' => ':attribute ต้องมากกว่า :value อักขระ',
        'array' => ':attribute ต้องมีมากกว่า :value รายการ',
    ],
    'gte' => [
        'numeric' => ':attribute ต้องมากกว่าหรือเท่ากับ :value',
        'file' => ':attribute ต้องมากกว่าหรือเท่ากับ :value กิโลไบต์',
        'string' => ':attribute ต้องมากกว่าหรือเท่ากับ :value อักขระ',
        'array' => ':attribute จำเป็นต้องมี :value รายการหรือมากกว่า',
    ],
    'image' => ':attribute ต้องเป็นรูปภาพ',
    'in' => 'ที่เลือก :attribute ไม่ถูกต้อง',
    'in_array' => ':attribute ไม่มีฟิลด์ใน :other',
    'integer' => ':attribute ต้องเป็นจำนวนเต็ม',
    'ip' => ':attribute ต้องเป็นที่อยู่ IP ที่ถูกต้อง',
    'ipv4' => ':attribute ต้องเป็นที่อยู่ IPv4 ที่ถูกต้อง',
    'ipv6' => ':attribute ต้องเป็นที่อยู่ IPv6 ที่ถูกต้อง',
    'json' => ':attribute ต้องเป็นสตริง JSON ที่ถูกต้อง',
    'lt' => [
        'numeric' => ':attribute ต้องน้อยกว่า :value',
        'file' => ':attribute ต้องน้อยกว่า :value กิโลไบต์',
        'string' => ':attribute ต้องน้อยกว่า :value อักขระ',
        'array' => ':attribute ต้องมีค่าน้อยกว่า :value รายการ',
    ],
    'lte' => [
        'numeric' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value',
        'file' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value กิโลไบต์',
        'string' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value อักขระ',
        'array' => ':attribute ต้องมีไม่เกิน :value รายการ',
    ],
    'max' => [
        'numeric' => ':attribute ต้องไม่มากกว่า :max',
        'file' => ':attribute ต้องไม่มากกว่า :max กิโลไบต์',
        'string' => ':attribute ต้องไม่มากกว่า :max อักขระ',
        'array' => ':attribute อาจมีไม่เกิน :max รายการ',
    ],
    'mimes' => ':attribute ต้องเป็นไฟล์ประเภท: :values',
    'mimetypes' => ':attribute ต้องเป็นไฟล์ประเภท: :values',
    'min' => [
        'numeric' => ':attribute ต้องมีอย่างน้อย :min',
        'file' => ':attribute ต้องมีอย่างน้อย :min กิโลไบต์',
        'string' => ':attribute ต้องมีอย่างน้อย :min อักขระ',
        'array' => ':attribute ต้องมีอย่างน้อย :min รายการ',
    ],
    'multiple_of' => ':attribute ต้องเป็นผลคูณของ :value',
    'not_in' => 'ที่เลือก :attribute ไม่ถูกต้อง',
    'not_regex' => ':attribute รูปแบบไม่ถูกต้อง',
    'numeric' => ':attribute ต้องเป็นตัวเลข',
    'password' => 'รหัสผ่านไม่ถูกต้อง',
    'present' => ':attribute ต้องมีฟิลด์',
    'regex' => ':attribute รูปแบบไม่ถูกต้อง',
    'required' => ':attribute ต้องระบุฟิลด์',
    'required_if' => ':attribute ต้องระบุเมื่อ :other เป็น :value',
    'required_unless' => ':attribute จำเป็นต้องกรอกข้อมูลเว้นแต่ :other อยู่ใน :values',
    'required_with' => ':attribute ต้องระบุเมื่อ :values เป็นปัจจุบัน',
    'required_with_all' => ':attribute ต้องระบุเมื่อ :values เป็นปัจจุบัน',
    'required_without' => ':attribute ต้องระบุเมื่อ :values ไม่เป็นปัจจุบัน',
    'required_without_all' => ':attribute ต้องระบุฟิลด์เมื่อไม่มี :values เป็นปัจจุบัน',
    'same' => ':attribute และ :other ต้องตรงกัน',
    'size' => [
        'numeric' => ':attribute ต้องเป็น :size',
        'file' => ':attribute ต้องเป็น :size กิโลไบต์',
        'string' => ':attribute ต้องเป็น :size อักขระ',
        'array' => ':attribute ต้องมี :size รายการ',
    ],
    'starts_with' => ':attribute ต้องเริ่มต้นด้วยข้อใดข้อหนึ่งต่อไปนี้: :values',
    'string' => ':attribute ต้องเป็นสตริง',
    'timezone' => ':attribute ต้องเป็นเขตที่ถูกต้อง',
    'unique' => ':attribute ถูกใช้ไปแล้ว',
    'uploaded' => ':attribute อัปโหลดไม่สำเร็จ',
    'url' => ':attribute รูปแบบไม่ถูกต้อง',
    'uuid' => ':attribute ต้องเป็น UUID ที่ถูกต้อง',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'ข้อความที่กำหนดเอง',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
