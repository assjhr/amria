<x-layouts::auth :title="__('Register')">
    <div class="flex flex-col gap-8">

        <div class="text-center">
            <a
                href="{{ route('home') }}"
                class="inline-block text-3xl font-light tracking-[0.5em]"
            >
                AMRIA
            </a>

            <p class="mt-8 text-xs uppercase tracking-[0.3em] text-black/45">
                Word lid van Amria
            </p>

            <h1 class="mt-4 text-3xl font-light">
                Account aanmaken
            </h1>

            <p class="mt-3 text-sm font-light leading-7 text-black/55">
                Maak een account aan om je eigen profiel te beheren.
            </p>
        </div>

        <x-auth-session-status
            class="text-center"
            :status="session('status')"
        />

        <form
            method="POST"
            action="{{ route('register.store') }}"
            class="flex flex-col gap-7"
        >
            @csrf

            <flux:input
                name="name"
                label="Naam"
                :value="old('name')"
                type="text"
                required
                autofocus
                autocomplete="name"
                placeholder="Volledige naam"
            />

            <flux:input
                name="email"
                label="E-mailadres"
                :value="old('email')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
            />

            <flux:input
                name="password"
                label="Wachtwoord"
                type="password"
                required
                autocomplete="new-password"
                placeholder="Wachtwoord"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <flux:input
                name="password_confirmation"
                label="Wachtwoord bevestigen"
                type="password"
                required
                autocomplete="new-password"
                placeholder="Bevestig wachtwoord"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <flux:button
                type="submit"
                variant="primary"
                class="w-full"
                data-test="register-user-button"
            >
                Account aanmaken
            </flux:button>
        </form>

        <div class="border-t border-black/15 pt-7 text-center">
            <p class="text-sm font-light text-black/55">
                Heb je al een account?
            </p>

            <flux:link
                :href="route('login')"
                wire:navigate
                class="mt-2 inline-block text-xs uppercase tracking-[0.2em]"
            >
                Inloggen →
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