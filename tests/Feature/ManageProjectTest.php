<?php

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectTest extends TestCase
{
    use RefreshDatabase;

    protected function validatedData($attributes = [])
    {
        return array_merge([
            factory(Project::class)->raw(),
        ], $attributes);
    }


    /** @test **/
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('projects/create')->assertStatus(200)->assertViewIs('projects.create');

        $project = factory(Project::class)->raw(['owner_id' => auth()->id()]);

        $this->post('/projects', $project);

        $this->assertDatabaseHas('projects', $project);

        $this->get('projects')->assertSee($project['title']);

        $project = Project::where($project)->first();

        $this->get('projects')->assertSee(route('projects.show', $project));
    }

    /** @test **/
    public function a_project_can_have_a_notes()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $attributes = [
            'notes' => 'General Notes',
            'title' => 'General title',
            'description' => 'General Description'
        ];

        $this->patch($project->path(), $attributes)->assertRedirect(route('projects.show', $project));

        $this->assertDatabaseHas('projects', ['notes' => 'General Notes']);
    }

    /** @test **/
    public function a_project_can_have_a_title_and_description_sometimes()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $attributes = [
            'notes' => 'General Notes'
        ];

        $this->patch($project->path(), $attributes)->assertRedirect(route('projects.show', $project));

        $this->assertDatabaseHas('projects', ['notes' => 'General Notes']);
    }

    /** @test **/
    public function authenticated_user_can_be_view_their_project_only_show_on_page()
    {

        $project = factory(Project::class)->create();

        $this->signIn();

        $project2 = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $this->get($project2->path())->assertStatus(200);

        $this->get($project->path())->assertStatus(403);
    }

    /** @test **/
    public function authenticated_user_can_be_view_their_project_only_index()
    {
        $project = factory(Project::class)->create();

        $this->signIn();

        $project2 = factory(Project::class)->create(['owner_id' => auth()->id()]);

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

        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $this->patch($project->path(), ['title' => null])->assertSessionHasErrors('title');
    }

    /** @test **/
    public function a_project_requires_a_description_on_update()
    {

        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $this->get(route('projects.edit', $project))
            ->assertOk()
            ->assertViewIs('projects.edit');

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
        $project = factory(Project::class)->create();

        $this->post('/projects')->assertRedirect('login');
        $this->get(route('projects.edit', $project))->assertRedirect('login');
        $this->get($project->path())->assertRedirect('login');
        $this->get('/projects/')->assertRedirect('login');
    }

}
