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

    /** @test **/
    public function it_records_an_activity_for_a_created_task()
    {
        $this->signIn();
        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $project->addTask('Test task');
        $this->assertCount(2, $project->activity);
        $this->assertDatabaseHas('activities', ['activity' => 'created_task']);
    }

    /** @test **/
    public function it_records_an_activity_for_a_marked_as_completed_task()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $task = $project->addTask('Test task');
        $task->completed();
        $this->assertCount(3, $task->project->activity);
        $this->assertDatabaseHas('activities', ['activity' => 'completed_task']);
    }

    /** @test **/
    public function it_records_an_activity_for_a_marked_as_incomplete_task()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $task = $project->addTask('Test task');
        $task->completed();
        $this->assertCount(3, $task->project->activity);
        $task->incomplete();
        $this->assertCount(4, $task->project->fresh()->activity);
        $this->assertDatabaseHas('activities', ['activity' => 'incomplete_task']);
    }

    /** @test **/
    public function it_records_an_activity_for_a_deleted_task()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $task = $project->addTask('Test task');
        $task->delete();
        $this->assertCount(3, $project->fresh()->activity);
        $this->assertDatabaseHas('activities', ['activity' => 'deleted_task']);
    }
}
