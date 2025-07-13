<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ReagentInventory;
use Illuminate\Http\JsonResponse;

class CheckBarcodeController extends Controller
{

    public function __invoke(string $barcode): JsonResponse
    {
        $reagentInventory = ReagentInventory::query()
            ->with('reagent')
            ->where('barcode', $barcode)
            ->first();

        if (empty($reagentInventory)) {
            return response()->json(['message' => 'Barcode not found', 'data' => []], 404);
        }
        return response()->json(['message' => 'Barcode found', 'data' => $reagentInventory]);
    }
}