<?php

namespace App\Http\Controllers;

use App\Models\MotherIntake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class MotherIntakeController extends Controller
{
    public function create(): View
    {
        return view('intake.create');
    }

    public function store(Request $request): Response
    {
        if (!Schema::hasTable('mother_intakes')) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Mfumo haujajiandaa bado. Tafadhali endesha database migrations (mother_intakes table haipo).',
                ], 503);
            }

            return redirect()->back()->with('error', 'Mfumo haujajiandaa bado. Tafadhali jaribu tena baadae.');
        }

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s\'\.\-]+$/'],
            // Ruhusu format yoyote ya simu (alama kama +, -, nafasi, mabano) na mpaka herufi 25
            'phone' => [
                'nullable',
                'string',
                'max:25',
                'regex:/^\+?\d{10,15}$/',
                'unique:mother_intakes,phone'
            ],

            // New form fields
            'journey_stage' => ['required', 'in:pregnant,postpartum,ttc'],
            'pregnancy_weeks' => ['nullable', 'integer', 'min:1', 'max:42'],
            'baby_weeks_old' => ['nullable', 'integer', 'min:0', 'max:52'],
            'hospital_planned' => ['nullable', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s\.,\'\-()&]*$/'],
            'delivery_hospital' => ['nullable', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s\.,\'\-()&]*$/'],
            // TTC duration field (how long trying to conceive)
            'ttc_duration' => ['nullable', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s\.,\']*$/', 'required_if:journey_stage,ttc'],
            'agree_comms' => ['nullable', 'boolean'],
            'disclaimer_ack' => ['nullable', 'boolean'],

            // Legacy/additional optional fields (kept for compatibility)
            'email' => ['nullable', 'email', 'max:255'],
            'age' => ['nullable', 'integer', 'min:12', 'max:60'],
            'pregnancy_stage' => ['nullable', 'string', 'max:50'],
            'due_date' => ['nullable', 'date'],
            'location' => ['nullable', 'string', 'max:255'],
            'previous_pregnancies' => ['nullable', 'integer', 'min:0', 'max:20'],
            'concerns' => ['nullable', 'string', 'max:5000'],
            'interests' => ['nullable', 'array'],
            'interests.*' => ['string'],
        ]);

        // Attach authenticated user
        if ($request->user()) {
            $validated['user_id'] = $request->user()->id;
        }

        // Set defaults only if these columns exist (some servers may not have migrated yet)
        if (Schema::hasColumn('mother_intakes', 'status') && !isset($validated['status'])) {
            $validated['status'] = MotherIntake::STATUS_PENDING;
        }
        if (Schema::hasColumn('mother_intakes', 'priority') && !isset($validated['priority'])) {
            $validated['priority'] = MotherIntake::PRIORITY_MEDIUM;
        }

        // Normalize booleans only if columns exist
        if (Schema::hasColumn('mother_intakes', 'agree_comms')) {
            $validated['agree_comms'] = (bool) ($request->boolean('agree_comms'));
        }
        if (Schema::hasColumn('mother_intakes', 'disclaimer_ack')) {
            $validated['disclaimer_ack'] = (bool) ($request->boolean('disclaimer_ack'));
        }

        // Clear stage-specific fields to avoid inconsistent data
        if (($validated['journey_stage'] ?? null) === 'pregnant') {
            // keep pregnancy_weeks and hospital_planned; nullify baby_weeks_old
            $validated['baby_weeks_old'] = $validated['baby_weeks_old'] ?? null;
        } elseif (($validated['journey_stage'] ?? null) === 'postpartum') {
            // keep baby_weeks_old; nullify pregnancy_weeks and hospital_planned (if not needed)
            $validated['pregnancy_weeks'] = null;
        } else { // ttc
            $validated['pregnancy_weeks'] = null;
            $validated['baby_weeks_old'] = null;
        }

        // If TTC, capture trying duration into notes (to avoid DB schema changes)
        if (($validated['journey_stage'] ?? null) === 'ttc') {
            $duration = $request->string('ttc_duration');
            if ($duration) {
                $prefix = isset($validated['notes']) && $validated['notes'] ? rtrim($validated['notes']) . "\n" : '';
                $validated['notes'] = $prefix . "Trying to conceive for: {$duration}.";
            }
        }

        try {
            // Guard against 500s when DB columns differ (e.g. production not migrated yet)
            $columns = Schema::getColumnListing('mother_intakes');
            $validated = array_intersect_key($validated, array_flip($columns));

            $intake = MotherIntake::create($validated);
        } catch (\Throwable $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Samahani, tatizo la kuhifadhi taarifa limetokea. Tafadhali jaribu tena.',
                ], 500);
            }

            return redirect()->back()->with('error', 'Samahani, tatizo la kuhifadhi taarifa limetokea. Tafadhali jaribu tena.');
        }

        // Notify admin
        try {
            $adminEmail = config('mail.from.address');
            if ($adminEmail) {
                \Mail::raw(
                    "Intake mpya kutoka {$intake->full_name}\nSimu: {$intake->phone}\nHatua: {$intake->pregnancy_stage}",
                    function ($m) use ($adminEmail) {
                        $m->to($adminEmail)->subject('Intake Mpya ya Mama');
                    }
                );
            }
        } catch (\Throwable $e) {
            // silent fail; logging optional
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
            ]);
        }

        return redirect()->route('intake.thankyou');
    }

    public function thankyou(): View
    {
        return view('intake.thankyou');
    }
}
