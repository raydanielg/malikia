<?php

namespace App\Http\Controllers;

use App\Models\MotherIntake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MotherIntakeApiController extends Controller
{
    public function index(Request $request)
    {
        if (!Schema::hasTable('mother_intakes')) {
            return response()->json([
                'success' => false,
                'message' => 'Database migrations hazija-run (mother_intakes table haipo).',
            ], 503);
        }

        $validated = $request->validate([
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'phone' => ['nullable', 'string', 'max:25'],
            'full_name' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:50'],
        ]);

        $perPage = (int) $request->query('per_page', 25);
        if ($perPage < 1) {
            $perPage = 1;
        }
        if ($perPage > 100) {
            $perPage = 100;
        }

        $query = MotherIntake::query()->latest();

        if (!empty($validated['phone'])) {
            $query->where('phone', (string) $request->string('phone'));
        }

        if (!empty($validated['full_name'])) {
            $query->where('full_name', 'like', '%' . (string) $request->string('full_name') . '%');
        }

        if (!empty($validated['status'])) {
            $query->where('status', (string) $request->string('status'));
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

    public function show(MotherIntake $motherIntake)
    {
        if (!Schema::hasTable('mother_intakes')) {
            return response()->json([
                'success' => false,
                'message' => 'Database migrations hazija-run (mother_intakes table haipo).',
            ], 503);
        }

        return response()->json([
            'success' => true,
            'data' => $motherIntake,
        ]);
    }
}
