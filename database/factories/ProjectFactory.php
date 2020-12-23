<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
	return [
		'title' => str_limit($faker->sentence,10),
		'description'=> str_limit($faker->paragraph, 100),
		'owner_id' => function (){
			return factory(User::class)->create()->id;
		}
	];
});
