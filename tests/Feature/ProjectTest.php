<?php

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
	use RefreshDatabase;

	/** @test **/
	public function a_user_can_create_a_project()
	{
		$this->withoutExceptionHandling();

		$attributes = factory(Project::class)->make()->toArray();

		$this->post('/projects', $attributes)->assertRedirect(route('projects'));

		$this->assertDatabaseHas('projects', $attributes);

		$this->get('projects')->assertSee($attributes['title']);

		$this->get('projects')->assertSee($attributes['description']);
	}

	/** @test **/
	public function a_project_requires_a_title()
	{

		$attributes = factory(Project::class)->raw(['title' => null]);

		$this->post('/projects', $attributes)->assertSessionHasErrors('title');
	}

	/** @test **/
	public function a_project_requires_a_description()
	{
		$attributes = factory(Project::class)->raw(['description' => null]);

		$this->post('/projects', $attributes)->assertSessionHasErrors('description');
	}


}