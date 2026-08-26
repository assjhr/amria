@extends('layouts.public')

@section('title', 'Amria')

@section('content')
    <section class="flex min-h-[82vh] items-center justify-center px-6">
        <div class="text-center">
            <p class="mb-7 text-xs uppercase tracking-[0.35em] text-black/50">
                Fashion & Community
            </p>

            <h1 class="text-7xl font-light tracking-[0.45em] sm:text-8xl md:text-9xl">
    AMRIA
</h1>

            <div class="mx-auto my-10 h-px w-14 bg-black"></div>

            <p class="text-xs font-light uppercase tracking-[0.35em] sm:text-sm">
                Verbindt. Informeert. Inspireert.
            </p>

            <div class="mt-20 text-3xl font-light">
                ↓
            </div>
        </div>
    </section>

    <section class="border-t border-black/15">
        <div class="mx-auto max-w-7xl px-6 py-28">
            <div class="grid gap-14 md:grid-cols-2">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-black/55">
                        Ontdek Amria
                    </p>
                </div>

                <div>
                    <h2 class="font-amria text-4xl font-normal leading-tight sm:text-5xl">
                        Fashion, inspiratie en verhalen in één minimalistische community.
                    </h2>

                    <p class="mt-8 max-w-xl text-base font-light leading-8 text-black/65">
                        Ontdek het laatste nieuws van Amria, bekijk onze veelgestelde vragen
                        en creëer jouw eigen profiel binnen de community.
                    </p>

                    <div class="mt-10 flex flex-wrap gap-4">
                        <a
                            href="{{ route('news.index') }}"
                            class="border border-black bg-black px-7 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
                        >
                            Ontdek nieuws
                        </a>

                        <a
                            href="{{ route('faq.index') }}"
                            class="border border-black px-7 py-4 text-xs uppercase tracking-[0.22em] transition hover:bg-black hover:text-[#fff9df]"
                        >
                            Bekijk FAQ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection