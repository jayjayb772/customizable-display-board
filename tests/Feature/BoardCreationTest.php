<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_create_board()
    {
        $this->markTestIncomplete();
    }

    public function test_team_owners_cant_leave_their_own_team()
    {
        $this->markTestIncomplete();
    }
}
