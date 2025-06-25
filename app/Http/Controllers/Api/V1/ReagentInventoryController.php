<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\BarcodeTypes;
use App\Http\Controllers\Controller;
use App\Models\BarcodeType;
use App\Models\ReagentInventory;
use App\Services\BarcodeService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function store(Request $request, BarcodeService $barcodeService): JsonResponse
    {

        $reagentInventory = new ReagentInventory();
        $barcodeTypeId = BarcodeTypes::CODE128;

        // TODO: Get barcode type id from request or create a new one
        if ($request->has('barcode_type_id')) {
            $barcodeTypeId = $request->get('barcode_type_id');
        }

        // Get id of a barcode type by name or create a new one
        if ($request->has('barcode_type_name')) {
            try {
                $barcodeTypeId = BarcodeType::firstOrCreate(['name' => $request->get('barcode_type_name')])->id;
                $barcodeName = BarcodeTypes::expoToLaravel($request->get('barcode_type_name'));
            } catch (Exception $e) {
                //TODO: Log error
            }
        }

        $existingInventory = ReagentInventory::query()
            ->with("reagent")
            ->where('barcode', $request->get('barcode'))
            ->first();

        if ($existingInventory) {
            return response()->json([
                'message' => ' Código de barras ya existe',
                'data' => $existingInventory
            ], 409);
        }

        $userId = $request->user('sanctum')
            ? $request->user('sanctum')->id
            : 1;

        $reagentInventory->fill($request->all());
        $reagentInventory->barcode_type_id = $barcodeTypeId;
        $reagentInventory->user_id = $userId;
        $expiration = $reagentInventory->expiration_date;

        // If there is expiration date, check that is not in the past
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        // Store in laravel.log the expiration date
        Log::info('Tomorrow date: '.$tomorrow);
        Log::info('Reagent inventory data: '.json_encode($reagentInventory->toArray()));
        if (!empty($expiration) && strtotime($expiration) < strtotime($tomorrow)) {
            return response()->json(['message' => 'Fecha de expiración debe ser mayor a hoy', 'data' => []], 400);
        }


        $imageURL = $barcodeService
            ->generateBarcode($reagentInventory->barcode,
                $barcodeName ?? 'C128',
                $reagentInventory->lot ?? "",
                $expiration,
                $reagentInventory->reagent->name ?? null);

        if ($imageURL) {
            $reagentInventory->image = $imageURL;
        }

        if (!$reagentInventory->save()) {
            return response()->json(['message' => 'Reagent inventory not created', 'data' => []], 500);
        }
        return response()->json(['message' => 'Reagent inventory created', 'data' => $reagentInventory], 201);
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

    public function checkBarcode(string $barcode): JsonResponse
    {
        $reagentInventory = ReagentInventory::with("reagent")->where('barcode', $barcode)->first();
        if (empty($reagentInventory)) {
            // This should be 404, but we want to allow creation of new reagent inventory
            return response()->json(['message' => 'Barcode is unique', 'data' => []]);
        }
        return response()->json(['message' => 'Barcode found', 'data' => $reagentInventory]);
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

