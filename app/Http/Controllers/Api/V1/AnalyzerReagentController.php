<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AnalyzerReagent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnalyzerReagentController extends Controller
{
    public function index(): JsonResponse
    {
        $analyzerReagents = AnalyzerReagent::all();
        if ($analyzerReagents->isEmpty()) {
            return response()->json(['message' => 'Analyzer Reagents not found', 'data' => []]);
        }
        return response()->json(['message' => 'Analyzer Reagents found', 'data' => $analyzerReagents]);

    }

    public function store(Request $request): JsonResponse
    {
        $analyzerReagent = new AnalyzerReagent();
        $analyzerReagent->fill($request->all());
        if (!$analyzerReagent->save()) {
            return response()->json(['message' => 'Analyzer Reagent not created', 'data' => []], 500);
        }
        return response()->json(['message' => 'Analyzer Reagent created', 'data' => $analyzerReagent], 201);

    }

    public function show($id): JsonResponse
    {
        $analyzerReagent = AnalyzerReagent::find($id);
        if (empty($analyzerReagent)) {
            return response()->json(['message' => 'Analyzer Reagent not found', 'data' => []], 404);
        }
        return response()->json(['message' => 'Analyzer Reagent found', 'data' => $analyzerReagent]);

    }

    public function update(Request $request, $id): JsonResponse
    {
        $analyzerReagent = AnalyzerReagent::find($id);
        if (empty($analyzerReagent)) {
            return response()->json(['message' => 'Analyzer Reagent not found', 'data' => []], 404);
        }

        $analyzerReagent->fill($request->all());

        if (!$analyzerReagent->save()) {
            return response()->json(['message' => 'Analyzer Reagent not updated', 'data' => $analyzerReagent], 500);
        }
        return response()->json(['message' => 'Analyzer Reagent updated', 'data' => $analyzerReagent]);

    }

    public function destroy($id): JsonResponse
    {
        $analyzerReagent = AnalyzerReagent::find($id);
        if (empty($analyzerReagent)) {
            return response()->json(['message' => 'Analyzer Reagent not found', 'data' => []], 404);
        }
        if (!$analyzerReagent->delete()) {
            return response()->json(['message' => 'Analyzer Reagent not deleted', 'data' => $analyzerReagent], 500);
        }
        return response()->json(['message' => 'Analyzer Reagent deleted', 'data' => $analyzerReagent]);

    }
}
