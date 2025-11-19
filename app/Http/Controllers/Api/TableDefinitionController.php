<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableDefinition;

class TableDefinitionController extends Controller
{
    public function index()
    {
        $tables = TableDefinition::with('cafe')->paginate(20);
        return response()->json($tables);
    }

    public function show(TableDefinition $tableDefinition)
    {
        $tableDefinition->load('cafe');
        return response()->json($tableDefinition);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cafe_id' => 'required|integer|exists:cafes,id',
            'name' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'table_number' => 'required|integer',
            'capacity' => 'nullable|integer|min:1',
            'position_x' => 'nullable|string',
            'position_y' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        $table = TableDefinition::create($data);
        return response()->json($table, 201);
    }

    public function update(Request $request, TableDefinition $tableDefinition)
    {
        $data = $request->validate([
            'cafe_id' => 'nullable|integer|exists:cafes,id',
            'name' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'table_number' => 'nullable|integer',
            'capacity' => 'nullable|integer|min:1',
            'position_x' => 'nullable|string',
            'position_y' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        $tableDefinition->update($data);
        return response()->json($tableDefinition);
    }

    public function destroy(TableDefinition $tableDefinition)
    {
        $tableDefinition->delete();
        return response()->json(['deleted' => true]);
    }

    // Belirli bir kafeye ait masaları getir
    public function getByCafe($cafeId)
    {
        $tables = TableDefinition::where('cafe_id', $cafeId)
            ->where('is_active', true)
            ->orderBy('area')
            ->orderBy('table_number')
            ->get();

        return response()->json($tables);
    }
}
