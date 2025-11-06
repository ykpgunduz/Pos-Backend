<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(){ return response()->json(Cart::paginate(20)); }
    public function show(Cart $cart){ return response()->json($cart); }
    public function store(Request $r){ $data = $r->validate(['cafe_id'=>'required|integer','product_id'=>'required|integer','quantity'=>'nullable|integer','price'=>'nullable|integer']); return response()->json(Cart::create($data),201); }
    public function update(Request $r, Cart $cart){ $data = $r->validate(['quantity'=>'nullable|integer','price'=>'nullable|integer']); $cart->update($data); return response()->json($cart); }
    public function destroy(Cart $cart){ $cart->delete(); return response()->json(['deleted'=>true]); }
}
