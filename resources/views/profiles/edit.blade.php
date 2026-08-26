@extends('layouts.public')

@section('title', 'Profiel bewerken | Amria')

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-20 md:py-28">
        <p class="text-xs uppercase tracking-[0.3em] text-black/45">
            Mijn profiel
        </p>

        <h1 class="mt-5 text-5xl font-light md:text-6xl">
            Profiel bewerken
        </h1>

        <p class="mt-6 max-w-xl font-light leading-8 text-black/60">
            Pas je publieke profielgegevens aan.
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
            action="{{ route('profiles.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-14 space-y-10"
        >
            @csrf
            @method('PUT')

            <div>
                <label
                    for="username"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username', $user->profile?->username) }}"
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <div>
                <label
                    for="birthday"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Verjaardag
                </label>

                <input
                    type="date"
                    id="birthday"
                    name="birthday"
                    value="{{ old('birthday', $user->profile?->birthday) }}"
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <div>
                <label
                    for="profile_photo"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Profielfoto
                </label>

                @if ($user->profile?->profile_photo)
                    <div class="mt-5">
                        <img
                            src="{{ asset('storage/' . $user->profile->profile_photo) }}"
                            alt="Huidige profielfoto"
                            class="h-32 w-32 object-cover"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    id="profile_photo"
                    name="profile_photo"
                    accept="image/*"
                    class="mt-5 block text-sm font-light"
                >
            </div>

            <div>
                <label
                    for="bio"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Over mij
                </label>

                <textarea
                    id="bio"
                    name="bio"
                    rows="6"
                    class="mt-3 w-full resize-none border border-black/25 bg-transparent p-4 font-light leading-7 outline-none focus:border-black focus:ring-0"
                >{{ old('bio', $user->profile?->bio) }}</textarea>
            </div>

            <div class="flex flex-wrap gap-4 pt-4">
                <button
                    type="submit"
                    class="border border-black bg-black px-7 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
                >
                    Profiel opslaan
                </button>

                <a
                    href="{{ route('profiles.show', $user) }}"
                    class="border border-black px-7 py-4 text-xs uppercase tracking-[0.22em] transition hover:bg-black hover:text-[#fff9df]"
                >
                    Annuleren
                </a>
            </div>
        </form>
    </section>
@endsection