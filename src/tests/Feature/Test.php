<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Admin;
use App\Models\User;

class Test extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Admin::factory()->create();
    }

    public function test()
    {
        $adminId = Admin::first()->id;

        User::factory()->create([
            'admin_id' => $adminId,
            'email' => 'bbb@ccc.com',
            'password' => 'test12345'
        ]);
        $this->assertDatabaseHas('users', [
            'admin_id' => $adminId,
            'email' => 'bbb@ccc.com',
            'password' => 'test12345'
        ]);
    }
}
