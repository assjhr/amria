@extends('layouts.public')

@section('title', 'Nieuws bewerken | Amria')

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-20 md:py-28">
        <p class="text-xs uppercase tracking-[0.3em] text-black/45">
            Admin / Nieuws
        </p>

        <h1 class="mt-5 text-5xl font-light md:text-6xl">
            Nieuws bewerken
        </h1>

        <p class="mt-5 max-w-xl font-light leading-8 text-black/60">
            Pas het nieuwsbericht aan en bewaar je wijzigingen.
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
            action="{{ route('admin.news.update', $news) }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-14 space-y-10"
        >
            @csrf
            @method('PUT')

            <div>
                <label
                    for="title"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Titel
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $news->title) }}"
                    required
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <div>
                <label
                    for="image"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Afbeelding
                </label>

                @if ($news->image)
                    <div class="mt-5">
                        <img
                            src="{{ asset('storage/' . $news->image) }}"
                            alt="{{ $news->title }}"
                            class="h-40 w-40 object-cover"
                        >
                    </div>

                    <p class="mt-3 text-xs font-light text-black/45">
                        Huidige afbeelding
                    </p>
                @endif

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/*"
                    class="mt-5 block w-full text-sm font-light"
                >

                <p class="mt-2 text-xs font-light text-black/45">
                    Laat leeg om de huidige afbeelding te behouden.
                </p>
            </div>

            <div>
                <label
                    for="content"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Inhoud
                </label>

                <textarea
                    id="content"
                    name="content"
                    rows="10"
                    required
                    class="mt-3 w-full resize-y border border-black/25 bg-transparent p-4 font-light leading-8 outline-none focus:border-black focus:ring-0"
                >{{ old('content', $news->content) }}</textarea>
            </div>

            <div>
                <label
                    for="published_at"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Publicatiedatum
                </label>

                <input
                    type="datetime-local"
                    id="published_at"
                    name="published_at"
                    value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}"
                    required
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <div class="flex flex-wrap gap-4 pt-4">
                <button
                    type="submit"
                    class="border border-black bg-black px-7 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
                >
                    Wijzigingen opslaan
                </button>

                <a
                    href="{{ route('admin.news.index') }}"
                    class="border border-black px-7 py-4 text-xs uppercase tracking-[0.22em] transition hover:bg-black hover:text-[#fff9df]"
                >
                    Annuleren
                </a>
            </div>
        </form>
    </section>
@endsection