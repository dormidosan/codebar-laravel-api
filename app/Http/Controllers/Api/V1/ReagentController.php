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
        if ($request->get("counting")){
            $reagents = Reagent::with('reagentType')
                ->withCount('reagentInventory')
                ->get();
        } else {
            $reagents = Reagent::with('reagentType')->get();
        }

        if ($reagents->isEmpty()) {
            return response()->json(['message' => 'Reagents not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Success', 'data' => $reagents, 'status' => 200]);
    }

    public function store(Request $request): JsonResponse
    {
        $reagent = new Reagent();
        $reagent->fill($request->all());
        if (!$reagent->save()) {
            return response()->json(['message' => 'Reagent not created', 'data' => [], 'status' => 500]);
        }
        return response()->json(['message' => 'Reagent created', 'data' => $reagent, 'status' => 201]);
    }

    public function show($id): JsonResponse
    {
        $reagent = Reagent::find($id);
        if (empty($reagent)) {
            return response()->json(['message' => 'Reagent not found', 'data' => [], 'status' => 404]);

        }
        return response()->json(['message' => 'Success', 'data' => $reagent, 'status' => 200]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $reagent = Reagent::find($id);
        if (empty($reagent)) {
            return response()->json(['message' => 'Reagent not found', 'data' => [], 'status' => 404]);
        }

        $reagent->fill($request->all());

        if (!$reagent->save()) {
            return response()->json(['message' => 'Reagent not updated', 'data' => $reagent, 'status' => 500]);
        }
        return response()->json(['message' => 'Reagent updated', 'data' => $reagent, 'status' => 200]);
    }

    public function destroy($id): JsonResponse
    {
        $reagent = Reagent::find($id);
        if (!$reagent) {
            return response()->json(['message' => 'Reagent not found', 'data' => [], 'status' => 404]);
        }
        if (!$reagent->delete()) {
            return response()->json(['message' => 'Reagent not deleted', 'data' => $reagent, 'status' => 500]);
        }
        return response()->json(['message' => 'Reagent deleted', 'data' => $reagent, 'status' => 200]);
    }
}
