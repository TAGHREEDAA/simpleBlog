<?php

use App\User;
use App\Post;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description'=>$faker->paragraph(4),
        'content'=>$faker->paragraph(10),

        'category_id'=>  Category::all()->random()->id,
        'user_id'=>  User::all()->random()->id,
    ];
});
