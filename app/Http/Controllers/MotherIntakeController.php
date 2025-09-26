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
