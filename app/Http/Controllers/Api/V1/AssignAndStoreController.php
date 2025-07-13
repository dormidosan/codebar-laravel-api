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

    /**
     * Assigns a reagent to a laboratory and stores it in the inventory. (NOT USED)
     *
     * @param Request $request
     * @param ReagentInventoryService $inventoryService
     * @param LaboratoryReagentService $labService
     * @return JsonResponse
     */
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

        if ($existingInventory) {
            $exists = LaboratoryReagent::where('laboratory_id', $request->input('laboratory_id'))
                ->where('reagent_inventory_id', $existingInventory->id)
                ->exists();

            if ($exists) {
                return response()->json(['message' => 'El reactivo ya está asignado a este laboratorio.', 'data' => []], 409);
            }
        }

        if (empty($existingInventory)) {
            $inventoryResult = $inventoryService->create($assignData, $userId);

            if (isset($inventoryResult['error'])) {
                return response()->json(['message' => $inventoryResult['error'], 'data' => $inventoryResult['data']], $inventoryResult['status']);
            }

            if (empty($inventoryResult['data'])) {
                return response()->json(['message' => 'El reactivo no pudo ser almacenado', 'data' => []], 500);
            }

            /** @var ReagentInventory $existingInventory */
            $existingInventory = $inventoryResult['data'];
        }

        $laboratoryReagent = new LaboratoryReagent();
        $laboratoryReagent->fill($assignData);
        $laboratoryReagent->user_id = $userId;
        $laboratoryReagent->reagent_inventory_id = $existingInventory->id;

        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not assigned', 'data' => []], 500);
        }

        return response()->json([
            'message' => 'Reactivo asignado y almacenado correctamente',
            'data' => [
                'inventory' => $existingInventory,
                'laboratory_reagent' => $laboratoryReagent,
            ]
        ], 201);
    }
}