<?php

require_once '../bootstrap.php';
require_once 'db_connect.php';
require_once '../models/User.php';

$ads = [
    [
        'title'         => 'orange claw hammer',
        'description'   => 'Use this to hammer in nails. Use this to pull out nails. Repeat. Hammer in nails. Remove nails.',
        'image_url'     => '/img/orange-claw-hammer.jpg',
        'price'         => 44.85
    ],
    [
        'title'         => 'trout mask replica',
        'description'   => 'Easy-Listening supergroup, Captain Beefheart and His Magic Band, cover John Tesh\'s latest hits.',
        'image_url'     => '/img/trout-mask-replica.jpg',
        'price'         => 99.90
    ],
    [
        'title'         => 'picture phone',
        'description'   => '100% phone, 5 star geniune authentic futuristic 21st century picture-phone that makes phone calls and takes pictures and moving pictures!!!',
        'image_url'     => '/img/picture_phone',
        'price'         => 102.97
    ],
    [
        'title'         => 'police cruiser',
        'description'   => 'Decomissioned police cruiser available. Has seen little use and is being sold at a loss from the department motorpool.',
        'image_url'     => '/img/police_car.jpg',
        'price'         => 400
    ],
    [
        'title'         => 'Awesome Car Tire',
        'description'   => 'Genuine rubber 100% car 5 star tire, slightly used.',
        'image_url'     => 'img/used_tire.jpg',
        'price'         => 5.95
    ],
    [
        'title'         => 'Bongo Fury',
        'description'   => 'I wish I had a set of bongos. Don\'t you wish you had a set of bongos!',
        'image_url'     => '/img/bongos.jpg',
        'price'         => 23
    ],
];


foreach($ads as $ad) {

    $newAdd = new Ad();
    $newAdd->title = $ad['title'];
    $newAdd->description = $ad['description'];
    $newAdd->image_url = $ad['image_url'];
    $newAdd->price = $ad['price'];
    $newAdd->save();

}
