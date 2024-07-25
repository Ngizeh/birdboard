<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function tasks_can_be_added_by_on_the_project()
    {
        $this->signIn();

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $this->post($project->path().'/tasks', ['body' => 'Test body']);

        $this->assertDatabaseHas('tasks', ['body' => 'Test body']);

    }

    /** @test **/
    public function a_task_can_have_a_user()
    {
        $user = $this->signIn();
        $project = Project::factory()->create(['owner_id' => $user]);

        $project->addTask('Test task');

        $this->assertDatabaseHas('tasks', ['body' => 'Test task']);
    }

    /** @test * */
    public function tasks_can_be_updated_and_marked_as_completed()
    {
        $this->signIn();

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $task = $project->addTask('Test task');

        $this->patch($project->path().'/tasks/'.$task->id, ['body' => 'changed', 'completed' => true])
            ->assertRedirect(route('projects.show', $project->id));

        $this->assertDatabaseHas('tasks', [
            'body' => 'changed',
            'completed' => true,
        ]);

    }

    /** @test * */
    public function tasks_can_be_updated_and_marked_as_incomplete()
    {
        $this->signIn();

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $task = $project->addTask('Test task');

        $task->completed();

        $this->assertDatabaseHas('tasks', [
            'completed' => true,
        ]);

        $task->incomplete();

        $this->assertDatabaseHas('tasks', [
            'completed' => false,
        ]);
    }

    /** @test * */
    public function tasks_can_be_updated_by_the_owner_of_project()
    {

        $this->signIn();

        $project = Project::factory()->create();

        $task = $project->addTask('Test task');

        $this->patch($task->path(), ['body' => 'changed', 'completed' => true])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', [
            'body' => 'changed',
            'completed' => true,
        ]);

    }

    /** @test * */
    public function only_the_owner_of_the_project_can_add_a_task_to_project()
    {
        $this->signIn();

        $project = Project::factory()->create();

        $this->post($project->path().'/tasks', ['body' => 'Test body'])->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'Test body']);

    }

    /** @test * */
    public function task_can_be_validated()
    {
        $this->signIn();

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $task = $project->addTask('Test task');

        $this->patch($task->path(), ['body' => null])->assertSessionHasErrors('body');

        $this->assertDatabaseHas('tasks', ['body' => 'Test task']);

    }

    /** @test * */
    public function a_tasks_requires_a_task()
    {
        $this->signIn();

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $this->post($project->path().'/tasks', [])->assertSessionHasErrors('body');
    }

    /** @test * */
    public function guests_cannot_add_a_task()
    {
        $project = Project::factory()->create();

        $this->post($project->path().'/tasks', [])->assertRedirect('/login');
    }
}
