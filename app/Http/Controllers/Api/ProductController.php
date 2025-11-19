<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(100);
        return response()->json($products);
    }

    public function show(Product $product)
    {
        // Tek ürün gösteriminde de kategori bilgisini dahil et
        $product->load(['category', 'cafe']);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cafe_id' => 'required|integer',
            'category_id' => 'required|integer',
            'image' => 'nullable|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'active' => 'nullable|boolean',
            'star' => 'nullable|integer|min:0|max:5',
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'cafe_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|string',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'active' => 'nullable|boolean',
            'star' => 'nullable|integer|min:0|max:5',
        ]);

        $product->update($data);
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['deleted' => true]);
    }
}
