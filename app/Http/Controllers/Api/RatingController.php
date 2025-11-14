<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $ratings = Rating::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($ratings);
    }

    public function show(Request $request, Rating $rating)
    {
        $cafe = $request->user('cafe');

        if ($rating->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu değerlendirmeye erişim yetkiniz yok'], 403);
        }

        return response()->json($rating);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'order_number' => 'nullable|string',
            'service_rating' => 'nullable|integer',
            'product_rating' => 'nullable|integer',
            'ambiance_rating' => 'nullable|integer',
            'return_response' => 'nullable|boolean',
            'comment' => 'nullable|string'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(Rating::create($data), 201);
    }

    public function update(Request $request, Rating $rating)
    {
        $cafe = $request->user('cafe');

        if ($rating->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu değerlendirmeyi güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'comment' => 'nullable|string'
        ]);

        $rating->update($data);
        return response()->json($rating);
    }

    public function destroy(Request $request, Rating $rating)
    {
        $cafe = $request->user('cafe');

        if ($rating->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu değerlendirmeyi silme yetkiniz yok'], 403);
        }

        $rating->delete();
        return response()->json(['deleted' => true]);
    }
}
