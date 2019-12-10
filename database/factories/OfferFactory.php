<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(rand(5,10)),
        'text'=>$faker->paragraph(rand(200,500)),
        'created_by'=>App\User::all()->random()->id,
        'is_published'=>$faker->boolean,
        'published_by'=>App\User::all()->random()->id,
        'activity_id'=>App\Activity::all()->random()->id,
    ];
});
