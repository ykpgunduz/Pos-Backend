<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $orderItems = OrderItem::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($orderItems);
    }

    public function show(Request $request, OrderItem $orderItem)
    {
        $cafe = $request->user('cafe');

        if ($orderItem->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu siparişe erişim yetkiniz yok'], 403);
        }

        return response()->json($orderItem);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'table_number' => 'nullable|integer',
            'order_number' => 'required|string',
            'product_id' => 'required|integer',
            'product_price' => 'nullable|integer',
            'note' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'status' => 'nullable|string'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(OrderItem::create($data), 201);
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $cafe = $request->user('cafe');

        if ($orderItem->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu siparişi güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'status' => 'nullable|string'
        ]);

        $orderItem->update($data);
        return response()->json($orderItem);
    }

    public function destroy(Request $request, OrderItem $orderItem)
    {
        $cafe = $request->user('cafe');

        if ($orderItem->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu siparişi silme yetkiniz yok'], 403);
        }

        $orderItem->delete();
        return response()->json(['deleted' => true]);
    }
}
