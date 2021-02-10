<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitesUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_can_invite_a_user()
    {
        $project = factory(Project::class)->create();

        $project->invite($user = factory(User::class)->create());

        $this->signIn($user);

        $this->post(action('ProjectTasksController@store', $project), $task = ['body' => 'Test task']);

        $this->assertDatabaseHas('tasks', $task);

    }

}
