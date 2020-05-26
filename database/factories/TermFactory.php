<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Term;
use Faker\Generator as Faker;

$factory->define(Term::class, function (Faker $faker) {

    return [
        'term_name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
