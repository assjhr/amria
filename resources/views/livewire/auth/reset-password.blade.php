<x-layouts::auth :title="__('Reset password')">
    <div class="flex flex-col gap-8">

        <div class="text-center">
            <a
                href="{{ route('home') }}"
                class="inline-block text-3xl font-light tracking-[0.5em]"
            >
                AMRIA
            </a>

            <p class="mt-8 text-xs uppercase tracking-[0.3em] text-black/45">
                Account herstellen
            </p>

            <h1 class="mt-4 text-3xl font-light">
                Nieuw wachtwoord
            </h1>

            <p class="mt-3 text-sm font-light leading-7 text-black/55">
                Kies hieronder een nieuw wachtwoord voor je account.
            </p>
        </div>

        {{-- Session status --}}
        <x-auth-session-status
            class="text-center"
            :status="session('status')"
        />

        <form
            method="POST"
            action="{{ route('password.update') }}"
            class="flex flex-col gap-7"
        >
            @csrf

            {{-- Reset token --}}
            <input
                type="hidden"
                name="token"
                value="{{ request()->route('token') }}"
            >

            <flux:input
                name="email"
                value="{{ request('email') }}"
                label="E-mailadres"
                type="email"
                required
                autocomplete="email"
            />

            <flux:input
                name="password"
                label="Nieuw wachtwoord"
                type="password"
                required
                autocomplete="new-password"
                placeholder="Nieuw wachtwoord"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <flux:input
                name="password_confirmation"
                label="Wachtwoord bevestigen"
                type="password"
                required
                autocomplete="new-password"
                placeholder="Bevestig je nieuwe wachtwoord"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <flux:button
                type="submit"
                variant="primary"
                class="w-full"
                data-test="reset-password-button"
            >
                Wachtwoord wijzigen
            </flux:button>
        </form>

        <div class="border-t border-black/15 pt-7 text-center">
            <p class="text-sm font-light text-black/55">
                Terug naar je account?
            </p>

            <flux:link
                :href="route('login')"
                wire:navigate
                class="mt-2 inline-block text-xs uppercase tracking-[0.2em]"
            >
                Naar inloggen →
            </flux:link>
        </div>

        <div class="text-center">
            <a
                href="{{ route('home') }}"
                class="text-xs uppercase tracking-[0.2em] text-black/45 transition hover:text-black"
            >
                ← Terug naar Amria
            </a>
        </div>

    </div>
</x-layouts::auth>