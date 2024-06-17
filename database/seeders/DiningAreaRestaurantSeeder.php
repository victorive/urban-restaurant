<?php

namespace Database\Seeders;

use App\Models\DiningArea;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiningAreaRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indoorDiningArea = DiningArea::query()->where('name', 'Indoor')->first();
        $outdoorDiningArea = DiningArea::query()->where('name', 'Outdoor')->first();
        $outdoorTerraceDiningArea = DiningArea::query()->where('name', 'Outdoor Terrace')->first();

        $greenRestaurant = Restaurant::query()->where('name', 'Green Restaurant')->first();
        $blueRestaurant = Restaurant::query()->where('name', 'Blue Restaurant')->first();

        $greenRestaurant?->diningAreas()->sync([$indoorDiningArea?->id, $outdoorDiningArea?->id]);
        $blueRestaurant?->diningAreas()->sync([$indoorDiningArea?->id, $outdoorTerraceDiningArea?->id]);
    }
}
