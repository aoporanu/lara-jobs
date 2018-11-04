<?php

use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        'name'  => $faker->text(10),
        'description'   => $faker->text(200),
        'slogan'        => $faker->text(50)
    ];
});
