<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\SchoolClass::class, function (Faker $faker) {
	return [
		'id' => $faker->uuid,
		'lecturer_id' => '',
		'level_id' => '',
		'name' => strtoupper($faker->word),
		'schedule'  => $faker->dateTime,
	];
});
