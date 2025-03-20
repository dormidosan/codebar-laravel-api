<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\LaboratoryReagent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LaboratoryReagentController extends Controller
{
    public function index(): JsonResponse
    {
        $laboratoryReagents = LaboratoryReagent::with('laboratory', 'reagentInventory', 'user')->get();
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
}
