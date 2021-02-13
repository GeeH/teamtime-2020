<?php declare(strict_types=1);

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'uuid' => $faker->uuid,
        'timezone' => $faker->timezone,
        'user_id' => random_int(1, 2),
    ];
});
