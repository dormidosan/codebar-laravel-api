<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\LaboratoryReagent;
use App\Services\LaboratoryReagentService;
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

        if ($request->boolean('with_eager_loading')) {
            $with = [];
            if ($request->boolean('with_user')) {
                $with[] = 'user';
            }
            if ($request->boolean('with_laboratory')) {
                $with[] = 'laboratory';
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
            return response()->json(['message' => 'Laboratory reagents not found', 'data' => []]);
        }
        return response()->json(['message' => 'Laboratory reagents found', 'data' => $laboratoryReagents]);
    }

    public function store(Request $request): JsonResponse
    {
        $laboratoryReagent = new LaboratoryReagent();
        $laboratoryReagent->fill($request->all());
        $userId = $request->user('sanctum')
            ? $request->user('sanctum')->id
            : 1;
        $laboratoryReagent->user_id = $userId;

        if (!$laboratoryReagent->save()) {
            return response()->json(['message' => 'Laboratory reagent not created', 'data' => []], 500);
        }
        return response()->json(['message' => 'Laboratory reagent created', 'data' => $laboratoryReagent], 201);

    }

    public function show($id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::find($id);
        if (empty($laboratoryReagent)) {
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => []], 404);
        }
        return response()->json(['message' => 'Laboratory reagent found', 'data' => $laboratoryReagent]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $laboratoryReagent = LaboratoryReagent::find($id);
        if (empty($laboratoryReagent)) {
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => []], 404);
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
            return response()->json(['message' => 'Laboratory reagent not found', 'data' => []], 404);
        }
        if (!$laboratoryReagent->delete()) {
            return response()->json(['message' => 'Laboratory reagent not deleted', 'data' => $laboratoryReagent], 500);
        }
        return response()->json(['message' => 'Laboratory reagent deleted', 'data' => $laboratoryReagent]);
    }

    public function assign(Request $request, LaboratoryReagentService $labService): JsonResponse
    {
        $userId = $request->user('sanctum')
            ? $request->user('sanctum')->id
            : 1;
        $result = $labService->assign($request->all(), $userId);

        if (isset($result['error'])) {
            return response()->json(['message' => $result['error'], 'data' => $result['data']], $result['status']);
        }

        return response()->json(['message' => 'Laboratory reagent assigned', 'data' => $result['data']], 201);
    }
}
