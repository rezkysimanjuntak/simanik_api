<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Medicine::class, function (Faker $faker) {
    return [
        'nama_obat' => $faker->text(20),
        'keterangan' => $faker->text(50),
        'harga' => $faker->text(20)
    ];
});
