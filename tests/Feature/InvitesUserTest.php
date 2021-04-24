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
	public function project_owner_can_invite_user_via_route()
	{

		$project = Project::factory()->create();

		$userToInvite = User::factory()->create();

		$this->actingAs($project->owner)->post(route('invitations.store', $project), [
			'email' => $userToInvite->email,
		])->assertRedirect(route('projects.show', $project));

        $this->assertTrue($project->members->contains($userToInvite));

    }

	/** @test **/
	public function project_owner_can_invite_user_via_route_who_exists_in_the_birdboard()
	{

		$project = Project::factory()->create();

		$this->actingAs($project->owner)->post(route('invitations.store', $project), [
			'email' => 'usernotexisting@mail.com'
		])->assertSessionHasErrors([
			'email' => 'That email does not exist in any Birdboard account'
		], null, 'invitations');
	}

	/** @test **/
	public function only_project_owner_can_invite_user_via_route_who_exists_in_the_birdboard()
	{
		$user = $this->signIn();

		$project = Project::factory()->create();

		$this->actingAs($user)->post(route('invitations.store', $project), [
			'email' => 'usernotexisting@mail.com'
		])->assertStatus(403);

		$project->invite($user);

		$this->actingAs($user)->post(route('invitations.store', $project), [
			'email' => 'usernotexisting@mail.com'
		])->assertStatus(403);
	}

	/** @test **/
	public function it_can_invite_a_user()
	{
		$project = Project::factory()->create();

		$project->invite($user = User::factory()->create());

		$this->signIn($user);

		$this->post(action('ProjectTasksController@store', $project), $task = ['body' => 'Test task']);

		$this->assertDatabaseHas('tasks', $task);

	}

}

