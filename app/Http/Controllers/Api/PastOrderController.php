<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PastOrder;

class PastOrderController extends Controller
{
    public function index(){ return response()->json(PastOrder::paginate(20)); }
    public function show(PastOrder $pastOrder){ return response()->json($pastOrder); }
    public function store(Request $r){
        $data = $r->validate([
            'cafe_id'=>'required|integer','order_number'=>'required|string','table_number'=>'nullable|integer','customer'=>'nullable|integer','total_amount'=>'nullable|integer','net_amount'=>'nullable|integer','cash'=>'nullable|integer','card'=>'nullable|integer','iban'=>'nullable|string','treat'=>'nullable|integer','self_treat'=>'nullable|string'
        ]);
        return response()->json(PastOrder::create($data),201);
    }
    public function update(Request $r, PastOrder $pastOrder){ $data = $r->validate(['total_amount'=>'nullable|integer']); $pastOrder->update($data); return response()->json($pastOrder); }
    public function destroy(PastOrder $pastOrder){ $pastOrder->delete(); return response()->json(['deleted'=>true]); }
}
