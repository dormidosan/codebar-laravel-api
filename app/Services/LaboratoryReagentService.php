<?php
namespace App\Services;

use App\Models\LaboratoryReagent;
use App\Models\ReagentInventory;

class LaboratoryReagentService
{
    public function assign(array $data, int $userId): array
    {
        $reagentId = $data['reagent_id'] ?? null;
        $laboratoryId = $data['laboratory_id'] ?? null;

        if (empty($reagentId) || empty($laboratoryId)) {
            return ['error' => 'Reagent ID and Laboratory ID are required', 'data' => [], 'status' => 400];
        }

        $reagentInventory = ReagentInventory::where('reagent_id', $reagentId)
            ->where('expiration_date', '>', now())
            ->whereDoesntHave('laboratoryReagents', function ($query) use ($laboratoryId) {
                $query->where('laboratory_id', $laboratoryId);
            })->orderBy('expiration_date')->first();

        if (empty($reagentInventory)) {
            return ['error' => 'No free reagent found', 'data' => [], 'status' => 404];
        }

        $laboratoryReagent = new LaboratoryReagent();
        $laboratoryReagent->fill($data);
        $laboratoryReagent->user_id = $userId;
        $laboratoryReagent->reagent_inventory_id = $reagentInventory->id;

        if (!$laboratoryReagent->save()) {
            return ['error' => 'Laboratory reagent not assigned', 'data' => [], 'status' => 500];
        }

        return ['data' => $laboratoryReagent, 'status' => 201];
    }
}