<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Laboratory::query();
        $query->where(function ($q) use ($request) {
            if ($request->filled('name')) {
                $q->orWhere('name', 'like', '%'.$request->get('name').'%');
            }
            if ($request->filled('address')) {
                $q->orWhere('address', 'like', '%'.$request->get('address').'%');
            }
        });

        if ($request->has('type')) {
            $query->where('type', $request->get('type'));
        }

        $laboratories = $query->with('district')->get();

        if ($laboratories->isEmpty()) {
            return response()->json(['message' => 'Laboratories not found', 'data' => []]);
        }
        return response()->json(['message' => 'Laboratories found', 'data' => $laboratories, 'count' => count($laboratories)]);
    }

    public function store(Request $request): JsonResponse
    {
        $laboratory = new Laboratory();
        $laboratory->fill($request->all());
        if (!$laboratory->save()) {
            return response()->json(['message' => 'Laboratory not created', 'data' => []], 500);
        }
        return response()->json(['message' => 'Laboratory created', 'data' => $laboratory], 201);
    }

    public function show($id): JsonResponse
    {
        $laboratory = Laboratory::with('district')->find($id);
        if (empty($laboratory)) {
            return response()->json(['message' => 'Laboratory not found', 'data' => []], 404);
        }
        return response()->json(['message' => 'Laboratory found', 'data' => $laboratory]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $laboratory = Laboratory::find($id);
        if (empty($laboratory)) {
            return response()->json(['message' => 'Laboratory not found', 'data' => []], 404);
        }

        $laboratory->fill($request->all());

        if (!$laboratory->save()) {
            return response()->json(['message' => 'Laboratory not updated', 'data' => $laboratory], 500);
        }
        return response()->json(['message' => 'Laboratory updated', 'data' => $laboratory]);

    }

    public function destroy($id): JsonResponse
    {
        $laboratory = Laboratory::find($id);
        if (empty($laboratory)) {
            return response()->json(['message' => 'Laboratory not found', 'data' => []], 404);
        }
        if (!$laboratory->delete()) {
            return response()->json(['message' => 'Laboratory not deleted', 'data' => $laboratory], 500);
        }
        return response()->json(['message' => 'Laboratory deleted', 'data' => $laboratory]);
    }
}
