<?php

namespace Tests\Unit;

use App\Project;
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

}
