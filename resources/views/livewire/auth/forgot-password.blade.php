<x-layouts::auth :title="__('Forgot password')">
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
                Wachtwoord vergeten?
            </h1>

            <p class="mt-3 text-sm font-light leading-7 text-black/55">
                Vul je e-mailadres in. We sturen je een link waarmee je een nieuw wachtwoord kunt instellen.
            </p>
        </div>

        {{-- Session status --}}
        <x-auth-session-status
            class="text-center"
            :status="session('status')"
        />

        <form
            method="POST"
            action="{{ route('password.email') }}"
            class="flex flex-col gap-7"
        >
            @csrf

            <flux:input
                name="email"
                label="E-mailadres"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <flux:button
                variant="primary"
                type="submit"
                class="w-full"
                data-test="email-password-reset-link-button"
            >
                Resetlink versturen
            </flux:button>
        </form>

        <div class="border-t border-black/15 pt-7 text-center">
            <p class="text-sm font-light text-black/55">
                Wachtwoord toch nog gevonden?
            </p>

            <flux:link
                :href="route('login')"
                wire:navigate
                class="mt-2 inline-block text-xs uppercase tracking-[0.2em]"
            >
                Terug naar inloggen →
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