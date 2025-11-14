<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CafeTable;

class CafeTableController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $tables = CafeTable::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($tables);
    }

    public function show(Request $request, CafeTable $table)
    {
        $cafe = $request->user('cafe');

        if ($table->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu masaya erişim yetkiniz yok'], 403);
        }

        return response()->json($table);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'table_number' => 'nullable|integer',
            'order_number' => 'nullable|string',
            'customer' => 'nullable|integer',
            'status' => 'nullable|string',
            'treat' => 'nullable|integer',
            'total_amount' => 'nullable|integer'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(CafeTable::create($data), 201);
    }

    public function update(Request $request, CafeTable $table)
    {
        $cafe = $request->user('cafe');

        if ($table->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu masayı güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'order_number' => 'nullable|string',
            'customer' => 'nullable|integer',
            'status' => 'nullable|string',
            'treat' => 'nullable|integer',
            'total_amount' => 'nullable|integer'
        ]);

        $table->update($data);
        return response()->json($table);
    }

    public function destroy(Request $request, CafeTable $table)
    {
        $cafe = $request->user('cafe');

        if ($table->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu masayı silme yetkiniz yok'], 403);
        }

        $table->delete();
        return response()->json(['deleted' => true]);
    }
}
