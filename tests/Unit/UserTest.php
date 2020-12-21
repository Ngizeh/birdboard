<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
	use RefreshDatabase;

    /** @test **/
    public function project_belongs_to_a_user()
    {
    	$user = factory(User::class)->create();

    	$this->assertInstanceOf(Collection::class, $user->projects);
    }

}
