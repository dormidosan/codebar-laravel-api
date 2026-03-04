<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::query()
            ->orderBy('email')
            ->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'Reagents not found', 'data' => []], 404);
        }
        return response()->json(['message' => 'Success', 'data' => $users]);
    }

    public function show($id): JsonResponse
    {
        $user = User::find($id);
        if (empty($user)) {
            return response()->json(['message' => 'User not found', 'data' => []], 404);
        }
        return response()->json(['message' => 'Success', 'data' => $user]);
    }
}
