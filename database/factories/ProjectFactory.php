<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
	return [
		'title' => Str::limit($faker->sentence,10),
		'description'=> Str::limit($faker->paragraph, 100),
        'notes' => $faker->sentence,
		'owner_id' => function (){
			return factory(User::class)->create()->id;
		}
	];
});
