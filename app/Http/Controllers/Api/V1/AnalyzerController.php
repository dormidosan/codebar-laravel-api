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
            return response()->json(['message' => 'Analyzers not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Analyzers found', 'data' => $analyzers, 'status' => 200]);

    }

    public function store(Request $request): JsonResponse
    {
        $analyzer = new Analyzer();
        $analyzer->fill($request->all());
        if (!$analyzer->save()) {
            return response()->json(['message' => 'Analyzer not created', 'data' => [], 'status' => 500]);
        }
        return response()->json(['message' => 'Analyzer created', 'data' => $analyzer, 'status' => 201]);

    }

    public function show($id): JsonResponse
    {
        $analyzer = Analyzer::find($id);
        if (empty($analyzer)) {
            return response()->json(['message' => 'Analyzer not found', 'data' => [], 'status' => 404]);
        }
        return response()->json(['message' => 'Analyzer found', 'data' => $analyzer, 'status' => 200]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $analyzer = Analyzer::find($id);
        if (empty($analyzer)) {
            return response()->json(['message' => 'Analyzer not found', 'data' => [], 'status' => 404]);
        }

        $analyzer->fill($request->all());

        if (!$analyzer->save()) {
            return response()->json(['message' => 'Analyzer not updated', 'data' => $analyzer, 'status' => 500]);
        }
        return response()->json(['message' => 'Analyzer updated', 'data' => $analyzer, 'status' => 200]);
    }

    public function destroy($id): JsonResponse
    {
        $analyzer = Analyzer::find($id);
        if (empty($analyzer)) {
            return response()->json(['message' => 'Analyzer not found', 'data' => [], 'status' => 404]);
        }
        if (!$analyzer->delete()) {
            return response()->json(['message' => 'Analyzer not deleted', 'data' => $analyzer, 'status' => 500]);
        }
        return response()->json(['message' => 'Analyzer deleted', 'data' => $analyzer, 'status' => 200]);
    }
}
