<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

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
        echo $user;

        // Assert
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Tomás', $user->name);
        $this->assertEquals('Peña Bustamante', $user->last_names);
        $this->assertEquals('tomas.penab@example.com', $user->email);
    }
}
