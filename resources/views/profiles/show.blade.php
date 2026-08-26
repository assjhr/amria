@extends('layouts.public')

@section('title', 'Profiel | Amria')

@section('content')
    <section class="mx-auto max-w-6xl px-6 py-20 md:py-28">
        <div class="grid gap-14 md:grid-cols-[320px_1fr] md:items-start">

            <div>
                @if ($user->profile?->profile_photo)
                    <img
                        src="{{ asset('storage/' . $user->profile->profile_photo) }}"
                        alt="Profielfoto van {{ $user->profile->username ?? $user->name }}"
                        class="aspect-square w-full object-cover"
                    >
                @else
                    <div class="flex aspect-square w-full items-center justify-center border border-black/15">
                        <span class="text-xs uppercase tracking-[0.3em] text-black/35">
                            Geen foto
                        </span>
                    </div>
                @endif
            </div>

            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-black/45">
                    Amria profiel
                </p>

                <h1 class="mt-5 text-5xl font-light md:text-6xl">
                    {{ $user->profile?->username ?? $user->name }}
                </h1>

                @if ($user->profile?->birthday)
                    <p class="mt-6 text-sm font-light text-black/55">
                        Verjaardag:
                        {{ \Illuminate\Support\Carbon::parse($user->profile->birthday)->format('d.m.Y') }}
                    </p>
                @endif

                <div class="mt-10 border-t border-black/15 pt-8">
                    <p class="text-xs uppercase tracking-[0.25em] text-black/45">
                        Over mij
                    </p>

                    <p class="mt-5 max-w-2xl whitespace-pre-line text-base font-light leading-8 text-black/70">
                        {{ $user->profile?->bio ?? 'Deze gebruiker heeft nog geen bio toegevoegd.' }}
                    </p>
                </div>

                @auth
                    @if (auth()->id() === $user->id)
                        <div class="mt-10">
                            <a
                                href="{{ route('profiles.edit') }}"
                                class="inline-block border border-black px-6 py-3 text-xs uppercase tracking-[0.22em] transition hover:bg-black hover:text-[#fff9df]"
                            >
                                Profiel bewerken
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </section>
@endsection