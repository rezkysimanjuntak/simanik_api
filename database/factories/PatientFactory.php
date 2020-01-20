<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {
    return [
        'nama' => $faker->text(50),
        'alamat' => $faker->text(100),
        'jenis_kelamin' => $faker->text(20),
        'umur' => $faker->text(20),
        'jenis_penyakit' => $faker->text(100),
        'nomor_telepon' => $faker->text(20)
    ];
});
