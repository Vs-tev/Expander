<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProfileExtention;
use Faker\Generator as Faker;

$factory->define(ProfileExtention::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'summary' => $faker->text(50),
        'occupation' => $faker->text(12),
        'profile' => 'Person',
        'website' => 'www.example.com',
        'city' => $faker->address,
    ];
});
