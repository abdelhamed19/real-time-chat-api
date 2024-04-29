<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user'=> $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
            "status"=>200
        ]);
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $request->email)->first();
        if (! Auth::attempt($validated)) {
            return response()->json(['message' => 'Bad credentials',"status"=>401]);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user'=> $user,
            'access_token' => $token,'token_type' => 'Bearer',"status"=>201]);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out',"status"=>200]);
    }
}
