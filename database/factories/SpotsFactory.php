<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Spot;
use Faker\Generator as Faker;

$factory->define(Spot::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->name,
        'subtitle' =>$faker->name,
        'description' => 'asdasdsdafahfdasd',
        'status' =>$faker->state,
        'providers_id' => rand(1,100),
    ];
});
