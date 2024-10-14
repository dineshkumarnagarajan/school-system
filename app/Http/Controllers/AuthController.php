<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    // Login Method
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return back()->withErrors(['error' => 'Unauthorized']);
            }
        } catch (JWTException $e) {
            return back()->withErrors(['error' => 'Could not create token']);
        }

        // Store the token in the session or cookie to use with view requests
        session(['jwt_token' => $token]);

        return redirect()->route('dashboard');
    }

    // Profile method to check user info (useful for views)
    public function profile()
    {
        return view('profile', ['user' => JWTAuth::user()]);
    }

    // Logout Method
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        session()->forget('jwt_token');

        return redirect()->route('login');
    }
}
