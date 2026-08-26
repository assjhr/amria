@extends('layouts.public')

@section('title', 'Nieuwe gebruiker | Amria')

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-20 md:py-28">
        <p class="text-xs uppercase tracking-[0.3em] text-black/45">
            Admin / Gebruikers
        </p>

        <h1 class="mt-5 text-5xl font-light md:text-6xl">
            Nieuwe gebruiker
        </h1>

        <p class="mt-5 max-w-xl font-light leading-8 text-black/60">
            Maak een nieuw account aan en bepaal eventueel meteen de adminrechten.
        </p>

        @if ($errors->any())
            <div class="mt-10 border border-black/20 p-5">
                <p class="text-xs uppercase tracking-[0.22em]">
                    Controleer de volgende fouten
                </p>

                <ul class="mt-4 space-y-2 text-sm font-light">
                    @foreach ($errors->all() as $error)
                        <li>— {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('admin.users.store') }}"
            method="POST"
            class="mt-14 space-y-10"
        >
            @csrf

            <div>
                <label
                    for="name"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Naam
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <div>
                <label
                    for="email"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    E-mail
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <div>
                <label
                    for="password"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Wachtwoord
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <div>
                <label
                    for="password_confirmation"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Wachtwoord bevestigen
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <label class="flex cursor-pointer items-center gap-4">
                <input
                    type="checkbox"
                    name="is_admin"
                    value="1"
                    @checked(old('is_admin'))
                    class="h-4 w-4 border-black bg-transparent text-black focus:ring-black"
                >

                <span class="text-sm font-light">
                    Deze gebruiker adminrechten geven
                </span>
            </label>

            <div class="flex flex-wrap gap-4 pt-4">
                <button
                    type="submit"
                    class="border border-black bg-black px-7 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
                >
                    Gebruiker aanmaken
                </button>

                <a
                    href="{{ route('admin.users.index') }}"
                    class="border border-black px-7 py-4 text-xs uppercase tracking-[0.22em] transition hover:bg-black hover:text-[#fff9df]"
                >
                    Annuleren
                </a>
            </div>
        </form>
    </section>
@endsection