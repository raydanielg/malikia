<?php

namespace App\Http\Controllers;

use App\Models\MotherIntake;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MotherIntakeController extends Controller
{
    public function create(): View
    {
        return view('intake.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            // Ruhusu format yoyote ya simu (alama kama +, -, nafasi, mabano) na mpaka herufi 25
            'phone' => ['nullable', 'string', 'max:25'],

            // New form fields
            'journey_stage' => ['required', 'in:pregnant,postpartum,ttc'],
            'pregnancy_weeks' => ['nullable', 'integer', 'min:1', 'max:42'],
            'baby_weeks_old' => ['nullable', 'integer', 'min:0', 'max:52'],
            'hospital_planned' => ['nullable', 'string', 'max:255'],
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

        // Set default status values (in case columns don't exist yet)
        if (!isset($validated['status'])) {
            $validated['status'] = MotherIntake::STATUS_PENDING;
        }
        if (!isset($validated['priority'])) {
            $validated['priority'] = MotherIntake::PRIORITY_MEDIUM;
        }

        // Normalize booleans
        $validated['agree_comms'] = (bool) ($request->boolean('agree_comms'));
        $validated['disclaimer_ack'] = (bool) ($request->boolean('disclaimer_ack'));

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
            $validated['hospital_planned'] = null;
        }

        $intake = MotherIntake::create($validated);

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

        return redirect()->route('intake.thankyou');
    }

    public function thankyou(): View
    {
        return view('intake.thankyou');
    }
}
