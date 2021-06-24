<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_project_has_a_path()
    {
        $project = Project::factory()->create();

        $this->assertEquals("/projects/$project->id", $project->path());
    }

    /** @test */
    public function a_project_has_an_owner()
    {
        $project = Project::factory()->create();
        $this->assertInstanceOf(User::class, $project->owner);
    }
}
