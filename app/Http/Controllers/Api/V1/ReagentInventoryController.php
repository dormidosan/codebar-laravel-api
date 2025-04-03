<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\BarcodeTypes;
use App\Http\Controllers\Controller;
use App\Models\BarcodeType;
use App\Models\ReagentInventory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\Exceptions\UnknownTypeException;

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
        }
        else {
            if ($request->has('barcode_type_name')) {
                try {
                    $barcodeTypeId = BarcodeType::firstOrCreate(['name' => $request->get('barcode_type_name')])->id;
                } catch (Exception $e) {
                    //TODO: Log error
                }
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
        if (empty($reagentInventory->image)) {
            try {
                $generator = new BarcodeGeneratorPNG();
                $barcode = $generator->getBarcode($reagentInventory->barcode, $generator::TYPE_CODE_128, 1, 60, [0, 1, 0]);
                $fileName = 'barcodes/'.$reagentInventory->barcode.'.png';
                Storage::disk('public')->put($fileName, $barcode);
                $reagentInventory->image = Storage::url($fileName);
                $reagentInventory->save();
            } catch (UnknownTypeException $e) {
                Log::error('Barcode generation failed: '.$e->getMessage());
                return response()->json(['message' => 'Reagent inventory found', 'data' => $reagentInventory, 'status' => 200, 'generated' => false]);
            }
            return response()->json(['message' => 'Reagent inventory found', 'data' => $reagentInventory, 'status' => 200, 'generated' => true]);
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

    // check if barcode is unique
    public function checkBarcode(Request $request): JsonResponse
    {
        $barcode = $request->get('barcode');
        $barcodeTypeId = BarcodeTypes::CODE128;
        if ($request->has('barcode_type_id')) {
            $barcodeTypeId = $request->get('barcode_type_id');
        }
        if ($request->has('barcode_type_name')) {
            $barcodeTypeId = BarcodeType::where('name', $request->get('barcode_type_name'))
                ->first()
                ->id;
        }
        $reagentInventory = ReagentInventory::where('barcode', $barcode)
            ->where('barcode_type_id', $barcodeTypeId)
            ->first();
        if (empty($reagentInventory)) {
            return response()->json(['message' => 'Barcode is unique', 'data' => [], 'status' => 200]);
        }
        return response()->json(['message' => 'Barcode found', 'data' => $reagentInventory, 'status' => 200]);
    }

}

