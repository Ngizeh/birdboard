<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function tasks_can_be_added_by_on_the_project()
    {
    	$this->withoutExceptionHandling();

    	$this->signIn();

    	$project = factory(Project::class)->create();

    	$this->post($project->path() .'/tasks', ['body' => 'Test body']);

    	$this->assertDatabaseHas('tasks', ['body' => 'Test body']);

    }

}
