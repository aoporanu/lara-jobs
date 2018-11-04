<?php

use Faker\Generator as Faker;

$factory->define(\App\Job::class, function (Faker $faker) {
    return [
        'title'             => $faker->text(25),
        'description'       => $faker->text(200),
        'company_id'        => App\Company::all()->random()->id
    ];
});
