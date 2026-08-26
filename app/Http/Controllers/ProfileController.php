<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show a public user profile.
     */
    public function show(User $user): View
    {
        $user->load('profile');

        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing your own profile.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $user->load('profile');

        return view('profiles.edit', compact('user'));
    }

    /**
     * Update your own profile.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'username' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before_or_equal:today'],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ]);

        $profile = $user->profile()->firstOrCreate();

        if ($request->hasFile('profile_photo')) {
            if ($profile->profile_photo) {
                Storage::disk('public')->delete($profile->profile_photo);
            }

            $validated['profile_photo'] = $request
                ->file('profile_photo')
                ->store('profiles', 'public');
        }

        $profile->update($validated);

        return redirect()
            ->route('profiles.show', $user)
            ->with('success', 'Profiel succesvol aangepast.');
    }
}
