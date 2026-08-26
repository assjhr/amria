<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ-categorie toevoegen | Amria Admin</title>
</head>
<body>

    <h1>FAQ-categorie toevoegen</h1>

    <p>
        <a href="{{ route('admin.faq-categories.index') }}">
            ← Terug naar FAQ-categorieën
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
        action="{{ route('admin.faq-categories.store') }}"
        method="POST"
    >
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

        <button type="submit">
            Categorie toevoegen
        </button>
    </form>

</body>
</html>