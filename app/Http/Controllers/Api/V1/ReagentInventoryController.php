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
        $reagentInventories = ReagentInventory::with('reagent')->get();
        if ($reagentInventories->isEmpty()) {
            return response()->json(['message' => 'Reagent inventories not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Reagent inventories found', 'data' => $reagentInventories, 'status' => 200]);
    }

    public function store(Request $request): JsonResponse
    {
        $reagentInventory = new ReagentInventory();
        $reagentInventory->fill($request->all());
        if (!$reagentInventory->save()) {
            return response()->json(['message' => 'Reagent inventory not created', 'data' => [], 'status' => 500]);
        }
        return response()->json(['message' => 'Reagent inventory created', 'data' => $reagentInventory, 'status' => 201]);
    }

    public function show($id): JsonResponse
    {
        $reagentInventory = ReagentInventory::with('reagent')->find($id);
        if (empty($reagentInventory)) {
            return response()->json(['message' => 'Reagent inventory not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Reagent inventory found', 'data' => $reagentInventory, 'status' => 200]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $reagentInventory = ReagentInventory::find($id);
        if (empty($reagentInventory)) {
            return response()->json(['message' => 'Reagent inventory not found', 'data' => [], 'status' => 404]);
        }

        $reagentInventory->fill($request->all());

        if (!$reagentInventory->save()) {
            return response()->json(['message' => 'Reagent inventory not updated', 'data' => $reagentInventory, 'status' => 500]);
        }
        return response()->json(['message' => 'Reagent inventory updated', 'data' => $reagentInventory, 'status' => 200]);

    }

    public function destroy($id): JsonResponse
    {
        $reagentInventory = ReagentInventory::find($id);
        if (empty($reagentInventory)) {
            return response()->json(['message' => 'Reagent inventory not found', 'data' => [], 'status' => 404]);
        }
        if (!$reagentInventory->delete()) {
            return response()->json(['message' => 'Reagent inventory not deleted', 'data' => $reagentInventory, 'status' => 500]);
        }
        return response()->json(['message' => 'Reagent inventory deleted', 'data' => $reagentInventory, 'status' => 200]);
    }

}
