<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'name' => ['nullable', 'string', 'max:255'],
        ]);

        Newsletter::firstOrCreate(['email' => $data['email']], ['name' => $data['name'] ?? null]);

        return back()->with('newsletter_ok', 'Asante! Tumekusajili kwenye orodha ya barua.');
    }
}
