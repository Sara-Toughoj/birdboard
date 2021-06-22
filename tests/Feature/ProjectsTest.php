<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attributes)
            ->assertRedirect('/projects');

        $this->get('/projects')
            ->assertSee($attributes['title']);

    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $attributes = Project::factory()->raw(['title' => null]);

        $this->post('/projects', $attributes)
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {

        $attributes = Project::factory()->raw(['description' => null]);

        $this->post('/projects', $attributes)
            ->assertSessionHasErrors('description');
    }
}
