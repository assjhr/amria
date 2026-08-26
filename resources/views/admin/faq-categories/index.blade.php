<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ-categorieën | Amria Admin</title>
</head>
<body>

    <h1>FAQ-categorieën</h1>

    <p>
        <a href="{{ route('admin.dashboard') }}">
            ← Terug naar admin dashboard
        </a>
    </p>

    <p>
        <a href="{{ route('admin.faq-categories.create') }}">
            + Nieuwe FAQ-categorie
        </a>
    </p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($categories->isEmpty())
        <p>Er zijn nog geen FAQ-categorieën.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Acties</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>

                        <td>{{ $category->name }}</td>

                        <td>
                            <a href="{{ route('admin.faq-categories.edit', $category) }}">
                                Bewerken
                            </a>

                            <form
                                action="{{ route('admin.faq-categories.destroy', $category) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Weet je zeker dat je deze categorie wilt verwijderen?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Verwijderen
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>