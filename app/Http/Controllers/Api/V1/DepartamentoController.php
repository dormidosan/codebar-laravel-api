<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index(): JsonResponse
    {
        $departamentos = Departamento::all();
        return response()->json(['message' => 'Success', 'data' => $departamentos, 'status' => 200]);
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
