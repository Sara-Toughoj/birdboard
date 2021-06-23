<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_have_projects()
    {
        $user = User::factory()->hasProjects()->create();

        $this->assertInstanceOf(Project::class, $user->projects[0]);
        $this->assertInstanceOf(Collection::class, $user->projects);
    }
}
