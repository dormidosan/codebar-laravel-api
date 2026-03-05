<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        if ($request->user()->role_id !== 1) {
            return response()->json(['message' => 'Unauthorized', 'data' => []], 401);
        }

        $request->validate([
            'email' => 'required|email',
            'user_id' => 'exists:users,id',
        ]);

        $user = User::query()
            ->where('email', $request->input('email'))
            ->where('id', $request->input('user_id'))
            ->first();

        if (!$user) {
            return response()->json(['message' => 'User not found', 'data' => []], 404);
        }

        $user->password = Hash::make('password');
        $user->save();

        // Revoke all tokens
        $user->tokens()->delete();
        return response()->json(['message' => 'Success', 'data' => []]);
    }
}
