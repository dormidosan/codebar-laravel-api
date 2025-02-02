<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Laboratorio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function index(): JsonResponse
    {
        $laboratorios = Laboratorio::all();
		return response()->json(['message' => 'Success', 'data' => $laboratorios, 'status' => 200]);
    }

    public function store(Request $request): JsonResponse
    {
        $laboratorio = new Laboratorio($request->all());
        $laboratorio->save();
        return response()->json(['message' => 'Laboratorio creado', 'status' => 201]);
    }

    public function show($id): JsonResponse
    {
        $laboratorio = Laboratorio::findOrFail($id);
        return response()->json(['message' => 'Laboratorio encontrado', 'status' => 200, 'data' => $laboratorio]);
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
