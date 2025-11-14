<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PastItem;

class PastItemController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $pastItems = PastItem::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($pastItems);
    }

    public function show(Request $request, PastItem $pastItem)
    {
        $cafe = $request->user('cafe');

        if ($pastItem->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu geçmiş ürüne erişim yetkiniz yok'], 403);
        }

        return response()->json($pastItem);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'order_number' => 'required|string',
            'product_id' => 'required|integer',
            'quantity' => 'nullable|integer',
            'price' => 'nullable|integer'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(PastItem::create($data), 201);
    }

    public function update(Request $request, PastItem $pastItem)
    {
        $cafe = $request->user('cafe');

        if ($pastItem->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu geçmiş ürünü güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'quantity' => 'nullable|integer'
        ]);

        $pastItem->update($data);
        return response()->json($pastItem);
    }

    public function destroy(Request $request, PastItem $pastItem)
    {
        $cafe = $request->user('cafe');

        if ($pastItem->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu geçmiş ürünü silme yetkiniz yok'], 403);
        }

        $pastItem->delete();
        return response()->json(['deleted' => true]);
    }
}
