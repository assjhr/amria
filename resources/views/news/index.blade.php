@extends('layouts.public')

@section('title', 'Nieuws | Amria')

@section('content')
    <section class="mx-auto max-w-7xl px-6 pb-16 pt-20 md:pt-28">
        <p class="text-xs uppercase tracking-[0.3em] text-black/50">
            Amria Journal
        </p>

        <h1 class="mt-5 text-5xl font-light tracking-tight md:text-7xl">
            Nieuws
        </h1>

        <p class="mt-6 max-w-xl text-base font-light leading-8 text-black/60">
            Ontdek het laatste nieuws, verhalen en updates van Amria.
        </p>
    </section>

    <section class="border-t border-black/15">
        <div class="mx-auto max-w-7xl px-6 py-16">
            @forelse ($newsItems as $news)
                <article class="grid gap-10 border-b border-black/15 py-14 first:pt-0 md:grid-cols-2 md:items-center">
                    <div>
                        @if ($news->image)
                            <a href="{{ route('news.show', $news) }}">
                                <img
                                    src="{{ asset('storage/' . $news->image) }}"
                                    alt="{{ $news->title }}"
                                    class="aspect-[4/3] w-full object-cover"
                                >
                            </a>
                        @else
                            <a
                                href="{{ route('news.show', $news) }}"
                                class="flex aspect-[4/3] w-full items-center justify-center border border-black/15"
                            >
                                <span class="text-xs uppercase tracking-[0.3em] text-black/35">
                                    Amria
                                </span>
                            </a>
                        @endif
                    </div>

                    <div class="md:px-8">
                        <p class="text-xs uppercase tracking-[0.25em] text-black/45">
                            {{ $news->published_at?->format('d.m.Y') }}
                        </p>

                        <h2 class="mt-5 text-3xl font-light leading-tight md:text-4xl">
                            <a
                                href="{{ route('news.show', $news) }}"
                                class="transition hover:opacity-50"
                            >
                                {{ $news->title }}
                            </a>
                        </h2>

                        <p class="mt-6 font-light leading-8 text-black/65">
                            {{ \Illuminate\Support\Str::limit($news->content, 180) }}
                        </p>

                        @if ($news->tags->isNotEmpty())
                            <div class="mt-6 flex flex-wrap gap-2">
                                @foreach ($news->tags as $tag)
                                    <span class="border border-black/20 px-3 py-1 text-[10px] uppercase tracking-[0.2em]">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        @if ($news->user)
                            <p class="mt-7 text-xs uppercase tracking-[0.18em] text-black/45">
                                Door
                                <a
                                    href="{{ route('profiles.show', $news->user) }}"
                                    class="text-black underline underline-offset-4"
                                >
                                    {{ $news->user->name }}
                                </a>
                            </p>
                        @endif

                        <a
                            href="{{ route('news.show', $news) }}"
                            class="mt-9 inline-block border-b border-black pb-1 text-xs uppercase tracking-[0.25em] transition hover:opacity-45"
                        >
                            Lees artikel →
                        </a>
                    </div>
                </article>
            @empty
                <div class="py-24 text-center">
                    <p class="text-xs uppercase tracking-[0.3em] text-black/40">
                        Amria Journal
                    </p>

                    <p class="mt-6 text-2xl font-light">
                        Er zijn momenteel geen nieuwsberichten.
                    </p>
                </div>
            @endforelse
        </div>
    </section>
@endsection