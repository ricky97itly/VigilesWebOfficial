<?php

use Faker\Generator as Faker;

$factory->define(App\Report::class, function (Faker $faker) {
  return [
    'user_id'=> $faker->numberBetween($min = 1, $max = 50),
    'code_id'=> 1,
    'zone_id'=> $faker->numberBetween($min = 1, $max = 9),
    'title' => $faker->text(30),
    'address' => "Via larga",
    'street_number' => 9,
    'description' => $faker->text(100),
    'tags'=> $faker->text(20),
    'media'=> $faker->imageUrl(300, 300, 'cats')
    ];
  });
