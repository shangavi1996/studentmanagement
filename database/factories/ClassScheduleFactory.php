<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassSchedule;
use Faker\Generator as Faker;

$factory->define(ClassSchedule::class, function (Faker $faker) {

    return [
        'course_id' => $faker->word,
        'level_id' => $faker->word,
        'shift_id' => $faker->word,
        'classroom_id' => $faker->word,
        'batch_id' => $faker->word,
        'day_id' => $faker->word,
        'time_id' => $faker->word,
        'teacher_id' => $faker->word,
        'starttime' => $faker->word,
        'endtime' => $faker->word,
        'status' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
