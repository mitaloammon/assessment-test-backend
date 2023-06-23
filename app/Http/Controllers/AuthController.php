<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreuserRequest;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function login(StoreuserRequest $request)
    {
        $credentials = $request->only(['email', 'password', 'name']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'user' => $user,
                'access_token' => $token,
            ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }


    public function logout()
    {
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
