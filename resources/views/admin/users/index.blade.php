<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikers | Amria Admin</title>
</head>
<body>

    <h1>Gebruikersbeheer</h1>

    <p>
        <a href="{{ route('admin.dashboard') }}">
            ← Terug naar admin dashboard
        </a>
    </p>

    <p>
        <a href="{{ route('admin.users.create') }}">
            + Nieuwe gebruiker
        </a>
    </p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>E-mail</th>
                <th>Rol</th>
                <th>Aangemaakt op</th>
                <th>Acties</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        @if ($user->is_admin)
                            Admin
                        @else
                            Gebruiker
                        @endif
                    </td>

                    <td>
                        {{ $user->created_at?->format('d/m/Y H:i') }}
                    </td>

                    <td>
                        @if ($user->id !== auth()->id())
                            <form
                                action="{{ route('admin.users.toggle-admin', $user) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <button type="submit">
                                    @if ($user->is_admin)
                                        Adminrechten afnemen
                                    @else
                                        Maak admin
                                    @endif
                                </button>
                            </form>
                        @else
                            Huidige gebruiker
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        Er zijn nog geen gebruikers.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>