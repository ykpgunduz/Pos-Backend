<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PastItem;

class PastItemController extends Controller
{
    public function index(){ return response()->json(PastItem::paginate(20)); }
    public function show(PastItem $pastItem){ return response()->json($pastItem); }
    public function store(Request $r){ $data = $r->validate(['cafe_id'=>'required|integer','order_number'=>'required|string','product_id'=>'required|integer','quantity'=>'nullable|integer','price'=>'nullable|integer']); return response()->json(PastItem::create($data),201); }
    public function update(Request $r, PastItem $pastItem){ $data = $r->validate(['quantity'=>'nullable|integer']); $pastItem->update($data); return response()->json($pastItem); }
    public function destroy(PastItem $pastItem){ $pastItem->delete(); return response()->json(['deleted'=>true]); }
}
