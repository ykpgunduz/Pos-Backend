<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index(){ return response()->json(Notification::paginate(20)); }
    public function show(Notification $notification){ return response()->json($notification); }
    public function store(Request $r){ $data = $r->validate(['cafe_id'=>'required|integer','user_id'=>'required|integer','type'=>'nullable|integer','data'=>'nullable','read_at'=>'nullable|date']); return response()->json(Notification::create($data),201); }
    public function update(Request $r, Notification $notification){ $data = $r->validate(['read_at'=>'nullable|date']); $notification->update($data); return response()->json($notification); }
    public function destroy(Notification $notification){ $notification->delete(); return response()->json(['deleted'=>true]); }
}
