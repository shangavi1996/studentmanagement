<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Attendance;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {

    return [
        'student_id' => $faker->word,
        'class_id' => $faker->word,
        'subject_id' => $faker->word,
        'teacher_id' => $faker->word,
        'status' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
