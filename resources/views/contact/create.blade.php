@extends('layouts.public')

@section('title', 'Contact | Amria')

@section('content')
    <section class="mx-auto max-w-6xl px-6 py-20 md:py-28">
        <div class="grid gap-16 md:grid-cols-[1fr_1.2fr]">

            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-black/45">
                    Contact
                </p>

                <h1 class="mt-5 text-5xl font-light md:text-6xl">
                    Neem contact op
                </h1>

                <p class="mt-6 max-w-md font-light leading-8 text-black/60">
                    Heb je een vraag, opmerking of wil je iets met ons delen?
                    Stuur ons gerust een bericht.
                </p>

                <div class="mt-12 border-t border-black/15 pt-8">
                    <p class="text-xs uppercase tracking-[0.22em] text-black/45">
                        E-mail
                    </p>

                    <p class="mt-3 font-light">
                        info@amria.be
                    </p>
                </div>
            </div>

            <div>
                @if (session('success'))
                    <div class="mb-8 border border-black/20 p-5 text-sm font-light">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-8 border border-black/20 p-5">
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
                    action="{{ route('contact.store') }}"
                    method="POST"
                    class="space-y-10"
                >
                    @csrf

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
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                        >
                    </div>

                    <div>
                        <label
                            for="email"
                            class="text-xs uppercase tracking-[0.22em]"
                        >
                            E-mailadres
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                        >
                    </div>

                    <div>
                        <label
                            for="subject"
                            class="text-xs uppercase tracking-[0.22em]"
                        >
                            Onderwerp
                        </label>

                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            value="{{ old('subject') }}"
                            required
                            class="mt-3 w-full border-0 border-b border-black/30 bg-transparent px-0 py-3 font-light outline-none focus:border-black focus:ring-0"
                        >
                    </div>

                    <div>
                        <label
                            for="message"
                            class="text-xs uppercase tracking-[0.22em]"
                        >
                            Bericht
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="8"
                            required
                            class="mt-3 w-full resize-y border border-black/25 bg-transparent p-4 font-light leading-8 outline-none focus:border-black focus:ring-0"
                        >{{ old('message') }}</textarea>
                    </div>

                    <button
                        type="submit"
                        class="border border-black bg-black px-8 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
                    >
                        Bericht versturen
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection