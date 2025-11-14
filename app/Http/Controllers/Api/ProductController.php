<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $products = Product::where('cafe_id', $cafe->id)
            ->select(['id', 'cafe_id', 'category_id', 'image', 'name', 'description', 'price', 'stock', 'active', 'star', 'created_at', 'updated_at'])
            ->paginate(20);
        return response()->json($products);
    }

    public function show(Request $request, Product $product)
    {
        $cafe = $request->user('cafe');

        if ($product->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu ürüne erişim yetkiniz yok'], 403);
        }

        return response()->json($product);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'category_id' => 'required|integer',
            'image' => 'nullable|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'stock' => 'nullable|integer',
            'active' => 'nullable|boolean',
            'star' => 'nullable|integer',
        ]);

        $data['cafe_id'] = $cafe->id;
        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $cafe = $request->user('cafe');

        if ($product->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu ürünü güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'category_id' => 'nullable|integer',
            'image' => 'nullable|string',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'stock' => 'nullable|integer',
            'active' => 'nullable|boolean',
            'star' => 'nullable|integer',
        ]);

        $product->update($data);
        return response()->json($product);
    }

    public function destroy(Request $request, Product $product)
    {
        $cafe = $request->user('cafe');

        if ($product->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu ürünü silme yetkiniz yok'], 403);
        }

        $product->delete();
        return response()->json(['deleted' => true]);
    }
}
