<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index(){ return response()->json(Rating::paginate(20)); }
    public function show(Rating $rating){ return response()->json($rating); }
    public function store(Request $r){ $data = $r->validate(['cafe_id'=>'required|integer','order_number'=>'nullable|string','service_rating'=>'nullable|integer','product_rating'=>'nullable|integer','ambiance_rating'=>'nullable|integer','return_response'=>'nullable|boolean','comment'=>'nullable|string']); return response()->json(Rating::create($data),201); }
    public function update(Request $r, Rating $rating){ $data = $r->validate(['comment'=>'nullable|string']); $rating->update($data); return response()->json($rating); }
    public function destroy(Rating $rating){ $rating->delete(); return response()->json(['deleted'=>true]); }
}
