<x-layouts::auth :title="__('Log in')">
    <div class="flex flex-col gap-8">

        <div class="text-center">
            <a
                href="{{ route('home') }}"
                class="inline-block text-3xl font-light tracking-[0.5em]"
            >
                AMRIA
            </a>

            <p class="mt-8 text-xs uppercase tracking-[0.3em] text-black/45">
                Welkom terug
            </p>

            <h1 class="mt-4 text-3xl font-light">
                Inloggen
            </h1>

            <p class="mt-3 text-sm font-light leading-7 text-black/55">
                Log in om je profiel en account te beheren.
            </p>
        </div>

        {{-- Session status --}}
        <x-auth-session-status
            class="text-center"
            :status="session('status')"
        />

        <x-passkey-verify />

        <form
            method="POST"
            action="{{ route('login.store') }}"
            class="flex flex-col gap-7"
        >
            @csrf

            <flux:input
                name="email"
                label="E-mailadres"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <div class="relative">
                <flux:input
                    name="password"
                    label="Wachtwoord"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="Wachtwoord"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link
                        class="absolute top-0 text-xs uppercase tracking-[0.12em] end-0"
                        :href="route('password.request')"
                        wire:navigate
                    >
                        Wachtwoord vergeten?
                    </flux:link>
                @endif
            </div>

            <flux:checkbox
                name="remember"
                label="Onthoud mij"
                :checked="old('remember')"
            />

            <flux:button
                variant="primary"
                type="submit"
                class="w-full"
                data-test="login-button"
            >
                Inloggen
            </flux:button>
        </form>

        <div class="border-t border-black/15 pt-7 text-center">
            <p class="text-sm font-light text-black/55">
                Nog geen account?
            </p>

            <flux:link
                :href="route('register')"
                wire:navigate
                class="mt-2 inline-block text-xs uppercase tracking-[0.2em]"
            >
                Account aanmaken →
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