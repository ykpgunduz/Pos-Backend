<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function index(){ return response()->json(OrderItem::paginate(20)); }
    public function show(OrderItem $orderItem){ return response()->json($orderItem); }
    public function store(Request $r){ $data = $r->validate(['cafe_id'=>'required|integer','table_number'=>'nullable|integer','order_number'=>'required|string','product_id'=>'required|integer','product_price'=>'nullable|integer','note'=>'nullable|string','quantity'=>'nullable|integer','status'=>'nullable|string']); return response()->json(OrderItem::create($data),201); }
    public function update(Request $r, OrderItem $orderItem){ $data = $r->validate(['status'=>'nullable|string']); $orderItem->update($data); return response()->json($orderItem); }
    public function destroy(OrderItem $orderItem){ $orderItem->delete(); return response()->json(['deleted'=>true]); }
}
