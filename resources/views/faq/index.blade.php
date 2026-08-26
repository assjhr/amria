@extends('layouts.public')

@section('title', 'FAQ | Amria')

@section('content')
    <section class="mx-auto max-w-7xl px-6 pb-16 pt-20 md:pt-28">
        <p class="text-xs uppercase tracking-[0.3em] text-black/50">
            Hulp & informatie
        </p>

        <h1 class="mt-5 text-5xl font-light tracking-tight md:text-7xl">
            Veelgestelde vragen
        </h1>

        <p class="mt-6 max-w-xl text-base font-light leading-8 text-black/60">
            Vind snel een antwoord op de meest gestelde vragen over Amria.
        </p>
    </section>

    <section class="border-t border-black/15">
        <div class="mx-auto max-w-5xl px-6 py-16 md:py-24">
            @forelse ($categories as $category)
                <section class="border-b border-black/15 py-12 first:pt-0">
                    <div class="grid gap-8 md:grid-cols-[1fr_2fr]">
                        <div>
                            <p class="text-xs uppercase tracking-[0.25em] text-black/45">
                                Categorie
                            </p>

                            <h2 class="mt-4 text-2xl font-light">
                                {{ $category->name }}
                            </h2>
                        </div>

                        <div>
                            @forelse ($category->faqs as $faq)
                                <details class="group border-b border-black/15 py-6 first:pt-0">
                                    <summary class="flex cursor-pointer list-none items-center justify-between gap-8 text-lg font-light">
                                        <span>
                                            {{ $faq->question }}
                                        </span>

                                        <span class="text-2xl font-light transition group-open:rotate-45">
                                            +
                                        </span>
                                    </summary>

                                    <p class="max-w-2xl pb-2 pt-5 font-light leading-8 text-black/65">
                                        {{ $faq->answer }}
                                    </p>
                                </details>
                            @empty
                                <p class="font-light text-black/50">
                                    Er zijn nog geen vragen in deze categorie.
                                </p>
                            @endforelse
                        </div>
                    </div>
                </section>
            @empty
                <div class="py-20 text-center">
                    <p class="text-xs uppercase tracking-[0.3em] text-black/40">
                        FAQ
                    </p>

                    <p class="mt-6 text-2xl font-light">
                        Er zijn momenteel geen veelgestelde vragen.
                    </p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="border-t border-black/15">
        <div class="mx-auto max-w-5xl px-6 py-20 text-center">
            <p class="text-xs uppercase tracking-[0.3em] text-black/45">
                Nog een vraag?
            </p>

            <h2 class="mt-5 text-3xl font-light md:text-4xl">
                We helpen je graag verder.
            </h2>

            <p class="mx-auto mt-5 max-w-lg font-light leading-8 text-black/60">
                Staat jouw vraag er niet tussen? Neem dan contact op met Amria.
            </p>
        </div>
    </section>
@endsection