<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function index(): JsonResponse
    {
        $laboratories = Laboratory::all();
		return response()->json(['message' => 'Success', 'data' => $laboratories, 'status' => 200]);
    }

    public function store(Request $request): JsonResponse
    {
        $laboratory = new Laboratory($request->all());
        $laboratory->save();
        return response()->json(['message' => 'Laboratory creado', 'status' => 201]);
    }

    public function show($id): JsonResponse
    {
        $laboratory = Laboratory::findOrFail($id);
        return response()->json(['message' => 'Laboratory encontrado', 'status' => 200, 'data' => $laboratory]);
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
