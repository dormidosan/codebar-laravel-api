<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\JsonResponse;

class DistrictController extends Controller
{
    public function index(): JsonResponse
    {
        $districts = District::all();
        if ($districts->isEmpty()) {
            return response()->json(['message' => 'Districts not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Success', 'data' => $districts, 'status' => 200]);
    }

//    public function store(Request $request): JsonResponse
//    {
//        return response()->json(['message' => 'Not implemented store', 'status' => 501]);
//    }
//
//    public function show($id): JsonResponse
//    {
//        return response()->json(['message' => 'Not implemented show', 'status' => 501]);
//    }
//
//    public function update(Request $request, $id): JsonResponse
//    {
//        return response()->json(['message' => 'Not implemented update', 'status' => 501]);
//    }
//
//    public function destroy($id): JsonResponse
//    {
//        return response()->json(['message' => 'Not implemented destroy', 'status' => 501]);
//    }
}
