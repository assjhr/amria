<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Amria')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#fff9df] text-black antialiased">

    <header class="border-b border-black/15">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-7">
            <a href="{{ route('home') }}">
                <span class="text-3xl font-light tracking-[0.5em]">
    AMRIA
</span>
            </a>

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
            </nav>

            <div class="flex items-center gap-4">
                @auth
                    <a
                        href="{{ route('profiles.show', auth()->user()) }}"
                        class="border border-black px-5 py-3 text-xs uppercase tracking-[0.2em] transition hover:bg-black hover:text-[#fff9df]"
                    >
                        Profiel
                    </a>
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

    <main>
        @yield('content')
    </main>

    <footer class="mt-24 border-t border-black/15">
        <div class="mx-auto grid max-w-7xl gap-12 px-6 py-16 md:grid-cols-4">
            <div>
                <p class="text-3xl font-light tracking-[0.5em]">
    AMRIA
</p>

                <p class="mt-6 max-w-xs text-sm font-light leading-7 text-black/65">
                    Minimalistische fashion, nieuws en inspiratie vanuit Amria.
                </p>
            </div>

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
                </div>
            </div>

            <div>
                <p class="text-xs uppercase tracking-[0.25em]">
                    Info
                </p>

                <div class="mt-5 flex flex-col gap-3 text-sm font-light">
                    <span>Over Amria</span>
                    <span>Contact</span>
                    <span>Privacy</span>
                </div>
            </div>

            <div>
                <p class="text-xs uppercase tracking-[0.25em]">
                    Contact
                </p>

                <p class="mt-5 text-sm font-light">
                    info@amria.be
                </p>
            </div>
        </div>

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