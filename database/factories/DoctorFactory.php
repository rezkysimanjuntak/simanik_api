<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        'nama' => $faker->text(50),
        'alamat' => $faker->text(200)
    ];
});
