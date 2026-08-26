@extends('layouts.public')

@section('title', 'Nieuwsbeheer | Amria')

@section('content')
    <section class="mx-auto max-w-7xl px-6 py-20 md:py-28">
        <div class="flex flex-col gap-8 border-b border-black/15 pb-12 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-black/45">
                    Admin / Nieuws
                </p>

                <h1 class="mt-5 text-5xl font-light md:text-6xl">
                    Nieuwsbeheer
                </h1>

                <p class="mt-5 max-w-xl font-light leading-8 text-black/60">
                    Beheer alle nieuwsberichten van Amria.
                </p>
            </div>

            <a
                href="{{ route('admin.news.create') }}"
                class="border border-black bg-black px-6 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
            >
                + Nieuw nieuwsitem
            </a>
        </div>

        @if (session('success'))
            <div class="mt-8 border border-black/20 px-5 py-4 text-sm font-light">
                {{ session('success') }}
            </div>
        @endif

        @if ($newsItems->isEmpty())
            <div class="py-24 text-center">
                <p class="text-xs uppercase tracking-[0.3em] text-black/40">
                    Nieuws
                </p>

                <p class="mt-6 text-2xl font-light">
                    Er zijn nog geen nieuwsitems.
                </p>
            </div>
        @else
            <div class="mt-12 overflow-x-auto">
                <table class="w-full border-collapse text-left">
                    <thead>
                        <tr class="border-b border-black">
                            <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                                Titel
                            </th>

                            <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                                Auteur
                            </th>

                            <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                                Publicatiedatum
                            </th>

                            <th class="px-3 py-4 text-right text-xs font-normal uppercase tracking-[0.2em]">
                                Acties
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($newsItems as $news)
                            <tr class="border-b border-black/15">
                                <td class="px-3 py-6 font-light">
                                    {{ $news->title }}
                                </td>

                                <td class="px-3 py-6 font-light text-black/60">
                                    {{ $news->user->name }}
                                </td>

                                <td class="px-3 py-6 text-sm font-light text-black/50">
                                    {{ $news->published_at?->format('d.m.Y H:i') }}
                                </td>

                                <td class="px-3 py-6">
                                    <div class="flex justify-end gap-5">
                                        <a
                                            href="{{ route('admin.news.edit', $news) }}"
                                            class="text-xs uppercase tracking-[0.18em] underline underline-offset-4 transition hover:opacity-45"
                                        >
                                            Bewerken
                                        </a>

                                        <form
                                            action="{{ route('admin.news.destroy', $news) }}"
                                            method="POST"
                                            onsubmit="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="text-xs uppercase tracking-[0.18em] underline underline-offset-4 transition hover:opacity-45"
                                            >
                                                Verwijderen
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-12">
            <a
                href="{{ route('admin.dashboard') }}"
                class="text-xs uppercase tracking-[0.22em] underline underline-offset-4"
            >
                ← Admin dashboard
            </a>
        </div>
    </section>
@endsection