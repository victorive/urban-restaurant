<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/restaurants');
});

Route::prefix('restaurants')->group(function () {

    Route::get('/', [RestaurantController::class, 'getAllRestaurants']);
    Route::get('{restaurant}/tables', [RestaurantController::class, 'getRestaurantsTables'])->name('restaurants.tables');
    Route::get('{restaurant}/active-tables', [RestaurantController::class, 'getRestaurantsActiveTables'])->name('restaurants.active-tables');
});
