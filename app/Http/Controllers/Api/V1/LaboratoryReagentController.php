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
        if ($request->filled("laboratory_id")) {
            $query->where('laboratory_id', $request->get('laboratory_id'));
        }
        if ($request->filled("reagent_inventory_id")) {
            $query->where('reagent_inventory_id', $request->get('reagent_inventory_id'));
        }
        if ($request->filled("user_id")) {
            $query->where('user_id', $request->get('user_id'));
        }

        $laboratoryReagents = $query->with('reagentInventory', 'user', 'reagentInventory.reagent')->get();
        if ($laboratoryReagents->isEmpty()) {
            return response()->json(['message' => 'Laboratory reagents not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Laboratory reagents found', 'data' => $laboratoryReagents, 'status' => 200]);
    }

    public function store(Request $request): JsonResponse
    {
        $laboratoryReagent = new LaboratoryReagent();
        $laboratoryReagent->fill($request->all());
        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not created', 'data' => [], 'status' => 500]);
        }
        return response()->json(['message' => 'Laboratory reagent created', 'data' => $laboratoryReagent, 'status' => 201]);

    }

    public function show($id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::find($id);
        if (empty($laboratoryReagent)) {
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Laboratory reagent found', 'data' => $laboratoryReagent, 'status' => 200]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::find($id);
        if (empty($laboratoryReagent)) {
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => [], 'status' => 404]);
        }

        $laboratoryReagent->fill($request->all());

        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not updated', 'data' => $laboratoryReagent, 'status' => 500]);
        }
        return response()->json(['message' => 'Laboratory reagent updated', 'data' => $laboratoryReagent, 'status' => 200]);

    }

    public function destroy($id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::find($id);
        if (empty($laboratoryReagent)) {
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => [], 'status' => 404]);
        }
        if (!$laboratoryReagent->delete()) {
            return response()->json(['message' => 'Laboratory reagent not deleted', 'data' => $laboratoryReagent, 'status' => 500]);
        }
        return response()->json(['message' => 'Laboratory reagent deleted', 'data' => $laboratoryReagent, 'status' => 200]);
    }

    public function assign(Request $request): JsonResponse
    {
        $laboratoryReagent = new LaboratoryReagent();
        $reagentId = $request->get('reagent_id');
        $laboratoryId = $request->get('laboratory_id');

        if (empty($reagentId) || empty($laboratoryId)) {
            return response()->json(['message' => 'Reagent ID and Laboratory ID are required', 'data' => [], 'status' => 400]);
        }

        $reagentInventory = ReagentInventory::where('reagent_id', $reagentId)
            ->whereDoesntHave('laboratoryReagents', function ($query) use ($laboratoryId) {
                $query->where('laboratory_id', $laboratoryId);
            })->orderBy('expiration_date')->first();

        if (empty($reagentInventory)) {
            return response()->json(['message' => 'No free reagent found', 'data' => [], 'status' => 404]);
        }

        // TODO: Remove the sanctum user_id hardcoded
        $userId = $request->user('sanctum') ? $request->user('sanctum')->id : 1;

        $laboratoryReagent->fill($request->all());
        $laboratoryReagent->user_id = $userId;
        $laboratoryReagent->reagent_inventory_id = $reagentInventory->id;
        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not assigned', 'data' => [], 'status' => 500]);
        }
        return response()->json(['message' => 'Laboratory reagent assigned', 'data' => $laboratoryReagent, 'status' => 201]);
    }
}
