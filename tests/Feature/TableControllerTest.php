<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TableControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllTables(): void
    {
        $response = $this->get(route('tables'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.tables');
        $response->assertViewHas('tables');
    }

    public function testGetAllActiveTables(): void
    {
        $response = $this->get(route('active-tables'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.active-tables');
        $response->assertViewHas('activeTablesByDiningArea');
    }

    public function testRouteTables(): void
    {
        $response = $this->get(route('tables'));
        $response->assertStatus(200);
    }

    public function testRouteActiveTables(): void
    {
        $response = $this->get(route('active-tables'));
        $response->assertStatus(200);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }
}
