@extends('layouts.public')

@section('title', 'FAQ toevoegen | Amria')

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-20 md:py-28">
        <p class="text-xs uppercase tracking-[0.3em] text-black/45">
            Admin / FAQ
        </p>

        <h1 class="mt-5 text-5xl font-light md:text-6xl">
            Nieuwe FAQ
        </h1>

        <p class="mt-5 max-w-xl font-light leading-8 text-black/60">
            Voeg een nieuwe vraag toe en koppel die aan de juiste categorie.
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
            action="{{ route('admin.faqs.store') }}"
            method="POST"
            class="mt-14 space-y-10"
        >
            @csrf

            <div>
                <label
                    for="faq_category_id"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Categorie
                </label>

                <select
                    id="faq_category_id"
                    name="faq_category_id"
                    required
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
                    <option value="">
                        -- Kies een categorie --
                    </option>

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @selected(old('faq_category_id') == $category->id)
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label
                    for="question"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Vraag
                </label>

                <input
                    type="text"
                    id="question"
                    name="question"
                    value="{{ old('question') }}"
                    required
                    class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                >
            </div>

            <div>
                <label
                    for="answer"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Antwoord
                </label>

                <textarea
                    id="answer"
                    name="answer"
                    rows="8"
                    required
                    class="mt-3 w-full resize-y border border-black/25 bg-transparent p-4 font-light leading-8 outline-none focus:border-black focus:ring-0"
                >{{ old('answer') }}</textarea>
            </div>

            <div class="flex flex-wrap gap-4 pt-4">
                <button
                    type="submit"
                    class="border border-black bg-black px-7 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
                >
                    FAQ toevoegen
                </button>

                <a
                    href="{{ route('admin.faqs.index') }}"
                    class="border border-black px-7 py-4 text-xs uppercase tracking-[0.22em] transition hover:bg-black hover:text-[#fff9df]"
                >
                    Annuleren
                </a>
            </div>
        </form>
    </section>
@endsection