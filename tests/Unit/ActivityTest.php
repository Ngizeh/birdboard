<?php

namespace Tests\Unit;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_has_an_owner()
    {
        $user = $this->signIn();

        $project = Project::factory()->create(['owner_id' => $user]);

        $this->assertEquals($user->id, $project->activity()->first()->user->id);
    }
}
