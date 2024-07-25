<?php

namespace Database\Factories;

use App\Project;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::limit($this->faker->sentence,10),
            'description'=> Str::limit($this->faker->paragraph, 100),
            'notes' => $this->faker->sentence,
            'owner_id' => function () {
                return User::factory()->create()->id;
            }
        ];
    }
}
