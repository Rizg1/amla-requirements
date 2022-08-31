<?php

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
