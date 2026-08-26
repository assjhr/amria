<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Amria')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#fff9df] text-black antialiased">

    {{-- HEADER --}}
    <header class="border-b border-black/15">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-7">

            {{-- Logo --}}
            <a
                href="{{ route('home') }}"
                class="text-3xl font-light tracking-[0.5em]"
            >
                AMRIA
            </a>

            {{-- Navigatie --}}
            <nav class="hidden items-center gap-10 text-xs uppercase tracking-[0.22em] md:flex">

                <a
                    href="{{ route('home') }}"
                    class="transition hover:opacity-45"
                >
                    Home
                </a>

                <a
                    href="{{ route('news.index') }}"
                    class="transition hover:opacity-45"
                >
                    Nieuws
                </a>

                <a
                    href="{{ route('faq.index') }}"
                    class="transition hover:opacity-45"
                >
                    FAQ
                </a>

                <a
                    href="{{ route('contact.create') }}"
                    class="transition hover:opacity-45"
                >
                    Contact
                </a>

            </nav>

            {{-- Account --}}
            <div class="flex items-center gap-4">

                @auth
                    @if (auth()->user()->is_admin)
                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="text-xs uppercase tracking-[0.2em] transition hover:opacity-45"
                        >
                            Admin
                        </a>
                    @endif

                    <a
                        href="{{ route('profiles.show', auth()->user()) }}"
                        class="text-xs uppercase tracking-[0.2em] transition hover:opacity-45"
                    >
                        Profiel
                    </a>

                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="border border-black px-5 py-3 text-xs uppercase tracking-[0.2em] transition hover:bg-black hover:text-[#fff9df]"
                        >
                            Uitloggen
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="border border-black px-5 py-3 text-xs uppercase tracking-[0.2em] transition hover:bg-black hover:text-[#fff9df]"
                    >
                        Inloggen
                    </a>
                @endauth

            </div>
        </div>
    </header>


    {{-- PAGINA-INHOUD --}}
    <main>
        @yield('content')
    </main>


    {{-- FOOTER --}}
    <footer class="mt-24 border-t border-black/15">

        <div class="mx-auto grid max-w-7xl gap-12 px-6 py-16 md:grid-cols-4">

            {{-- Amria --}}
            <div>
                <p class="text-3xl font-light tracking-[0.5em]">
                    AMRIA
                </p>

                <p class="mt-6 max-w-xs text-sm font-light leading-7 text-black/65">
                    Minimalistische fashion, nieuws en inspiratie vanuit Amria.
                </p>
            </div>


            {{-- Navigatie --}}
            <div>
                <p class="text-xs uppercase tracking-[0.25em]">
                    Navigatie
                </p>

                <div class="mt-5 flex flex-col gap-3 text-sm font-light">

                    <a
                        href="{{ route('home') }}"
                        class="transition hover:opacity-45"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('news.index') }}"
                        class="transition hover:opacity-45"
                    >
                        Nieuws
                    </a>

                    <a
                        href="{{ route('faq.index') }}"
                        class="transition hover:opacity-45"
                    >
                        FAQ
                    </a>

                    <a
                        href="{{ route('contact.create') }}"
                        class="transition hover:opacity-45"
                    >
                        Contact
                    </a>

                </div>
            </div>


            {{-- Info --}}
            <div>
                <p class="text-xs uppercase tracking-[0.25em]">
                    Info
                </p>

                <div class="mt-5 flex flex-col gap-3 text-sm font-light">

                    <span>
                        Over Amria
                    </span>

                    <a
                        href="{{ route('contact.create') }}"
                        class="transition hover:opacity-45"
                    >
                        Contact
                    </a>

                    <span>
                        Privacy
                    </span>

                </div>
            </div>


            {{-- Contactgegevens --}}
            <div>
                <p class="text-xs uppercase tracking-[0.25em]">
                    Contact
                </p>

                <a
                    href="mailto:info@amria.be"
                    class="mt-5 inline-block text-sm font-light transition hover:opacity-45"
                >
                    info@amria.be
                </a>
            </div>

        </div>


        {{-- Onderste footer --}}
        <div class="mx-auto flex max-w-7xl justify-between border-t border-black/15 px-6 py-6 text-xs font-light text-black/55">

            <span>
                © {{ date('Y') }} Amria. Alle rechten voorbehouden.
            </span>

            <span>
                AMRIA
            </span>

        </div>

    </footer>

</body>

</html>