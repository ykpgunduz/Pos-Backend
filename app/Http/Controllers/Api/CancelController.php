<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cancel;

class CancelController extends Controller
{
    public function index(){ return response()->json(Cancel::paginate(20)); }
    public function show(Cancel $cancel){ return response()->json($cancel); }
    public function store(Request $r){ $data = $r->validate(['cafe_id'=>'required|integer','status'=>'nullable|string','product_info'=>'nullable|string','description'=>'nullable|string']); return response()->json(Cancel::create($data),201); }
    public function update(Request $r, Cancel $cancel){ $data = $r->validate(['status'=>'nullable|string']); $cancel->update($data); return response()->json($cancel); }
    public function destroy(Cancel $cancel){ $cancel->delete(); return response()->json(['deleted'=>true]); }
}
