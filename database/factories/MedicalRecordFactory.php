<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\MedicalRecord::class, function (Faker $faker) {
    return [
        'nama_pasien' => $faker->text(50),
        'jenis_penyakit' => $faker->text(200)
    ];
});
