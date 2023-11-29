<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase; // To my knowledge, this is currently fully refreshing the database and applying the migrations again (migrate:fresh)

    /** @test */
    public function it_can_get_to_user_index()
    {
        $response = $this->get('/user');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_to_user_create()
    {
        $response = $this->get('/user/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_user()
    {
        // Arrange
        $userData = [
            'name' => 'Tomás',
            'last_names' => 'Peña Bustamante',
            'email' => 'tomas.penab@example.com',
            'password' => bcrypt('password123'),
        ];

        // Act
        $user = User::create($userData);

        // Assert
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Tomás', $user->name);
        $this->assertEquals('Peña Bustamante', $user->last_names);
        $this->assertEquals('tomas.penab@example.com', $user->email);
    }
}
