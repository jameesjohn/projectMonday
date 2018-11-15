<?php

use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
		'lecturer_id' => '',
		'level_id' => '',

    ];
});
