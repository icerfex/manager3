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

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Model\Client::class, function (Faker\Generator $faker) {
    return [
        'nit' => $faker->numberBetween($min = 100000, $max = 99999999999999),
        'name' => $faker->name($max=50),
        'phone' => $faker->numberBetween($min = 4000000, $max = 79999999),
        'email' => $faker->safeEmail($max=50),
        'direction' => $faker->Address($max=150),
        'location' => $faker->city($max=50),
        'whatsapp' => $faker->boolean,
    ];
});

$factory->define(App\Model\Provider::class, function (Faker\Generator $faker) {
    return [
        'nit' => $faker->numberBetween($min = 100000, $max = 99999999999999),
        'name' => $faker->name($max=50),
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->safeEmail($max=50),
        'country' => $faker->country($max=150),
        'city' => $faker->city($max=250),
        'description' => $faker->text,
    ];
});

$factory->define(App\Model\Unit::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word($max=10)
    ];
});

$factory->define(App\Model\Category::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->areaCode,
        'abr' => $faker->stateAbbr($max=2),
        'name' => $faker->name($max=20)
    ];
});

$factory->define(App\Model\Subcategory::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->areaCode,
        'abr' => $faker->stateAbbr($max=2),
        'name' => $faker->name($max=20)
    ];
});
