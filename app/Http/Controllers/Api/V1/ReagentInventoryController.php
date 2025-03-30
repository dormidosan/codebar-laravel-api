<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\BarcodeTypes;
use App\Http\Controllers\Controller;
use App\Models\BarcodeType;
use App\Models\ReagentInventory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;

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
        $barcodeTypeId = BarcodeTypes::CODE128;
        if ($request->has('barcode_type_id')) {
            $barcodeTypeId = $request->get('barcode_type_id');
        } else if ($request->has('barcode_type_name')) {
            try {
                $barcodeTypeId = BarcodeType::firstOrCreate(['name' => $request->get('barcode_type_name')])->id;
            } catch (Exception $e) {
                //TODO: Log error
            }
        }
        $reagentInventory->fill($request->all());
        $reagentInventory->barcode_type_id = $barcodeTypeId;
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
        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode($reagentInventory->barcode, $generator::TYPE_CODE_128,1,60, [0, 1, 0]);
        $barcodeBase64 = base64_encode($barcode);
        $reagentInventory->barcode = 'data:image/png;base64,' . $barcodeBase64;
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
