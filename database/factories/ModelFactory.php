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
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
    ];
});

$factory->define(App\Adherent::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->address,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'phone' => $faker->regexify('0[1-9][0-9]{8}'),
        'begin_adhesion' => $faker->dateTime,
        'end_adhesion' => $faker->dateTime,
        'contribution_id' => \App\Contribution::all()->random()->id,
        'user_id' => App\User::all()->random()->id,
    ];
});

$factory->define(App\BookReference::class, function (Faker\Generator $faker) {
    return [
        'initial_price' => $faker->randomFloat(2, 10, 25),
        'ISBN' => $faker->regexify('[1-9]{3}-[1-9]-[1-9]{4}-[1-9]{4}-[1-9]'),
        'section_id' => App\Section::all()->random()->id,
        'level_id' => App\Level::all()->random()->id,
        'subject_id' => App\Subject::all()->random()->id,
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'active' => $faker->boolean(),
        'adherent_id' => App\Adherent::all()->random()->id,
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'state' => $faker->randomDigitNotNull()%5 + 1,
        'available' => $faker->boolean(),
        'book_reference_id' => App\BookReference::all()->random()->id,
    ];
});

$factory->define(App\BookOrder::class, function (Faker\Generator $faker) {
    return [
        'state' => $faker->randomDigitNotNull()%5 + 1,
        'order_id' => App\Order::all()->random()->id,
        'book_id' => App\Book::all()->random()->id,
    ];
});


