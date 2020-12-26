<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityFeedTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_records_an_activity_for_a_project()
    {
        $this->signIn();
        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $this->assertCount(1, $project->activity);
        $this->assertDatabaseHas('activities', ['activity' => 'created']);
    }
    /** @test **/
    public function it_records_an_activity_for_a_updated_project()
    {
        $this->signIn();
        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $this->patch($project->path(), ['title' => 'Changed']);
        $this->assertCount(2, $project->activity);
        $this->assertDatabaseHas('activities', ['activity' => 'updated']);
    }
}
