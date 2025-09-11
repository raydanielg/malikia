<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        try {
            $to = config('mail.from.address');
            if ($to) {
                \Mail::raw(
                    "Jina: {$data['name']}\nEmail: {$data['email']}\nMada: {$data['subject']}\n\nUjumbe:\n{$data['message']}",
                    function ($m) use ($to, $data) {
                        $m->to($to)->subject('[Malkia Konnect] Ujumbe mpya wa mawasiliano');
                    }
                );
            }
        } catch (\Throwable $e) {
            // optionally log
        }

        return back()->with('contact_ok', 'Asante kwa kutuwasiliana. Tutakujibu hivi karibuni.');
    }
}
