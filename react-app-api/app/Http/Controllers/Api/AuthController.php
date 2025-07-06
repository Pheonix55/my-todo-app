<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthController extends Controller
{
    // Register
    public function register(RegisterUserRequest $request, UserService $service)
    {
        try {
            $data = $request->validated();
            $user = $service->createUser($data);
            $token = $user->createToken('api_token')->plainTextToken;

            return response()->json([
                'message' => 'User registered successfully',
                'token' => $token,
                'user' => new UserResource($user),
            ], 201);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // Login
    public function login(UserRequest $request, UserService $service)
    {
        try {
            $data = $request->validated();
            $user = $service->attemptToLogin($data);

            if (!$user) {
                return response()->json([
                    'message' => 'Login failed, invalid credentials',
                ], 401);
            } else {
                $token = auth()->user()->createToken('api_token')->plainTextToken;
                return response()->json([
                    'message' => 'Login successful',
                    'token' => $token,
                    'user' => new UserResource($user),
                ]);
            }

        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    // Get Authenticated User
    public function me(Request $request)
    {
        return new UserResource(auth()->user());
    }

    public function getAllUsers(UserService $service)
    {
        return UserResource::collection($service->getAllUsers());
    }
}
