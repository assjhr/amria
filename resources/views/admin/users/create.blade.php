<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker toevoegen | Amria Admin</title>
</head>
<body>

    <h1>Nieuwe gebruiker toevoegen</h1>

    <p>
        <a href="{{ route('admin.users.index') }}">
            ← Terug naar gebruikersbeheer
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

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Naam</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="email">E-mail</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="password">Wachtwoord</label><br>
            <input
                type="password"
                id="password"
                name="password"
                minlength="8"
                required
            >
        </div>

        <br>

        <div>
            <label for="password_confirmation">
                Bevestig wachtwoord
            </label><br>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                minlength="8"
                required
            >
        </div>

        <br>

        <div>
            <label>
                <input
                    type="checkbox"
                    name="is_admin"
                    value="1"
                >
                Maak deze gebruiker admin
            </label>
        </div>

        <br>

        <button type="submit">
            Gebruiker aanmaken
        </button>
    </form>

</body>
</html>