@extends('layouts.public')

@section('title', 'Gebruikersbeheer | Amria')

@section('content')
    <section class="mx-auto max-w-7xl px-6 py-20 md:py-28">
        <div class="flex flex-col gap-8 border-b border-black/15 pb-12 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-black/45">
                    Admin / Gebruikers
                </p>

                <h1 class="mt-5 text-5xl font-light md:text-6xl">
                    Gebruikers
                </h1>

                <p class="mt-5 font-light text-black/60">
                    Beheer accounts en adminrechten.
                </p>
            </div>

            <a
                href="{{ route('admin.users.create') }}"
                class="border border-black bg-black px-6 py-4 text-xs uppercase tracking-[0.22em] text-[#fff9df] transition hover:bg-transparent hover:text-black"
            >
                + Nieuwe gebruiker
            </a>
        </div>

        @if (session('success'))
            <div class="mt-8 border border-black/20 px-5 py-4 text-sm font-light">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-12 overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="border-b border-black">
                        <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                            Naam
                        </th>

                        <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                            E-mail
                        </th>

                        <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                            Rol
                        </th>

                        <th class="px-3 py-4 text-xs font-normal uppercase tracking-[0.2em]">
                            Sinds
                        </th>

                        <th class="px-3 py-4 text-right text-xs font-normal uppercase tracking-[0.2em]">
                            Actie
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b border-black/15">
                            <td class="px-3 py-6 font-light">
                                {{ $user->name }}
                            </td>

                            <td class="px-3 py-6 font-light text-black/60">
                                {{ $user->email }}
                            </td>

                            <td class="px-3 py-6">
                                <span class="border border-black/20 px-3 py-1 text-[10px] uppercase tracking-[0.2em]">
                                    {{ $user->is_admin ? 'Admin' : 'Gebruiker' }}
                                </span>
                            </td>

                            <td class="px-3 py-6 text-sm font-light text-black/50">
                                {{ $user->created_at?->format('d.m.Y') }}
                            </td>

                            <td class="px-3 py-6 text-right">
                                <form
                                    action="{{ route('admin.users.toggle-admin', $user) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="text-xs uppercase tracking-[0.18em] underline underline-offset-4 transition hover:opacity-45"
                                    >
                                        {{ $user->is_admin ? 'Admin verwijderen' : 'Maak admin' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td
                                colspan="5"
                                class="py-16 text-center font-light text-black/50"
                            >
                                Er zijn nog geen gebruikers.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-12">
            <a
                href="{{ route('admin.dashboard') }}"
                class="text-xs uppercase tracking-[0.22em] underline underline-offset-4"
            >
                ← Admin dashboard
            </a>
        </div>
    </section>
@endsection