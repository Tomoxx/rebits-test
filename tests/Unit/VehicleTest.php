<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Vehicle;

class VehicleTest extends TestCase
{
    use RefreshDatabase; // To my knowledge, this is currently fully refreshing the database and applying the migrations again (migrate:fresh)

    /** @test */
    public function it_can_get_to_vehicle_index()
    {
        $response = $this->get('/vehicle');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_to_vehicle_create()
    {
        $response = $this->get('/vehicle/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_vehicle()
    {
        $user = User::create([
            'name' => 'Tomás',
            'last_names' => 'Peña Bustamante',
            'email' => 'tomas.penab@example.com',
            'password' => bcrypt('password123'),
        ]);
        // Arrange
        $vehicleData = [
            'brand' => 'Mercedes Benz',
            'model' => 'C4',
            'year' => 2023,
            'owner_id' => $user->id,
            'price' => 2000,
        ];

        // Act
        $vehicle = Vehicle::create($vehicleData);

        // Assert
        $this->assertInstanceOf(Vehicle::class, $vehicle);
        $this->assertEquals('Mercedes Benz', $vehicle->brand);
        $this->assertEquals('C4', $vehicle->model);
        $this->assertEquals(2023, $vehicle->year);
        $this->assertEquals($user->id, $vehicle->owner_id);
        $this->assertEquals(2000, $vehicle->price);
    }
}
