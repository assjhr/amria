@extends('layouts.public')

@section('title', 'Admin | Amria')

@section('content')
    <section class="mx-auto max-w-7xl px-6 py-20 md:py-28">
        <div class="flex flex-col gap-8 border-b border-black/15 pb-12 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-black/45">
                    Beheeromgeving
                </p>

                <h1 class="mt-5 text-5xl font-light md:text-6xl">
                    Admin dashboard
                </h1>

                <p class="mt-5 max-w-xl font-light leading-8 text-black/60">
                    Beheer gebruikers, nieuws en FAQ-inhoud van Amria.
                </p>
            </div>

            <a
                href="{{ route('home') }}"
                class="text-xs uppercase tracking-[0.22em] underline underline-offset-4"
            >
                Naar website →
            </a>
        </div>

        <div class="grid gap-px bg-black/15 mt-14 md:grid-cols-2">
            <a
                href="{{ route('admin.users.index') }}"
                class="group bg-[#fff9df] p-8 transition hover:bg-black hover:text-[#fff9df]"
            >
                <p class="text-xs uppercase tracking-[0.25em] opacity-50">
                    01
                </p>

                <h2 class="mt-10 text-3xl font-light">
                    Gebruikers
                </h2>

                <p class="mt-4 max-w-sm font-light leading-7 opacity-60">
                    Bekijk gebruikers, maak accounts aan en beheer adminrechten.
                </p>

                <p class="mt-12 text-xs uppercase tracking-[0.22em]">
                    Open beheer →
                </p>
            </a>

            <a
                href="{{ route('admin.news.index') }}"
                class="group bg-[#fff9df] p-8 transition hover:bg-black hover:text-[#fff9df]"
            >
                <p class="text-xs uppercase tracking-[0.25em] opacity-50">
                    02
                </p>

                <h2 class="mt-10 text-3xl font-light">
                    Nieuws
                </h2>

                <p class="mt-4 max-w-sm font-light leading-7 opacity-60">
                    Voeg nieuws toe, pas berichten aan en verwijder content.
                </p>

                <p class="mt-12 text-xs uppercase tracking-[0.22em]">
                    Open beheer →
                </p>
            </a>

            <a
                href="{{ route('admin.faq-categories.index') }}"
                class="group bg-[#fff9df] p-8 transition hover:bg-black hover:text-[#fff9df]"
            >
                <p class="text-xs uppercase tracking-[0.25em] opacity-50">
                    03
                </p>

                <h2 class="mt-10 text-3xl font-light">
                    FAQ-categorieën
                </h2>

                <p class="mt-4 max-w-sm font-light leading-7 opacity-60">
                    Organiseer vragen in duidelijke categorieën.
                </p>

                <p class="mt-12 text-xs uppercase tracking-[0.22em]">
                    Open beheer →
                </p>
            </a>

            <a
                href="{{ route('admin.faqs.index') }}"
                class="group bg-[#fff9df] p-8 transition hover:bg-black hover:text-[#fff9df]"
            >
                <p class="text-xs uppercase tracking-[0.25em] opacity-50">
                    04
                </p>

                <h2 class="mt-10 text-3xl font-light">
                    FAQ-vragen
                </h2>

                <p class="mt-4 max-w-sm font-light leading-7 opacity-60">
                    Voeg vragen en antwoorden toe en pas bestaande FAQ's aan.
                </p>

                <p class="mt-12 text-xs uppercase tracking-[0.22em]">
                    Open beheer →
                </p>
            </a>
        </div>
    </section>
@endsection