<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $carts = Cart::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($carts);
    }

    public function show(Request $request, Cart $cart)
    {
        $cafe = $request->user('cafe');

        if ($cart->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu sepete erişim yetkiniz yok'], 403);
        }

        return response()->json($cart);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'nullable|integer',
            'price' => 'nullable|integer'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(Cart::create($data), 201);
    }

    public function update(Request $request, Cart $cart)
    {
        $cafe = $request->user('cafe');

        if ($cart->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu sepeti güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'quantity' => 'nullable|integer',
            'price' => 'nullable|integer'
        ]);

        $cart->update($data);
        return response()->json($cart);
    }

    public function destroy(Request $request, Cart $cart)
    {
        $cafe = $request->user('cafe');

        if ($cart->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu sepeti silme yetkiniz yok'], 403);
        }

        $cart->delete();
        return response()->json(['deleted' => true]);
    }
}
