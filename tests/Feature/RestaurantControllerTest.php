<?php

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RestaurantControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllRestaurants(): void
    {
        $response = $this->get(url('/restaurants'));

        $response->assertStatus(200);
        $response->assertViewIs('index');
        $response->assertViewHas('restaurants');
    }

    public function testGetRestaurantsTables(): void
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('restaurants.tables', $restaurant));

        $response->assertStatus(200);
        $response->assertViewIs('pages.tables');
        $response->assertViewHas('tables');
        $response->assertViewHas('restaurantId');
    }

    public function testGetRestaurantsActiveTables(): void
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('restaurants.active-tables', $restaurant));

        $response->assertStatus(200);
        $response->assertViewIs('pages.active-tables');
        $response->assertViewHas('activeTablesByDiningArea');
        $response->assertViewHas('restaurantId');
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }
}
