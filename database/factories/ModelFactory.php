<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Plot::class, function(Faker\Generator $faker) {
	return [
		'plot_no' => $faker->buildingNumber,
		'size' => $faker->numberBetween(220, 750),
		'area_id' => $faker->numberBetween(1, 4),
		'area_type_id' => $faker->numberBetween(1, 4),
		'price' => $faker->numberBetween(1000000, 3000000)
	];
});

$factory->define(App\Area::class, function(Faker\Generator $faker) {
	return [
		'name' => $faker->city/*,
		'area_type_id' => $faker->numberBetween(1, 4)*/
	];
});
