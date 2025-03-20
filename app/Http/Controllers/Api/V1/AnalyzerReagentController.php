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
            return response()->json(['message' => 'Analyzer Reagents not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Analyzer Reagents found', 'data' => $analyzerReagents, 'status' => 200]);

    }

    public function store(Request $request): JsonResponse
    {
        $analyzerReagent = new AnalyzerReagent();
        $analyzerReagent->fill($request->all());
        if (!$analyzerReagent->save()) {
            return response()->json(['message' => 'Analyzer Reagent not created', 'data' => [], 'status' => 500]);
        }
        return response()->json(['message' => 'Analyzer Reagent created', 'data' => $analyzerReagent, 'status' => 201]);

    }

    public function show($id): JsonResponse
    {
        $analyzerReagent = AnalyzerReagent::find($id);
        if (empty($analyzerReagent)) {
            return response()->json(['message' => 'Analyzer Reagent not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Analyzer Reagent found', 'data' => $analyzerReagent, 'status' => 200]);

    }

    public function update(Request $request, $id): JsonResponse
    {
        $analyzerReagent = AnalyzerReagent::find($id);
        if (empty($analyzerReagent)) {
            return response()->json(['message' => 'Analyzer Reagent not found', 'data' => [], 'status' => 404]);
        }

        $analyzerReagent->fill($request->all());

        if (!$analyzerReagent->save()) {
            return response()->json(['message' => 'Analyzer Reagent not updated', 'data' => $analyzerReagent, 'status' => 500]);
        }
        return response()->json(['message' => 'Analyzer Reagent updated', 'data' => $analyzerReagent, 'status' => 200]);

    }

    public function destroy($id): JsonResponse
    {
        $analyzerReagent = AnalyzerReagent::find($id);
        if (empty($analyzerReagent)) {
            return response()->json(['message' => 'Analyzer Reagent not found', 'data' => [], 'status' => 404]);
        }
        if (!$analyzerReagent->delete()) {
            return response()->json(['message' => 'Analyzer Reagent not deleted', 'data' => $analyzerReagent, 'status' => 500]);
        }
        return response()->json(['message' => 'Analyzer Reagent deleted', 'data' => $analyzerReagent, 'status' => 200]);

    }
}
