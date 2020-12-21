<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
	use WithFaker, RefreshDatabase;

	/** @test **/
	public function a_user_can_create_a_project()
	{
		$this->withoutExceptionHandling();

		$attributes = [
			'title' => $this->faker->sentence,
			'description'=> $this->faker->paragraph
		];

		$this->post('/projects', $attributes)->assertRedirect(route('projects'));

		$this->assertDatabaseHas('projects', $attributes);

		$this->get('projects')->assertSee($attributes['title']);

		$this->get('projects')->assertSee($attributes['description']);
	}

	/** @test **/
	public function a_project_requires_a_title()
	{
		$attributes = [
			'title' => null,
			'description'=> $this->faker->paragraph
		];

		$this->post('/projects', $attributes)->assertSessionHasErrors('title');
	}

	/** @test **/
	public function a_project_requires_a_description()
	{
		$attributes = [
			'title' => $this->faker->sentence,
			'description'=> null
		];

		$this->post('/projects', $attributes)->assertSessionHasErrors('description');
	}


}
