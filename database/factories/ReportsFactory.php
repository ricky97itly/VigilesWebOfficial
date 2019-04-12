<?php

use Faker\Generator as Faker;

$factory->define(App\Report::class, function (Faker $faker) {
    return [
        'user_id'=> 1,
        'code_id'=> 1,
        'zone_id'=> 1,
        'title' => $faker->text(30),
        'address' => $faker->text(30),
        'description' => $faker->text(100),
        'tags'=> $faker->text(20),
        'media'=> $faker->imageUrl(300, 300, 'cats')
    ];
});
