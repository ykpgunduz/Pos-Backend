<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cancel;

class CancelController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $cancels = Cancel::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($cancels);
    }

    public function show(Request $request, Cancel $cancel)
    {
        $cafe = $request->user('cafe');

        if ($cancel->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu iptale erişim yetkiniz yok'], 403);
        }

        return response()->json($cancel);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'status' => 'nullable|string',
            'product_info' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(Cancel::create($data), 201);
    }

    public function update(Request $request, Cancel $cancel)
    {
        $cafe = $request->user('cafe');

        if ($cancel->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu iptali güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'status' => 'nullable|string'
        ]);

        $cancel->update($data);
        return response()->json($cancel);
    }

    public function destroy(Request $request, Cancel $cancel)
    {
        $cafe = $request->user('cafe');

        if ($cancel->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu iptali silme yetkiniz yok'], 403);
        }

        $cancel->delete();
        return response()->json(['deleted' => true]);
    }
}
