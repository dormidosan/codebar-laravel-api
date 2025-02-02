<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\DetalleReactivo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DetalleReactivoController extends Controller
{
    public function index(): JsonResponse
    {
        $detalleReactivos = DetalleReactivo::with('reactivo')->get();
        return response()->json(['message' => 'Detalle reactivos encontrados', 'data' => $detalleReactivos]);
    }

    public function store(Request $request): JsonResponse
    {
        $detalleReactivo = DetalleReactivo::create($request->all());
        return response()->json(['message' => 'Detalle reactivo created', 'data' => $detalleReactivo]);
    }

    public function show($id): JsonResponse
    {
        $detalleReactivo = DetalleReactivo::with('reactivo')->findOrFail($id);
        return response()->json(['message' => 'Detalle reactivo encontrado', 'data' => $detalleReactivo]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $detalleReactivo = DetalleReactivo::findOrFail($id);
        $detalleReactivo->update($request->all());
//        return $detalleReactivo;
        return response()->json(['message' => 'Detalle reactivo updated', 'data' => $detalleReactivo]);
    }

    public function destroy($id): JsonResponse
    {
        $detalleReactivo = DetalleReactivo::findOrFail($id);
        $detalleReactivo->delete();
//        return $detalleReactivo;
        return response()->json(['message' => 'Detalle reactivo deleted', 'data' => $detalleReactivo]);
    }


}
