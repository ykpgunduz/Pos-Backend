<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $categories = Category::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($categories);
    }

    public function show(Request $request, Category $category)
    {
        $cafe = $request->user('cafe');

        if ($category->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu kategoriye erişim yetkiniz yok'], 403);
        }

        return response()->json($category);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'name' => 'required|string'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(Category::create($data), 201);
    }

    public function update(Request $request, Category $category)
    {
        $cafe = $request->user('cafe');

        if ($category->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu kategoriyi güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'name' => 'nullable|string'
        ]);

        $category->update($data);
        return response()->json($category);
    }

    public function destroy(Request $request, Category $category)
    {
        $cafe = $request->user('cafe');

        if ($category->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu kategoriyi silme yetkiniz yok'], 403);
        }

        $category->delete();
        return response()->json(['deleted' => true]);
    }
}
