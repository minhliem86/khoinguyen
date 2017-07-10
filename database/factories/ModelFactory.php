<?php

use App\Models\Project;
use Faker\Generator as Faker;
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

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->safeEmail,
//         'password' => bcrypt(str_random(10)),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Models\Project::class, function(Faker  $faker){
  return [
    'video_id' => str_random(6),
    'title' => $faker->sentence(),
    'description' => $faker->paragraph(),
  ];
});

$factory->define(App\Models\Photo::class, function(Faker $faker){
    return [
        'title' => $faker->sentence(),
        'img_url' => $faker->imageUrl(300,300,'cats'),
        'filename' => $faker->word().'.jpg',
    ];
});
