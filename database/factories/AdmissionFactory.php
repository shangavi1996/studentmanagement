<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admission;
use Faker\Generator as Faker;

$factory->define(Admission::class, function (Faker $faker) {

    return [
        'firstname' => $faker->word,
        'lastname' => $faker->word,
        'address' => $faker->word,
        'gender' => $faker->word,
        'telephone' => $faker->word,
        'email' => $faker->word,
        'image' => $faker->word,
        'dob' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'class_id' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'date_registered' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
