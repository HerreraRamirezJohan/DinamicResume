<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthUserRequest;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request) : JsonResponse{
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()
            ->json(['data' => $user,
                    'accsess_token' => $user->createToken('auth_token')->plainTextToken,
                    'token_type' => 'Bearer',]);
    }

    public function login(AuthUserRequest $request) : JsonResponse{
        $request->validated($request->all());

        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
               'message' => 'Credentials do not match'
            ], 401);
        }

        return response()->json([
            'user' => $request->user(),
            'token' => $user->createToken('Token of ' . $user->name)->plainTextToken
        ]);
    }

    public function logout(Request $request) : JsonResponse{
        $token = $request->user()->currentAccessToken();

        $token->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
