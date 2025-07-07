<?php

namespace App\Services;

use App\Enums\BarcodeTypes;
use App\Models\BarcodeType;
use App\Models\ReagentInventory;
use Exception;

class ReagentInventoryService
{
    private BarcodeService $barcodeService;

    public function __construct(BarcodeService $barcodeService)
    {
        $this->barcodeService = $barcodeService;
    }

    public function create(array $data, int $userId = 1): array
    {
        $barcodeTypeId = BarcodeTypes::CODE128;
        $barcodeName = 'C128';

        if (isset($data['barcode_type_id'])) {
            $barcodeTypeId = $data['barcode_type_id'];
        }
        if (isset($data['barcode_type_name'])) {
            try {
                $barcodeTypeId = BarcodeType::firstOrCreate(['name' => $data['barcode_type_name']])->id;
                $barcodeName = BarcodeTypes::expoToLaravel($data['barcode_type_name']);
            } catch (Exception $e) {
            }
        }

        $existingInventory = ReagentInventory::query()
            ->with("reagent")
            ->where('barcode', $data['barcode'])
            ->first();

        if ($existingInventory) {
            return ['error' => 'Código de barras ya existe', 'data' => $existingInventory, 'status' => 409];
        }

        $reagentInventory = new ReagentInventory();
        $reagentInventory->fill($data);
        $reagentInventory->barcode_type_id = $barcodeTypeId;
        $reagentInventory->user_id = $userId;

        $expiration = $reagentInventory->expiration_date;
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        if (!empty($expiration) && strtotime($expiration) < strtotime($tomorrow)) {
            return ['error' => 'Fecha de expiración debe ser mayor a hoy', 'data' => [], 'status' => 400];
        }

        $imageURL = $this->barcodeService->generateBarcode(
            $reagentInventory->barcode,
            $barcodeName,
            $reagentInventory->lot ?? "",
            $expiration,
            $reagentInventory->reagent->name ?? null
        );
        if ($imageURL) {
            $reagentInventory->image = $imageURL;
        }

        if (!$reagentInventory->save()) {
            return ['error' => 'Reagent inventory not created', 'data' => [], 'status' => 500];
        }

        return ['data' => $reagentInventory, 'status' => 201];
    }
}