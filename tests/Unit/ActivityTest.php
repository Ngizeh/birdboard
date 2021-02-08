<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_has_an_owner()
    {
        $user = $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => $user]);

        $this->assertEquals($user->id, $project->activity()->first()->user->id);
    }
}
