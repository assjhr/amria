<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel | Amria</title>
</head>
<body>

    <h1>Profiel</h1>

    @if ($user->profile)
        @if ($user->profile->profile_photo)
            <img
                src="{{ asset('storage/' . $user->profile->profile_photo) }}"
                alt="Profielfoto"
                width="150"
            >
        @endif

        <p>
            <strong>Username:</strong>
            {{ $user->profile->username ?? 'Niet ingevuld' }}
        </p>

        <p>
            <strong>Verjaardag:</strong>
            {{ $user->profile->birthday ?? 'Niet ingevuld' }}
        </p>

        <p>
            <strong>Over mij:</strong><br>
            {{ $user->profile->bio ?? 'Nog geen bio.' }}
        </p>
    @else
        <p>Deze gebruiker heeft nog geen profielgegevens ingevuld.</p>
    @endif

    @auth
        @if (auth()->id() === $user->id)
            <p>
                <a href="{{ route('profiles.edit') }}">
                    Mijn profiel bewerken
                </a>
            </p>
        @endif
    @endauth

</body>
</html>