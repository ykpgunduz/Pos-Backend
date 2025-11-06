<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){ return response()->json(User::paginate(20)); }
    public function show(User $user){ return response()->json($user); }
    public function store(Request $r){ $data = $r->validate(['name'=>'required|string','email'=>'required|email|unique:users,email','password'=>'required|string']); $data['password'] = bcrypt($data['password']); return response()->json(User::create($data),201); }
    public function update(Request $r, User $user){ $data = $r->validate(['name'=>'nullable|string','email'=>'nullable|email|unique:users,email,'.$user->id,'password'=>'nullable|string']); if(isset($data['password'])) $data['password']=bcrypt($data['password']); $user->update($data); return response()->json($user); }
    public function destroy(User $user){ $user->delete(); return response()->json(['deleted'=>true]); }
}
