<?php

namespace Database\Seeders;

use App\Models\DiningArea;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $greenRestaurant = Restaurant::query()->where(['name' => 'Green Restaurant'])->first();
        $blueRestaurant = Restaurant::query()->where(['name' => 'Blue Restaurant'])->first();

        $indoorDiningAreaId = DiningArea::query()->where('name', 'Indoor')->value('id');
        $outdoorDiningAreaId = DiningArea::query()->where('name', 'Outdoor')->value('id');
        $outdoorTerraceDiningAreaId = DiningArea::query()->where('name', 'Outdoor Terrace')->value('id');

        $greenRestaurant?->tables()->createMany([
            ['name' => 'Table 1', 'minimum_capacity' => 2, 'maximum_capacity' => 4, 'active' => true, 'dining_area_id' => $indoorDiningAreaId],
            ['name' => 'Table 2', 'minimum_capacity' => 2, 'maximum_capacity' => 4, 'active' => true, 'dining_area_id' => $indoorDiningAreaId],
            ['name' => 'Table 3', 'minimum_capacity' => 2, 'maximum_capacity' => 4, 'active' => true, 'dining_area_id' => $indoorDiningAreaId],
            ['name' => 'Table 4', 'minimum_capacity' => 2, 'maximum_capacity' => 4, 'active' => true, 'dining_area_id' => $indoorDiningAreaId],
            ['name' => 'Table 5', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => false, 'dining_area_id' => $indoorDiningAreaId],
            ['name' => 'Table 6', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => false, 'dining_area_id' => $indoorDiningAreaId],
            ['name' => 'Table 7', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => true, 'dining_area_id' => $outdoorDiningAreaId],
            ['name' => 'Table 8', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => true, 'dining_area_id' => $outdoorDiningAreaId],
            ['name' => 'Table 9', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => true, 'dining_area_id' => $outdoorDiningAreaId],
            ['name' => 'Table 10', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => true, 'dining_area_id' => $outdoorDiningAreaId],
            ['name' => 'Table 11', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => true, 'dining_area_id' => $outdoorDiningAreaId],
        ]);


        $blueRestaurant?->tables()->createMany([
            ['name' => 'Table 1', 'minimum_capacity' => 1, 'maximum_capacity' => 2, 'active' => true, 'dining_area_id' => $indoorDiningAreaId],
            ['name' => 'Table 2', 'minimum_capacity' => 1, 'maximum_capacity' => 2, 'active' => true, 'dining_area_id' => $indoorDiningAreaId],
            ['name' => 'Table 3', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => true, 'dining_area_id' => $outdoorTerraceDiningAreaId],
            ['name' => 'Table 4', 'minimum_capacity' => 3, 'maximum_capacity' => 5, 'active' => true, 'dining_area_id' => $outdoorTerraceDiningAreaId],
        ]);
    }
}
