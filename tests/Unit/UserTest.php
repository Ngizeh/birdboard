<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function project_belongs_to_a_user()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }

    /** @test **/
    public function task_belongs_to_a_user()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(Collection::class, $user->tasks);
    }

    /** @test **/
    public function user_can_view_all_their_accessible_projects()
    {
        $user = $this->signIn();

        Project::factory()->create(['owner_id' => $user]);
        $this->assertCount(1, $user->accessibleProjects());

        $john = $this->signIn();
        $nick = $this->signIn();

        tap(Project::factory()->create(['owner_id' => $john]))->invite($user)->invite($nick);

        $this->assertCount(2, $user->accessibleProjects());
        $this->assertCount(1, $nick->accessibleProjects());
    }
}
