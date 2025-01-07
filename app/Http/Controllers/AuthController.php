<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        try {

            // dd($request->all());
            //code...
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6',
                'username' => 'required|string|unique:users',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'username' => $request->username,
                'role' => $request->role
            ]);

            return response()->json(['message' => 'User successfully registered'], 201);
        } catch (\Throwable $th) {
            //throw $th;
            // dd();
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    // Log in a user and issue a JWT
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }


        // return $this->respondWithToken($token);
        return response()->json([
            'status' => 'success',
            'access_token' => $token,
            'role' => auth()->user()->role,
            'token_type' => 'bearer',
            'expires_in' => 3600
            // 'expires_in' => auth('api')->factory()->getTTL() * 60 * 9999
        ]);
    }

    // Get authenticated user details
    public function user()
    {
        return response()->json(auth()->user());
    }

    // Log out the user
    public function logout()
    {
        // $role = auth()->user()->role;
        auth()->logout();

        Cookie::queue(Cookie::forget('token'));

        return redirect('/login');
        // return response()->json(['message' => 'Successfully logged out']);
    }


    public function getCredentials() {
        $user = User::find(1); // Replace with the appropriate user or payload
        $token = JWTAuth::fromUser($user);

        // Respond with the token and any additional data the ESP32 may need
        $response = Http::withHeader('Authorization', 'Bearer ' . $token)
            ->post('http://192.168.187.29/trigger');

        return response()->json([
            'token' => $token,
            'message' => 'JWT generated successfully.',
        ]);
    }

    public function logoutMobile()
    {
        // $role = auth()->user()->role;
        auth()->logout();

        Cookie::queue(Cookie::forget('token'));

        return redirect('/mobile/login');
        // return response()->json(['message' => 'Successfully logged out']);
    }

    // Refresh JWT token
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    // Helper method to structure token response
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

