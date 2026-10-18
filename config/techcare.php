<?php

return [
    'business_name' => 'TechCare',
    'tagline' => 'Jasa IT Support, Maintenance Komputer, dan Jaringan',
    'owner_name' => 'Nur Muhibbin',
    'owner_background' => 'Jurusan Teknik Komputer dan Jaringan, SMKN 3 Yogyakarta',
    'business_type' => 'Usaha jasa perorangan',
    'address' => 'Minggir, Sleman, Yogyakarta',
    'whatsapp' => env('TECHCARE_WHATSAPP', '085641487430'),
    'whatsapp_int' => env('TECHCARE_WHATSAPP_INT', '6285641487430'),
    'email' => env('TECHCARE_EMAIL', 'Ibinyo19@gmail.com'),
    'instagram' => 'TechCare',
    'tiktok' => 'TechCaree',
    'service_area' => 'Yogyakarta dan sekitarnya',
    'operational_hours' => [
        'weekday' => 'Senin–Jumat: 16.00–20.00 WIB',
        'saturday' => 'Sabtu: 09.00–17.00 WIB',
        'sunday' => 'Minggu: dengan janji terlebih dahulu',
        'response_note' => 'Pesan di luar jam operasional dibalas paling lambat 24 jam.',
    ],
    'warranty_days' => 7,
    'diagnosis_fee' => 25000,
    'home_service' => [
        'tier_1' => ['distance' => 'Sampai 3 km', 'fee' => 10000, 'label' => '≤ 3 km'],
        'tier_2' => ['distance' => 'Lebih dari 3 km sampai 7 km', 'fee' => 20000, 'label' => '> 3 – 7 km'],
        'tier_3' => ['distance' => 'Lebih dari 7 km', 'fee' => 35000, 'label' => '> 7 km (atau kesepakatan)'],
    ],
    // Payment placeholders (as required: bank account & ewallet kept empty as config placeholders)
    'bank_account' => env('TECHCARE_BANK_ACCOUNT', ''),
    'ewallet' => env('TECHCARE_EWALLET', ''),
];
