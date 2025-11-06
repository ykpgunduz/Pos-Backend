<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;

class CafeController extends Controller
{
    public function index(){ return response()->json(Cafe::paginate(20)); }
    public function show(Cafe $cafe){ return response()->json($cafe); }
    public function store(Request $r){
        $data = $r->validate([
            'name'=>'required|string','description'=>'nullable|string','phone'=>'nullable|string','address'=>'nullable|string','address_link'=>'nullable|string','insta_name'=>'nullable|string','insta_link'=>'nullable|string','opening_time'=>'nullable|integer','closing_time'=>'nullable|integer'
        ]);
        return response()->json(Cafe::create($data),201);
    }
    public function update(Request $r, Cafe $cafe){ $data = $r->validate(['name'=>'nullable|string','description'=>'nullable|string']); $cafe->update($data); return response()->json($cafe); }
    public function destroy(Cafe $cafe){ $cafe->delete(); return response()->json(['deleted'=>true]); }
}
