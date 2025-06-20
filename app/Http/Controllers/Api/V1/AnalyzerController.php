<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Analyzer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnalyzerController extends Controller
{
    public function index(): JsonResponse
    {
        $analyzers = Analyzer::all();
        if ($analyzers->isEmpty()) {
            return response()->json(['message' => 'Analyzers not found', 'data' => []]);
        }
        return response()->json(['message' => 'Analyzers found', 'data' => $analyzers]);

    }

    public function store(Request $request): JsonResponse
    {
        $analyzer = new Analyzer();
        $analyzer->fill($request->all());
        if (!$analyzer->save()) {
            return response()->json(['message' => 'Analyzer not created', 'data' => []], 500);
        }
        return response()->json(['message' => 'Analyzer created', 'data' => $analyzer], 201);

    }

    public function show($id): JsonResponse
    {
        $analyzer = Analyzer::find($id);
        if (empty($analyzer)) {
            return response()->json(['message' => 'Analyzer not found', 'data' => []], 404);
        }
        return response()->json(['message' => 'Analyzer found', 'data' => $analyzer]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $analyzer = Analyzer::find($id);
        if (empty($analyzer)) {
            return response()->json(['message' => 'Analyzer not found', 'data' => []], 404);
        }

        $analyzer->fill($request->all());

        if (!$analyzer->save()) {
            return response()->json(['message' => 'Analyzer not updated', 'data' => $analyzer], 500);
        }
        return response()->json(['message' => 'Analyzer updated', 'data' => $analyzer]);
    }

    public function destroy($id): JsonResponse
    {
        $analyzer = Analyzer::find($id);
        if (empty($analyzer)) {
            return response()->json(['message' => 'Analyzer not found', 'data' => []], 404);
        }
        if (!$analyzer->delete()) {
            return response()->json(['message' => 'Analyzer not deleted', 'data' => $analyzer], 500);
        }
        return response()->json(['message' => 'Analyzer deleted', 'data' => $analyzer]);
    }
}
