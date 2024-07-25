<?php

namespace Tests\Unit;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_belongs_to_a_project()
    {
        $task = Task::factory()->create();

        $this->assertInstanceOf(Project::class, $task->project);
    }

    /** @test **/
    public function it_belongs_to_a_user()
    {
        $task = Task::factory()->create();

        $this->assertInstanceOf(User::class, $task->owner);
    }

    /** @test **/
    public function tasks_have_a_path()
    {
        $task = Task::factory()->create();

        $this->assertEquals("/projects/{$task->project->id}/tasks/{$task->id}", $task->path());
    }

    /** @test **/
    public function can_marked_for_a_completed()
    {
        $task = Task::factory()->create();

        $this->assertFalse($task->completed);

        $task->completed();

        $this->assertTrue($task->completed);
    }

    /** @test **/
    public function can_marked_for_a_incomplete()
    {
        $task = Task::factory()->create();

        $task->completed();

        $this->assertTrue($task->completed);

        $task->incomplete();

        $this->assertFalse($task->completed);
    }
}
