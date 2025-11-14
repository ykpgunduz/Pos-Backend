<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PastOrder;

class PastOrderController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $pastOrders = PastOrder::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($pastOrders);
    }

    public function show(Request $request, PastOrder $pastOrder)
    {
        $cafe = $request->user('cafe');

        if ($pastOrder->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu geçmiş siparişe erişim yetkiniz yok'], 403);
        }

        return response()->json($pastOrder);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'order_number' => 'required|string',
            'table_number' => 'nullable|integer',
            'customer' => 'nullable|integer',
            'total_amount' => 'nullable|integer',
            'net_amount' => 'nullable|integer',
            'cash' => 'nullable|integer',
            'card' => 'nullable|integer',
            'iban' => 'nullable|string',
            'treat' => 'nullable|integer',
            'self_treat' => 'nullable|string'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(PastOrder::create($data), 201);
    }

    public function update(Request $request, PastOrder $pastOrder)
    {
        $cafe = $request->user('cafe');

        if ($pastOrder->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu geçmiş siparişi güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'total_amount' => 'nullable|integer'
        ]);

        $pastOrder->update($data);
        return response()->json($pastOrder);
    }

    public function destroy(Request $request, PastOrder $pastOrder)
    {
        $cafe = $request->user('cafe');

        if ($pastOrder->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu geçmiş siparişi silme yetkiniz yok'], 403);
        }

        $pastOrder->delete();
        return response()->json(['deleted' => true]);
    }
}
