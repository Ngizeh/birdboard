<?php

namespace Tests\Unit;

use App\Task;
use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_belongs_to_a_project()
    {
        $task = factory(Task::class)->create();

        $this->assertInstanceOf(Project::class, $task->project);
    }

    /** @test **/
    public function tasks_have_a_path()
    {
        $task = factory(Task::class)->create();

        $this->assertEquals("/projects/{$task->project->id}/tasks/{$task->id}", $task->path());
    }

    /** @test **/
    public function can_marked_for_a_completed()
    {
        $task = factory(Task::class)->create();

        $this->assertFalse($task->completed);

        $task->completed();

        $this->assertTrue($task->completed);
    }

    /** @test **/
    public function can_marked_for_a_incomplete()
    {
        $task = factory(Task::class)->create();

        $task->completed();

        $this->assertTrue($task->completed);

        $task->incomplete();

        $this->assertFalse($task->completed);
    }
}
