<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ReactivoAsignado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReactivoAsignadoController extends Controller
{
    public function index(): JsonResponse
    {
        $reactivoAsignados = ReactivoAsignado::with('usuario', 'laboratorio', 'detalleReactivo')->get();
        return response()->json(['message' => 'success', 'data' => $reactivoAsignados]);
    }

    public function store(Request $request): JsonResponse
    {
        $reactivoAsignado = ReactivoAsignado::create($request->all());
        return response()->json(['message' => 'Detalle reactivo created', 'data' => $reactivoAsignado]);
    }

    public function show($id): JsonResponse
    {
        $reactivoAsignado = ReactivoAsignado::findOrFail($id);
        return response()->json(['message' => 'Detalle reactivo encontrado', 'data' => $reactivoAsignado]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $reactivoAsignado = ReactivoAsignado::findOrFail($id);
        $reactivoAsignado->update($request->all());
        return response()->json(['message' => 'Detalle reactivo updated', 'data' => $reactivoAsignado]);
    }

    public function destroy($id): JsonResponse
    {
        $detalleReactivo = ReactivoAsignado::findOrFail($id);
        $detalleReactivo->delete();
        return response()->json(['message' => 'Detalle reactivo deleted', 'data' => $detalleReactivo]);
    }
}
