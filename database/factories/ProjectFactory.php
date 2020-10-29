<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'project_name' => $faker->text(12),
        'started_at' => now(),
        'description' => $faker->text,
        'branch' => $faker->text(15),
        'progress' => 'i have an idea',
        'help' => 'im lookin for a team',
        'country' => 'Usa',
        'city' => $faker->address,
        'website' => 'example.com',
        'cover_image' => 'noimage.jpg'
    ];
});
