<?php

namespace Database\Factories;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function() {
                return User::factory()->create();
            },
            'project_id' => function() {
                return Project::factory()->create();
            },
            'body' => $this->faker->sentence,
            'completed' => false
        ];
    }
}
