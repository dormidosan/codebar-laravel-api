<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\LaboratoryReagent;
use App\Models\ReagentInventory;
use App\Services\LaboratoryReagentService;
use App\Services\ReagentInventoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssignAndStoreController extends Controller
{

    public function __invoke(Request $request, ReagentInventoryService $inventoryService, LaboratoryReagentService $labService): JsonResponse
    {
        if (!$request->filled('barcode')) {
            return response()->json(['message' => 'Barcode is required.', 'data' => []], 400);
        }
        $assignData = $request->all();
        $userId = $request->user('sanctum')
            ? $request->user('sanctum')->id
            : 1;

        $existingInventory = ReagentInventory::query()
            ->where('barcode', $assignData['barcode'])
            ->first();

        if (empty($existingInventory)) {
            $inventoryResult = $inventoryService->create($assignData, $userId);

            if (isset($inventoryResult['error'])) {
                return response()->json(['message' => $inventoryResult['error'], 'data' => $inventoryResult['data']], $inventoryResult['status']);
            }

            if (empty($inventoryResult['data'])) {
                return response()->json(['message' => 'Reagent inventory not created', 'data' => []], 500);
            }

            /** @-v-ar ReagentInventory $reagentInventory */
            $existingInventory = $inventoryResult['data'];
        }

        $laboratoryReagent = new LaboratoryReagent();
        $laboratoryReagent->fill($assignData);
        $laboratoryReagent->user_id = $userId;
        $laboratoryReagent->reagent_inventory_id = $existingInventory->id;

        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not assigned', 'data' => [], 'status' => 500]);
        }

        return response()->json([
            'message' => 'Laboratory reagent assigned successfully',
            'data' => [
                'inventory' => $existingInventory,
                'laboratory_reagent' => $laboratoryReagent,
            ]
        ], 201);
    }
}