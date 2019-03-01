<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Item::class, function (Faker $faker) {
    return [
        'Name' => 'Futbolka',
        'Brand' => $faker->randomElement(['BIANYILONG','SWENEARO','S·B·KEN','Asstseries','BINYUXD','T-bird ','TUNSECHY']),
        'Price' => rand(250,600),
        // 'Image' => $faker->imageUrl($width = 400, $height = 400),
        'Image' => $faker->randomElement(["https://ae01.alicdn.com/kf/HTB1KTyXax_rK1RkHFqDq6yJAFXab/2019-New-just-color-T-Shirt-Mens-cotton-T-shirts-Summer-Skateboard-Tee-Boy-Skate-Tshirt.jpg_220x220xz.jpg","https://ae01.alicdn.com/kf/HTB1EKpPkC3PL1JjSZFtq6AlRVXax/SWENEARO-2018-Simple-creative-design-line-cross-Print-cotton-T-Shirts-Men-s-New-Arrival-Summer.jpg_220x220xz.jpg","https://ae01.alicdn.com/kf/HTB1jbklKkyWBuNjy0Fpq6yssXXar/-Water-Drop-Mobile-men-3D-Print-short-sleeves-T-Shirt-Men-s-3D-Short-Sleeve.jpg_220x220xz.jpg","https://ae01.alicdn.com/kf/HTB1UjBOXsrrK1RjSspaq6AREXXaN/2017-summer-3D-t-shirt-men-camouflage-compression-shirt-fitness-men-t-shirt-bodybuilding-casual-tights.jpg_220x220xz.jpg","https://ae01.alicdn.com/kf/ULB8ofhTGNHEXKJk43Jeq6yeeXXaO/Europe-Size-Solid-color-100-Cotton-T-Shirt-Mens-Black-White-T-shirts-2019-Summer-Skateboard.jpg_220x220xz.jpg","https://ae01.alicdn.com/kf/HTB1aUDSIAKWBuNjy1zjq6AOypXam/Classical-Fast-Dry-Leisure-Print-T-Shirts-Men-s-Novelty-Dragon-Print-Tatoo-Male-O-Neck.jpg_220x220xz.jpg","https://ae01.alicdn.com/kf/HTB15zxGa6zuK1RjSsppq6xz0XXa4/New-Sally-Face-T-Shirts-Men-Harajuku-Women-summer-T-shirt-Men-Fashion-Printed-t-shirt.jpg_220x220xz.jpg","https://ae01.alicdn.com/kf/HTB15zxGa6zuK1RjSsppq6xz0XXa4/New-Sally-Face-T-Shirts-Men-Harajuku-Women-summer-T-shirt-Men-Fashion-Printed-t-shirt.jpg_220x220xz.jpg"]),
        'hash' => md5(str_random()),
        'Description' => $faker->text,
        'Gender' => 'Male',
        'created_at' => now(),
        'updated_at' => now()
    ];
});
