<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\LaboratoryReagent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LaboratoryReagentController extends Controller
{
    public function index(): JsonResponse
    {
        $laboratoryReagents = LaboratoryReagent::with('usuario', 'laboratorio', 'detalleReactivo')->get();
        return response()->json(['message' => 'success', 'data' => $laboratoryReagents]);
    }

    public function store(Request $request): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::create($request->all());
        return response()->json(['message' => 'Detalle reactivo created', 'data' => $laboratoryReagent]);
    }

    public function show($id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::findOrFail($id);
        return response()->json(['message' => 'Detalle reactivo encontrado', 'data' => $laboratoryReagent]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::findOrFail($id);
        $laboratoryReagent->update($request->all());
        return response()->json(['message' => 'Detalle reactivo updated', 'data' => $laboratoryReagent]);
    }

    public function destroy($id): JsonResponse
    {
        $detalleReactivo = LaboratoryReagent::findOrFail($id);
        $detalleReactivo->delete();
        return response()->json(['message' => 'Detalle reactivo deleted', 'data' => $detalleReactivo]);
    }
}
