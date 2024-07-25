<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageProjectTest extends TestCase
{
    use RefreshDatabase;

    protected function validatedData($attributes = []): array
    {
        return array_merge([
            Project::factory()->raw(),
        ], $attributes);
    }

    /** @test **/
    public function a_user_can_create_a_project()
    {
        $user = $this->signIn();

        $this->get('projects/create')->assertStatus(200);

        $project = Project::factory()->raw(['owner_id' => $user]);

        $this->post('/projects', $project);

        $this->assertDatabaseHas('projects', $project);
    }

    /** @test **/
    public function project_owner_is_authorized_to_delete_a_project()
    {

        $user = $this->signIn();

        $project = Project::factory()->create(['owner_id' => $user]);

        $project2 = Project::factory()->create();

        $this->actingAs($user)->delete($project->path())->assertRedirect('/projects');

        $this->delete($project2->path())->assertStatus(403);

        $this->assertDatabaseMissing('projects', $project->only('id'));

        $project2->invite($nick = $this->signIn());

        $this->actingAs($nick)->delete($project2->path())->assertStatus(403);

    }

    /** @test **/
    public function projects_can_be_accessed_by_accessible_user_only()
    {
        $project = tap(Project::factory()->create())->invite($this->signIn());

        $this->get('projects')->assertSee($project->title);

    }

    /** @test **/
    public function a_project_can_have_a_notes()
    {
        $user = $this->signIn();

        $project = Project::factory()->create(['owner_id' => $user]);

        $attributes = ['notes' => 'General Notes'];

        $this->actingAs($user)->patch($project->path(), $attributes)->assertRedirect(route('projects.show', $project));

        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test **/
    public function a_project_can_have_a_title_and_description_sometimes()
    {
        $user = $this->signIn();

        $project = Project::factory()->create(['owner_id' => $user]);

        $attributes = [
            'notes' => 'General Notes',
        ];

        $this->patch($project->path(), $attributes)->assertRedirect(route('projects.show', $project));

        $this->assertDatabaseHas('projects', ['notes' => 'General Notes']);
    }

    /** @test **/
    public function authenticated_user_can_be_view_their_project_only_show_on_page()
    {

        $project = Project::factory()->create();

        $user = $this->signIn();

        $project2 = Project::factory()->create(['owner_id' => $user]);

        $this->get($project2->path())->assertStatus(200);

        $this->get($project->path())->assertStatus(403);
    }

    /** @test **/
    public function authenticated_user_can_be_view_their_project_only_index()
    {
        $project = Project::factory()->create();

        $user = $this->signIn();

        $project2 = Project::factory()->create(['owner_id' => $user]);

        $this->get('/projects')
            ->assertDontSee($project->title)
            ->assertSee($project2->title);
    }

    /** @test **/
    public function a_project_requires_a_title()
    {
        $this->signIn();

        $attributes = $this->validatedData(['title' => null]);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test **/
    public function a_project_requires_a_title_on_update()
    {

        $user = $this->signIn();

        $project = Project::factory()->create(['owner_id' => $user]);

        $this->patch($project->path(), ['title' => null])->assertSessionHasErrors('title');
    }

    /** @test **/
    public function a_project_requires_a_description_on_update()
    {

        $user = $this->signIn();

        $project = Project::factory()->create(['owner_id' => $user]);

        $this->get(route('projects.edit', $project))
            ->assertOk();

        $this->patch($project->path(), ['description' => null])->assertSessionHasErrors('description');
    }

    /** @test **/
    public function a_project_requires_a_description()
    {
        $this->signIn();

        $attributes = $this->validatedData(['description' => null]);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test **/
    public function guests_can_not_manage_a_project()
    {
        $project = Project::factory()->create();

        $this->post('/projects')->assertRedirect('login');
        $this->get(route('projects.edit', $project))->assertRedirect('login');
        $this->get($project->path())->assertRedirect('login');
        $this->get('/projects/')->assertRedirect('login');
        $this->delete($project->path())->assertRedirect('login');
    }
}
