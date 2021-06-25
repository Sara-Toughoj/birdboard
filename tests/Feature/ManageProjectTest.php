<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    public function guest_can_not_access_project_creation_endpoint()
    {
        $this->get('/projects/create')->assertRedirect('login');
    }

    /** @test */
    public function guests_can_not_create_projects()
    {
        $attributes = Project::factory()->raw();

        $this->post('/projects', $attributes)
            ->assertRedirect('login');
    }

    /** @test */
    public function guest_can_not_view_projects()
    {
        $this->get('/projects')->assertRedirect('login');
    }

    /** @test */
    public function guest_can_not_view_a_single_projects()
    {
        $this->get('/projects/1')->assertRedirect('login');
    }


    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());

        $this->get('projects/create')->assertSuccessful();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attributes)
            ->assertRedirect('/projects');

        $this->assertDatabaseHas((new Project)->getTable(), $attributes);

        $this->get('/projects')
            ->assertSee($attributes['title']);

    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $attributes = Project::factory()->raw(['title' => null]);

        $this->actingAs(User::factory()->create())
            ->post('/projects', $attributes)
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {

        $attributes = Project::factory()->raw(['description' => null]);

        $this->actingAs(User::factory()->create())
            ->post('/projects', $attributes)
            ->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_user_can_view_their_project()
    {
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function an_authenticated_user_can_not_view_the_projects_of_others()
    {
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['owner_id' => User::factory()->create()]);

        $this->get($project->path())->assertForbidden();

    }


}
