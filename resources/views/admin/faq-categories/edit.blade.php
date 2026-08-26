@extends('layouts.public')

@section('title', 'FAQ-categorie bewerken | Amria')

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-20 md:py-28">
        <p class="text-xs uppercase tracking-[0.3em] text-black/45">
            Admin / FAQ
        </p>

        <h1 class="mt-5 text-5xl font-light md:text-6xl">
            FAQ-categorie bewerken
        </h1>

        <p class="mt-5 max-w-xl font-light leading-8 text-black/60">
            Pas de naam van deze FAQ-categorie aan.
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
            action="{{ route('admin.faq-categories.update', $faqCategory) }}"
            method="POST"
            class="mt-14 space-y-10"
        >
            @csrf
            @method('PUT')

            <div>
                <label
                    for="name"
                    class="text-xs uppercase tracking-[0.22em]"
                >
                    Naam
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $faqCategory->name) }}"
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
                    href="{{ route('admin.faq-categories.index') }}"
                    class="border border-black px-7 py-4 text-xs uppercase tracking-[0.22em] transition hover:bg-black hover:text-[#fff9df]"
                >
                    Annuleren
                </a>
            </div>
        </form>
    </section>
@endsection