<?php

namespace Tests\Unit;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ProjectTest extends TestCase
{
	use RefreshDatabase;

	/** @test **/
	public function path_to_the_project()
	{
		$project = factory(Project::class)->create();

		$this->assertEquals('/projects/'.$project->id, $project->path());
	}

	/** @test **/
	public function belongs_to_the_users()
	{
		$project = factory(Project::class)->create();

		$this->assertInstanceOf(User::class, $project->owner);
	}

	/** @test **/
	public function it_has_tasks()
	{
		$project = factory(Project::class)->create();

		$task = factory(Task::class)->create(['project_id' => $project->id]);

		$this->assertInstanceOf(Collection::class, $project->tasks);

	}

    /** @test **/
    public function a_project_can_invite_a_user()
    {
        $project = factory(Project::class)->create();

        $project->invite($user = factory(User::class)->create());

        $this->assertTrue($project->members->contains($user));
    }

}
