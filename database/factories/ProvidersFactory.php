<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'dob' => $faker->date(now()),
        'bussines_name' => $faker->company,
        'address' => $faker->address,
        'business_phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
    ];
});
