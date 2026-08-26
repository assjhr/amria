@extends('layouts.public')

@section('title', $news->title . ' | Amria')

@section('content')
    <article>
        <header class="mx-auto max-w-4xl px-6 pb-14 pt-20 text-center md:pt-28">
            <a
                href="{{ route('news.index') }}"
                class="text-xs uppercase tracking-[0.25em] text-black/50 transition hover:text-black"
            >
                ← Nieuws
            </a>

            <p class="mt-12 text-xs uppercase tracking-[0.25em] text-black/45">
                {{ $news->published_at?->format('d.m.Y') }}
            </p>

            <h1 class="mt-6 text-4xl font-light leading-tight md:text-6xl">
                {{ $news->title }}
            </h1>

            @if ($news->user)
                <p class="mt-7 text-xs uppercase tracking-[0.2em] text-black/45">
                    Door
                    <a
                        href="{{ route('profiles.show', $news->user) }}"
                        class="text-black underline underline-offset-4"
                    >
                        {{ $news->user->name }}
                    </a>
                </p>
            @endif
        </header>

        @if ($news->image)
            <div class="mx-auto max-w-6xl px-6">
                <img
                    src="{{ asset('storage/' . $news->image) }}"
                    alt="{{ $news->title }}"
                    class="max-h-[700px] w-full object-cover"
                >
            </div>
        @endif

        <div class="mx-auto max-w-3xl px-6 py-16 md:py-20">
            @if ($news->tags->isNotEmpty())
                <div class="mb-10 flex flex-wrap gap-2">
                    @foreach ($news->tags as $tag)
                        <span class="border border-black/20 px-3 py-1 text-[10px] uppercase tracking-[0.2em]">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            @endif

            <div class="whitespace-pre-line text-base font-light leading-9 text-black/75 md:text-lg">
                {{ $news->content }}
            </div>

            <div class="mt-16 border-t border-black/15 pt-8">
                <a
                    href="{{ route('news.index') }}"
                    class="text-xs uppercase tracking-[0.25em] transition hover:opacity-45"
                >
                    ← Terug naar alle nieuws
                </a>
            </div>
        </div>
    </article>
@endsection