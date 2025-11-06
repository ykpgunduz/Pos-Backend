<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CafeTable;

class CafeTableController extends Controller
{
    public function index(){ return response()->json(CafeTable::paginate(20)); }
    public function show(CafeTable $table){ return response()->json($table); }
    public function store(Request $r){ $data = $r->validate(['cafe_id'=>'required|integer','table_number'=>'nullable|integer','order_number'=>'nullable|string','customer'=>'nullable|integer','status'=>'nullable|string','treat'=>'nullable|integer','total_amount'=>'nullable|integer']); return response()->json(CafeTable::create($data),201); }
    public function update(Request $r, CafeTable $table){ $data = $r->validate(['status'=>'nullable|string','total_amount'=>'nullable|integer']); $table->update($data); return response()->json($table); }
    public function destroy(CafeTable $table){ $table->delete(); return response()->json(['deleted'=>true]); }
}
