<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Reactivo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReactivoController extends Controller
{
    public function index(): JsonResponse
    {
        $reactivos = Reactivo::all();
		return response()->json(['message' => 'Success', 'data' => $reactivos, 'status' => 200]);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(['message' => 'Not implemented store', 'status' => 501]);
    }

    public function show($id): JsonResponse
    {
        return response()->json(['message' => 'Not implemented show', 'status' => 501]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        return response()->json(['message' => 'Not implemented update', 'status' => 501]);
    }

    public function destroy($id): JsonResponse
    {
        return response()->json(['message' => 'Not implemented destroy', 'status' => 501]);
    }
}
