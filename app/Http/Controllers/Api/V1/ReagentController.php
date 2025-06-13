<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Reagent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReagentController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Reagent::with('reagentType')
            ->where('active', true)
            ->orderBy('position');

        if ($request->get('counting')) {
            $query->withCount('reagentInventory');
        }

        $reagents = $query->get();

        if ($reagents->isEmpty()) {
            return response()->json(['message' => 'Reagents not found', 'data' => []], 400);
        }
        return response()->json(['message' => 'Success', 'data' => $reagents]);
    }

    public function store(Request $request): JsonResponse
    {
        $reagent = new Reagent();
        $reagent->fill($request->all());
        if (!$reagent->save()) {
            return response()->json(['message' => 'Reagent not created', 'data' => []], 500);
        }
        return response()->json(['message' => 'Reagent created', 'data' => $reagent], 201);
    }

    public function show($id): JsonResponse
    {
        $reagent = Reagent::find($id);
        if (empty($reagent)) {
            return response()->json(['message' => 'Reagent not found', 'data' => []], 400);

        }
        return response()->json(['message' => 'Success', 'data' => $reagent]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $reagent = Reagent::find($id);
        if (empty($reagent)) {
            return response()->json(['message' => 'Reagent not found', 'data' => []], 400);
        }

        $reagent->fill($request->all());

        if (!$reagent->save()) {
            return response()->json(['message' => 'Reagent not updated', 'data' => $reagent], 500);
        }
        return response()->json(['message' => 'Reagent updated', 'data' => $reagent]);
    }

    public function destroy($id): JsonResponse
    {
        $reagent = Reagent::find($id);
        if (!$reagent) {
            return response()->json(['message' => 'Reagent not found', 'data' => []], 400);
        }
        if (!$reagent->delete()) {
            return response()->json(['message' => 'Reagent not deleted', 'data' => $reagent], 500);
        }
        return response()->json(['message' => 'Reagent deleted', 'data' => $reagent]);
    }
}
