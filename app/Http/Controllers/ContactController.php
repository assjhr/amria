<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function create(): View
    {
        return view('contact.create');
    }

    /**
     * Send the contact form to the admin.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Mail::to('admin@ehb.be')->send(
            new ContactFormMail(
                name: $validated['name'],
                email: $validated['email'],
                contactSubject: $validated['subject'],
                messageContent: $validated['message'],
            )
        );

        return redirect()
            ->route('contact.create')
            ->with('success', 'Je bericht werd succesvol verzonden.');
    }
}
