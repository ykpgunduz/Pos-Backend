<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CafeAuthController extends Controller
{
    /**
     * Kafe kaydı oluşturma (register)
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:cafes',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $cafe = Cafe::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'description' => $request->description,
        ]);

        $token = $cafe->createToken('cafe-token')->plainTextToken;

        return response()->json([
            'message' => 'Kafe başarıyla oluşturuldu',
            'cafe' => $cafe,
            'token' => $token,
        ], 201);
    }

    /**
     * Kafe girişi (login)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $cafe = Cafe::where('email', $request->email)->first();

        if (!$cafe || !Hash::check($request->password, $cafe->password)) {
            throw ValidationException::withMessages([
                'email' => ['Girdiğiniz bilgiler hatalı.'],
            ]);
        }

        $token = $cafe->createToken('cafe-token')->plainTextToken;

        return response()->json([
            'message' => 'Giriş başarılı',
            'cafe' => $cafe,
            'token' => $token,
        ]);
    }

    /**
     * Kafe çıkışı (logout)
     */
    public function logout(Request $request)
    {
        $request->user('cafe')->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Çıkış başarılı',
        ]);
    }

    /**
     * Mevcut kafe bilgilerini getir
     */
    public function me(Request $request)
    {
        return response()->json([
            'cafe' => $request->user('cafe'),
        ]);
    }
}
