<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Article;
use App\Models\Department;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Department::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'supervisor_id' => random_int(1, 5),
        'editor_id' => random_int(1, 5),
        'writer_id' => random_int(1, 5),
    ];
});

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->paragraph(),    // 1=main department  2=sub-department
        'status' => $faker->randomElement([0, 1]),    // 0=non-active  1=active
        'category_id' => random_int(1, 5),
        'editor_id' => random_int(1, 5),
        'writer_id' => random_int(1, 5),
    ];
});



