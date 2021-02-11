<?php

namespace Tests\Feature;

use App\Project;
use App\Task;
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
        tap($project->activity->last(), function($activity) {
            $this->assertEquals('created_project', $activity->description);
            $this->assertNull($activity->changes);
        });
    }
    /** @test **/
    public function it_records_an_activity_for_a_updated_project()
    {
        $this->signIn();
        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $originalTitle = $project->title;
        $this->patch($project->path(), ['title' => 'Changed']);
        $this->assertCount(2, $project->activity);
        tap($project->activity->last(), function($activity) use ($originalTitle) {
            $this->assertEquals('updated_project', $activity->description);
            $expected = [
                'before' => ['title' => $originalTitle],
                'after' => ['title' => 'Changed'],
            ];
            $this->assertEquals($expected, $activity->changes);
        });
    }

    /** @test **/
    public function it_records_an_activity_for_a_created_task()
    {
        $user = $this->signIn();
        $project = factory(Project::class)->create(['owner_id' => $user]);
        $project->addTask('Test task');

        $this->assertCount(2, $project->activity);
        tap($project->activity->last(), function($activity){
            $this->assertEquals('created_task', $activity->description);
            $this->assertInstanceOf(Task::class, $activity->subject);
        });
    }

    /** @test **/
    public function it_records_an_activity_for_a_marked_as_completed_task()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $task = $project->addTask('Test task');
        $task->completed();
        $this->assertCount(3, $task->project->activity);
        $this->assertDatabaseHas('activities', ['description' => 'completed_task']);
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
        $this->assertDatabaseHas('activities', ['description' => 'incomplete_task']);
    }

    /** @test **/
    public function it_records_an_activity_for_a_deleted_task()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);
        $task = $project->addTask('Test task');
        $task->delete();
        $this->assertCount(3, $project->fresh()->activity);
        $this->assertDatabaseHas('activities', ['description' => 'deleted_task']);
    }
}
