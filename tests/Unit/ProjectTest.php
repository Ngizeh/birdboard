<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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


}
