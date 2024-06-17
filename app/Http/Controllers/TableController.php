<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TableController extends Controller
{
    public function getAllTables(): Factory|View|Application
    {
        $tables = Table::with(['restaurant:id,name', 'diningArea:id,name'])->get();

        return view('pages.tables', ['tables' => $tables]);
    }

    public function getAllActiveTables(): Factory|View|Application
    {
        $activeTablesByDiningArea = Table::with(['restaurant:id,name', 'diningArea:id,name'])->where('active', true)->get()
            ->groupBy(function ($table) {
                return $table->diningArea->name;
            });

        return view('pages.active-tables', ['activeTablesByDiningArea' => $activeTablesByDiningArea]);
    }
}
