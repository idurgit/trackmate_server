<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $token = $user->createToken('token-name', ['server:update'])->plainTextToken;

            return response()->json([
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'company' => $user->company_id,
                    'role' => $user->role,
                    'department' => $user->department,
                    'photo' => $user->photo,
                    'status' => $user->status,
                    'token' => $token,
                ]
            ]);
        }

        return response()->json([
            "message" => "Wrong email or password"
        ], 401);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        if ($token) {
            $user = Auth::user();

            //Hapus token sesuai dengan token yang diberikan
            $user->tokens()->where('token', hash('sha256', $token))->delete();

            return response()->json([
                'message' => 'Successfully logged out.'
            ]);
        }

        return response()->json([
            'message' => 'Token is required.'
        ], 400);
    }
}
