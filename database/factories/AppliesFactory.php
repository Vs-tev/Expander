<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apply;
use Faker\Generator as Faker;

$factory->define(Apply::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'project_id' => rand(1, 20),
        'belongs_to_user' => rand(1, 10),
        'body' => $faker->text(400),
    ];
});
