<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){ return response()->json(Category::paginate(20)); }
    public function show(Category $category){ return response()->json($category); }
    public function store(Request $r){
        $data = $r->validate(['cafe_id'=>'required|integer','icon'=>'nullable|string','color'=>'nullable|string','name'=>'required|string']);
        return response()->json(Category::create($data),201);
    }
    public function update(Request $r, Category $category){ $data = $r->validate(['icon'=>'nullable|string','color'=>'nullable|string','name'=>'nullable|string']); $category->update($data); return response()->json($category); }
    public function destroy(Category $category){ $category->delete(); return response()->json(['deleted'=>true]); }
}
