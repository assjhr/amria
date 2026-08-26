<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen bg-[#fff9df] text-black antialiased">
        <div class="flex min-h-svh flex-col items-center justify-center px-6 py-12 md:px-10">
            <div class="w-full max-w-md">
                <div class="border border-black/15 bg-[#fff9df] px-7 py-10 sm:px-10">
                    <div class="flex flex-col gap-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>