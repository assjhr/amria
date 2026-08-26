@extends('layouts.public')

@section('title', 'FAQ-beheer | Amria')

@section('content')
    <section class="mx-auto max-w-7xl px-6 py-20 md:py-28">
        <div class="flex flex-col gap-8 border-b border-black/15 pb-12 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-black/45">
                    Admin / FAQ
                </p>

                <h1 class="mt-5 text-5xl font-light md:text-6xl">
                    FAQ-beheer
                </h1>

                <p class="mt-5 max-w-xl font-light leading-8 text-black/60">
                    Beheer alle veelgestelde vragen en koppel ze aan de juiste categorie.
                </p>
            </div>

            <a
                href="{{ route('admin.faqs.create') }}"
                class="border border-black bg-black px-6 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
            >
                + Nieuwe FAQ
            </a>
        </div>

        @if (session('success'))
            <div class="mt-8 border border-black/20 px-5 py-4 text-sm font-light">
                {{ session('success') }}
            </div>
        @endif

        @if ($faqs->isEmpty())
            <div class="py-24 text-center">
                <p class="text-xs uppercase tracking-[0.3em] text-black/40">
                    FAQ
                </p>

                <p class="mt-6 text-2xl font-light">
                    Er zijn nog geen FAQ-vragen.
                </p>
            </div>
        @else
            <div class="mt-12 overflow-x-auto">
                <table class="w-full border-collapse text-left">
                    <thead>
                        <tr class="border-b border-black">
                            <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                                Categorie
                            </th>

                            <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                                Vraag
                            </th>

                            <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                                Antwoord
                            </th>

                            <th class="px-3 py-4 text-right text-xs font-normal uppercase tracking-[0.2em]">
                                Acties
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr class="border-b border-black/15 align-top">
                                <td class="px-3 py-6">
                                    <span class="border border-black/20 px-3 py-1 text-[10px] uppercase tracking-[0.18em]">
                                        {{ $faq->category->name }}
                                    </span>
                                </td>

                                <td class="max-w-xs px-3 py-6 font-light">
                                    {{ $faq->question }}
                                </td>

                                <td class="max-w-md px-3 py-6 font-light leading-7 text-black/60">
                                    {{ \Illuminate\Support\Str::limit($faq->answer, 140) }}
                                </td>

                                <td class="px-3 py-6">
                                    <div class="flex justify-end gap-5">
                                        <a
                                            href="{{ route('admin.faqs.edit', $faq) }}"
                                            class="text-xs uppercase tracking-[0.18em] underline underline-offset-4 transition hover:opacity-45"
                                        >
                                            Bewerken
                                        </a>

                                        <form
                                            action="{{ route('admin.faqs.destroy', $faq) }}"
                                            method="POST"
                                            onsubmit="return confirm('Weet je zeker dat je deze FAQ wilt verwijderen?');"
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