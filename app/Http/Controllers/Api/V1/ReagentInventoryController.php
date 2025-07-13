<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ReagentInventory;
use App\Services\BarcodeService;
use App\Services\ReagentInventoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReagentInventoryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = ReagentInventory::query()
            ->with('user');

        if ($request->filled("reagent_id")) {
            $query->where('reagent_id', $request->get('reagent_id'));
        }
        else {
            $query->with('reagent');
        }

        $reagentInventories = $query
            ->latest()
            ->take(50)
            ->get();

        if ($reagentInventories->isEmpty()) {
            return response()->json(['message' => 'Reagent inventories not found', 'data' => []]);
        }
        return response()->json(['message' => 'Reagent inventories found', 'data' => $reagentInventories]);
    }

    public function store(Request $request, ReagentInventoryService $inventoryService): JsonResponse
    {
        $userId = $request->user('sanctum')
            ? $request->user('sanctum')->id
            : 1;

        $result = $inventoryService->create($request->all(), $userId);

        if (isset($result['error'])) {
            return response()->json(['message' => $result['error'], 'data' => $result['data']], $result['status']);
        }

        return response()->json(['message' => 'Reagent inventory created', 'data' => $result['data']], 201);
    }

    public function show($id, BarcodeService $barcodeService): JsonResponse
    {
        $reagentInventory = ReagentInventory::with('reagent')->find($id);
        if (empty($reagentInventory)) {
            return response()->json(['message' => 'Reagent inventory not found', 'data' => []], 404);
        }
        if (empty($reagentInventory->image)) {
            $imageUrl = $barcodeService->generateBarcode($reagentInventory->barcode, $barcodeName ?? 'C128', $reagentInventory->lot ?? "",
                $reagentInventory->expiration_date,
                $reagentInventory->reagent->name ?? null);

            if ($imageUrl) {
                $reagentInventory->image = $imageUrl;
                $reagentInventory->save();
                return response()->json(['message' => 'Reagent inventory found', 'data' => $reagentInventory, 'generated' => true]);
            }
            return response()->json(['message' => 'Reagent inventory found', 'data' => $reagentInventory, 'generated' => false]);
        }
        return response()->json(['message' => 'Reagent inventory found', 'data' => $reagentInventory]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $reagentInventory = ReagentInventory::find($id);
        if (empty($reagentInventory)) {
            return response()->json(['message' => 'Reagent inventory not found', 'data' => []], 404);
        }

        $reagentInventory->fill($request->all());

        if (!$reagentInventory->save()) {
            return response()->json(['message' => 'Reagent inventory not updated', 'data' => $reagentInventory], 500);
        }
        return response()->json(['message' => 'Reagent inventory updated', 'data' => $reagentInventory]);

    }

    public function destroy($id): JsonResponse
    {
        $reagentInventory = ReagentInventory::find($id);
        if (empty($reagentInventory)) {
            return response()->json(['message' => 'Reagent inventory not found', 'data' => []], 404);
        }
        if (!$reagentInventory->delete()) {
            return response()->json(['message' => 'Reagent inventory not deleted', 'data' => $reagentInventory], 500);
        }
        return response()->json(['message' => 'Reagent inventory deleted', 'data' => $reagentInventory]);
    }

    public function generateMissingImage(BarcodeService $barcodeService): JsonResponse
    {
        $reagentInventories = ReagentInventory::with('reagent')->get();
        if ($reagentInventories->isEmpty()) {
            return response()->json(['message' => 'No reagent inventories found without image', 'data' => []], 400);
        }
        /** @var ReagentInventory $reagentInventory */
        foreach ($reagentInventories as $reagentInventory) {
            $imageURL = $barcodeService->generateBarcode($reagentInventory->barcode, 'C128', $reagentInventory->lot ?? "", $reagentInventory->expiration_date,
                $reagentInventory->reagent->name ?? null);
            if ($imageURL) {
                $reagentInventory->image = $imageURL;
                $reagentInventory->save();
            }
        }

        return response()->json(['message' => 'Images re-generated', 'data' => $reagentInventories]);
    }

}

