<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use App\Task;
use App\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
    	'user_id' => function() {
    		return factory(User::class)->create();
    	},
        'project_id' => function() {
    		return factory(Project::class)->create();
    	},
        'body' => $faker->sentence,
        'completed' => false
    ];
});
