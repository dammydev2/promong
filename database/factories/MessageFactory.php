<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'subject' => $faker->sentence,
        'message' => $faker->sentence,
        'promoter' => $faker->randomElement(['softsolver' ,'vlp', 'goldenweb', 'Johnson Graphics', 'cocacola']),
    ];
});
