<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Payment::class, function (Faker $faker) {
    return [
        'amount'=> rand(1,100).rand(1,100),
        'description' =>$faker->text,
        'provider_id' =>rand(1,100),
        'spot_id' =>rand(1,100)
    ];
});
