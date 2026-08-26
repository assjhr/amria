<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel bewerken | Amria</title>
</head>
<body>

    <h1>Mijn profiel bewerken</h1>

    <p>
        <a href="{{ route('profiles.show', $user) }}">
            ← Terug naar mijn profiel
        </a>
    </p>

    @if ($errors->any())
        <div>
            <strong>Controleer de volgende fouten:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('profiles.update') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="username">Username</label><br>

            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username', $user->profile?->username) }}"
            >
        </div>

        <br>

        <div>
            <label for="birthday">Verjaardag</label><br>

            <input
                type="date"
                id="birthday"
                name="birthday"
                value="{{ old('birthday', $user->profile?->birthday) }}"
            >
        </div>

        <br>

        <div>
            <label for="profile_photo">Profielfoto</label><br>

            @if ($user->profile?->profile_photo)
                <img
                    src="{{ asset('storage/' . $user->profile->profile_photo) }}"
                    alt="Huidige profielfoto"
                    width="100"
                >

                <br><br>
            @endif

            <input
                type="file"
                id="profile_photo"
                name="profile_photo"
                accept="image/*"
            >
        </div>

        <br>

        <div>
            <label for="bio">Over mij</label><br>

            <textarea
                id="bio"
                name="bio"
                rows="6"
                cols="50"
            >{{ old('bio', $user->profile?->bio) }}</textarea>
        </div>

        <br>

        <button type="submit">
            Profiel opslaan
        </button>
    </form>

</body>
</html>