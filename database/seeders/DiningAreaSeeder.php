<?php

namespace Database\Seeders;

use App\Models\DiningArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiningAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiningArea::query()->create(['name' => 'Indoor']);

        DiningArea::query()->create(['name' => 'Outdoor']);

        DiningArea::query()->create(['name' => 'Outdoor Terrace']);
    }
}
