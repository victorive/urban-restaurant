<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RestaurantController extends Controller
{
    public function getAllRestaurants(): Factory|View|Application
    {
        $restaurants = Restaurant::all();

        return view('index', ['restaurants' => $restaurants]);
    }

    public function getRestaurantsTables(Restaurant $restaurant): Factory|View|Application
    {
        $tables = $restaurant->tables()->get();

        return view('pages.tables', [
            'restaurantId' => $restaurant->id,
            'tables' => $tables
        ]);
    }

    public function getRestaurantsActiveTables(Restaurant $restaurant): Factory|View|Application
    {
        $tables = $restaurant->tables()->where('active', true)->get()
            ->groupBy(function ($table) {
                return $table->diningArea->name;
            });

        return view('pages.active-tables', [
            'restaurantId' => $restaurant->id,
            'activeTablesByDiningArea' => $tables
        ]);
    }
}
