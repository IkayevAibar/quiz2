<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Item::class, function (Faker $faker) {
    return [
        'Name' => $faker->randomElement(['Audemars Piguet','Patek Philippe','Breguet','Van Cleef & Arpels','Bovet']),
        'Brand' => $faker->randomElement(['Tissot','Casio','Armani','Rolex','Omega']),
        'Price' => rand(100,250),
        // 'Image' => $faker->imageUrl($width = 400, $height = 400),
        'Image' => $faker->randomElement(['https://d1rkccsb0jf1bk.cloudfront.net/products/100028520/main/medium/AX2618_main.jpg','https://d1rkccsb0jf1bk.cloudfront.net/products/100028521/main/medium/AX2619_main.jpg','https://d1rkccsb0jf1bk.cloudfront.net/products/99976234/main/medium/tourbox_silver-1422543555-2079.jpg','https://d1rkccsb0jf1bk.cloudfront.net/products/99953887/main/medium/m1-30-95-lb_600x938_01-1342801622-4748.jpg','https://d1rkccsb0jf1bk.cloudfront.net/products/100024798/main/medium/AX2700.jpg','https://d1rkccsb0jf1bk.cloudfront.net/products/100024802/main/medium/AX2706.jpg']),
        'hash' => md5(str_random()),
        'Description' => $faker->text,
        'Gender' => $faker->randomElement(['Male','Female']),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
