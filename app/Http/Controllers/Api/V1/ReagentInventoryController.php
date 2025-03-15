<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ReagentInventory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReagentInventoryController extends Controller
{
    public function index(): JsonResponse
    {
        $reagentInventories = ReagentInventory::with('reactivo')->get();
        return response()->json(['message' => 'Detalle reactivos encontrados', 'data' => $reagentInventories]);
    }

    public function store(Request $request): JsonResponse
    {
        $reagentInventory = ReagentInventory::create($request->all());
        return response()->json(['message' => 'Detalle reactivo created', 'data' => $reagentInventory]);
    }

    public function show($id): JsonResponse
    {
        $reagentInventory = ReagentInventory::with('reactivo')->findOrFail($id);
        return response()->json(['message' => 'Detalle reactivo encontrado', 'data' => $reagentInventory]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $reagentInventory = ReagentInventory::findOrFail($id);
        $reagentInventory->update($request->all());
//        return $reagentInventory;
        return response()->json(['message' => 'Detalle reactivo updated', 'data' => $reagentInventory]);
    }

    public function destroy($id): JsonResponse
    {
        $reagentInventory = ReagentInventory::findOrFail($id);
        $reagentInventory->delete();
//        return $reagentInventory;
        return response()->json(['message' => 'Detalle reactivo deleted', 'data' => $reagentInventory]);
    }


}
