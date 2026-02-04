<?php

namespace App\Http\Controllers;

use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SurveyResponseApiController extends Controller
{
    public function index(Request $request)
    {
        if (!Schema::hasTable('survey_responses')) {
            return response()->json([
                'success' => false,
                'message' => 'Database migrations hazija-run (survey_responses table haipo).',
            ], 503);
        }

        $validated = $request->validate([
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'age_group' => ['nullable', 'string', 'max:50'],
            'flow_level' => ['nullable', 'string', 'max:50'],
            'price_range' => ['nullable', 'string', 'max:50'],
            'days' => ['nullable', 'integer', 'min:1', 'max:3650'],
        ]);

        $perPage = (int) ($validated['per_page'] ?? 25);

        $query = SurveyResponse::query()->latest();

        if (!empty($validated['age_group'])) {
            $query->where('age_group', $validated['age_group']);
        }

        if (!empty($validated['flow_level'])) {
            $query->where('flow_level', $validated['flow_level']);
        }

        if (!empty($validated['price_range'])) {
            $query->where('price_range', $validated['price_range']);
        }

        if (!empty($validated['days'])) {
            $query->where('created_at', '>=', now()->subDays((int) $validated['days']));
        }

        $paginator = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $paginator->items(),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'last_page' => $paginator->lastPage(),
            ],
        ]);
    }

    public function show(SurveyResponse $surveyResponse)
    {
        if (!Schema::hasTable('survey_responses')) {
            return response()->json([
                'success' => false,
                'message' => 'Database migrations hazija-run (survey_responses table haipo).',
            ], 503);
        }

        return response()->json([
            'success' => true,
            'data' => $surveyResponse,
        ]);
    }
}
