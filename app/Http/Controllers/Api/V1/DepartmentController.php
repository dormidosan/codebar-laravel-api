<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    public function index(): JsonResponse
    {
        $departments = Department::all();
        if ($departments->isEmpty()) {
            return response()->json(['message' => 'Departments not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Success', 'data' => $departments, 'status' => 200]);
    }

//    public function store(Request $request): JsonResponse
//    {
//        return response()->json(['message' => 'Not implemented', 'status' => 501]);
//    }
//
//    public function show($id): JsonResponse
//    {
//        return response()->json(['message' => 'Not implemented', 'status' => 501]);
//    }
//
//    public function update(Request $request, $id): JsonResponse
//    {
//        return response()->json(['message' => 'Not implemented', 'status' => 501]);
//    }
//
//    public function destroy($id): JsonResponse
//    {
//        return response()->json(['message' => 'Not implemented', 'status' => 501]);
//    }
}
