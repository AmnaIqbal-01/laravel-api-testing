<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admins;


use Illuminate\Routing\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        // Authenticate admin (you may have your own logic here)
        if (Auth::attempt($request->only('email', 'password'))) {
            // Generate a token for the authenticated admin
            $token = Auth::user()->createToken('Admin Token')->plainTextToken;
            
            // Optionally, you can return the token to the client
            return response()->json(['token' => $token]);
        }
        
        // Return authentication failed response
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
