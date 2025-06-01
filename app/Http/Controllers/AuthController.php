<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'The credentials are incorrect.'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message' => 'Login successful', 'token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful.']);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->only('name', 'email', 'password'));

        return response()->json($user);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully.']);
    }
}
