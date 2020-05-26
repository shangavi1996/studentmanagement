<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {

    return [
        'student_id' => $faker->word,
        'fee_id' => $faker->word,
        'use_id' => $faker->word,
        'paid' => $faker->randomDigitNotNull,
        'remark' => $faker->word,
        'description' => $faker->word,
        'trabsaction_date' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
