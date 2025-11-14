<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $cafe = $request->user('cafe');
        $notifications = Notification::where('cafe_id', $cafe->id)->paginate(20);
        return response()->json($notifications);
    }

    public function show(Request $request, Notification $notification)
    {
        $cafe = $request->user('cafe');

        if ($notification->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu bildirime erişim yetkiniz yok'], 403);
        }

        return response()->json($notification);
    }

    public function store(Request $request)
    {
        $cafe = $request->user('cafe');

        $data = $request->validate([
            'user_id' => 'required|integer',
            'type' => 'nullable|integer',
            'data' => 'nullable',
            'read_at' => 'nullable|date'
        ]);

        $data['cafe_id'] = $cafe->id;
        return response()->json(Notification::create($data), 201);
    }

    public function update(Request $request, Notification $notification)
    {
        $cafe = $request->user('cafe');

        if ($notification->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu bildirimi güncelleme yetkiniz yok'], 403);
        }

        $data = $request->validate([
            'read_at' => 'nullable|date'
        ]);

        $notification->update($data);
        return response()->json($notification);
    }

    public function destroy(Request $request, Notification $notification)
    {
        $cafe = $request->user('cafe');

        if ($notification->cafe_id !== $cafe->id) {
            return response()->json(['error' => 'Bu bildirimi silme yetkiniz yok'], 403);
        }

        $notification->delete();
        return response()->json(['deleted' => true]);
    }
}
