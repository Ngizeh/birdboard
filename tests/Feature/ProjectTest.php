<?php

use App\Project;
use App\User;
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

		$this->actingAs($user = factory(User::class)->create());

		$attributes = factory(Project::class)->raw(['owner_id' => $user->id]);

		$this->post('/projects', $attributes)->assertRedirect(route('projects.index'));

		$this->assertDatabaseHas('projects', $attributes);

		$this->get('projects')->assertSee($attributes['title']);

		$this->get('projects')->assertSee($attributes['description']);
	}

	/** @test **/
	public function authenticated_user_can_be_view_their_project_only_show_on_page()
	{
		$project = factory(Project::class)->create();

		$this->actingAs(factory($user = User::class)->create());
		$project2 = factory(Project::class)->create(['owner_id' => auth()->id()]);

		$this->get($project->path())->assertStatus(403);
		$this->get($project2->path())->assertStatus(200);
	}

	/** @test **/
	public function authenticated_user_can_be_view_their_project_only_index()
	{
		$project = factory(Project::class)->create();

		$this->actingAs(factory($user = User::class)->create());
		$project2 = factory(Project::class)->create(['owner_id' => auth()->id()]);

		$this->get('/projects')
			->assertDontSee($project->title)
			->assertSee($project2->title);
	}


	/** @test **/
	public function a_project_requires_a_title()
	{
		$this->actingAs($user = factory(User::class)->create());

		$attributes = factory(Project::class)->raw(['title' => null]);

		$this->post('/projects', $attributes)->assertSessionHasErrors('title');
	}

	/** @test **/
	public function a_project_requires_a_description()
	{
		$this->actingAs($user = factory(User::class)->create());

		$attributes = factory(Project::class)->raw(['description' => null]);

		$this->post('/projects', $attributes)->assertSessionHasErrors('description');
	}

	/** @test **/
	public function guests_can_not_create_a_project()
	{
		//TODO
		$attributes = factory(Project::class)->raw(['owner_id' => null]);

		$this->post('/projects', $attributes)->assertRedirect('login');
	}

	/** @test **/
	public function guests_can_not_view_a_sigle_project()
	{
		$project = factory(Project::class)->create();

		$this->get('/projects/'.$project->id)->assertRedirect('login');
	}

	/** @test **/
	public function guests_can_not_view_a_project()
	{
		$project = factory(Project::class)->create();

		$this->get('/projects/')->assertRedirect('login');
	}


}
