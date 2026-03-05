<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->input('password') === 'password') {
            return response()->json(['message' => 'Por favor, actualize su contraseña'], 403);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        $user = Auth::user();

        // Check for existing non-expired token or create a new one if expired/missing
        $existingToken = $user->tokens()
            ->where('name', 'api-token')
            ->where(static function ($query) {
                // Get null and values with date.
                $query->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            })
            ->where('created_at', '>=', now()->subMinutes(config('sanctum.expiration')))
            ->first();

        if ($existingToken) {
            $token = $existingToken->token;
        }
        else {
            // Delete any expired tokens for this user
            $user->tokens()->where('name', 'api-token')->delete();
            // Create a new token
            $token = $user->createToken('api-token')->plainTextToken;
        }

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function updatePasswordRequestToken(Request $request): JsonResponse
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        return response()->json(['message' => 'Token generated successfully', 'token' => $token]);
    }

    public function updatePasswordRequest(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'old_password' => 'required|min:6',
            'password' => [
                'required',
                'min:6',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
                'confirmed'
            ],
        ]);

        $reset = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$reset || !hash_equals($reset->token, $request->token)) {
            return response()->json(['message' => 'Invalid token'], 400);
        }

        $user = User::where('email', $request->email)->first();
        // Check if the old password matches
        if (!password_verify($request->old_password, $user->password)) {
            return response()->json(['message' => 'Old password does not match'], 400);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return response()->json(['message' => 'Password reset successfully']);
    }
}
