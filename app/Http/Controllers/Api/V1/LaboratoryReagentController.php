<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\LaboratoryReagent;
use App\Models\ReagentInventory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LaboratoryReagentController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = LaboratoryReagent::query();

        // Apply filters
        foreach (['laboratory_id', 'reagent_inventory_id', 'user_id'] as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->get($field));
            }
        }

        // Eager load relationships based on request
        if ($request->boolean('filters')) {
            $with = [];
            if ($request->boolean('with_user')) {
                $with[] = 'user';
            }
            if ($request->boolean('with_reagent_inventory')) {
                $with[] = 'reagentInventory';
                if ($request->boolean('with_reagent')) {
                    $with[] = 'reagentInventory.reagent';
                }
            }
            if (!empty($with)) {
                $query->with($with);
            }
        }
        else {
            $query->with('reagentInventory', 'user', 'reagentInventory.reagent');
        }

        $laboratoryReagents = $query
            ->orderBy('id', 'desc')
            ->get();
        if ($laboratoryReagents->isEmpty()) {
            return response()->json(['message' => 'Laboratory reagents not found', 'data' => []], 400);
        }
        return response()->json(['message' => 'Laboratory reagents found', 'data' => $laboratoryReagents]);
    }

    public function store(Request $request): JsonResponse
    {
        $laboratoryReagent = new LaboratoryReagent();
        $laboratoryReagent->fill($request->all());
        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not created', 'data' => []], 500);
        }
        return response()->json(['message' => 'Laboratory reagent created', 'data' => $laboratoryReagent], 201);

    }

    public function show($id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::find($id);
        if (empty($laboratoryReagent)) {
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => []], 400);
        }
        return response()->json(['message' => 'Laboratory reagent found', 'data' => $laboratoryReagent]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::find($id);
        if (empty($laboratoryReagent)) {
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => []], 400);
        }

        $laboratoryReagent->fill($request->all());

        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not updated', 'data' => $laboratoryReagent], 500);
        }
        return response()->json(['message' => 'Laboratory reagent updated', 'data' => $laboratoryReagent]);

    }

    public function destroy($id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::find($id);
        if (empty($laboratoryReagent)) {
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => []], 400);
        }
        if (!$laboratoryReagent->delete()) {
            return response()->json(['message' => 'Laboratory reagent not deleted', 'data' => $laboratoryReagent], 500);
        }
        return response()->json(['message' => 'Laboratory reagent deleted', 'data' => $laboratoryReagent]);
    }

    public function assign(Request $request): JsonResponse
    {
        $laboratoryReagent = new LaboratoryReagent();
        $reagentId = $request->get('reagent_id');
        $laboratoryId = $request->get('laboratory_id');

        if (empty($reagentId) || empty($laboratoryId)) {
            return response()->json(['message' => 'Reagent ID and Laboratory ID are required', 'data' => []], 400);
        }

        $reagentInventory = ReagentInventory::where('reagent_id', $reagentId)
            ->where('expiration_date', '>', now())
            ->whereDoesntHave('laboratoryReagents', function ($query) use ($laboratoryId) {
                $query->where('laboratory_id', $laboratoryId);
            })->orderBy('expiration_date')->first();

        if (empty($reagentInventory)) {
            return response()->json(['message' => 'No free reagent found', 'data' => []], 400);
        }

        // TODO: Remove the sanctum user_id hardcoded
        $userId = $request->user('sanctum') ? $request->user('sanctum')->id : 1;

        $laboratoryReagent->fill($request->all());
        $laboratoryReagent->user_id = $userId;
        $laboratoryReagent->reagent_inventory_id = $reagentInventory->id;
        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not assigned', 'data' => []], 500);
        }
        return response()->json(['message' => 'Laboratory reagent assigned', 'data' => $laboratoryReagent], 201);
    }
}
