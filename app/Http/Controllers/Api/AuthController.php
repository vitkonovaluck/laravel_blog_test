<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return ['message' => 'Incorect login or password'];
        } else {
            $user->tokens()->delete();
            $token = $user->createToken($request->email);

            return $token;
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return ['message' => 'You are logged out'];
    }
}
