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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'title' => 'Mr',
        'forename' => $faker->name,
        'surname' => 'Test-surname',
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
        'dob' => '05/05/2015',
        'gender' => 'Not specified',
        'town' => 'London',
        'county' => 'test',
        'address_one' => 'One test-address',
        'address_two' => 'Two test-address',
        'country' => 'United kingdom',
        'post_code' => '1UB 3UB',
        'from_date' => '05/05/2015',
        'until_date' => '05/05/2015',
        'remember_token' => str_random(10),
    ];
});
