<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwsbeheer | Amria Admin</title>
</head>
<body>

    <h1>Nieuwsbeheer</h1>

    <p>
        <a href="{{ route('admin.dashboard') }}">
            ← Terug naar admin dashboard
        </a>
    </p>

    <p>
        <a href="{{ route('admin.news.create') }}">
            + Nieuw nieuwsitem
        </a>
    </p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($newsItems->isEmpty())
        <p>Er zijn nog geen nieuwsitems.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titel</th>
                    <th>Auteur</th>
                    <th>Publicatiedatum</th>
                    <th>Acties</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($newsItems as $news)
                    <tr>
                        <td>{{ $news->id }}</td>

                        <td>{{ $news->title }}</td>

                        <td>{{ $news->user->name }}</td>

                        <td>
                            {{ $news->published_at?->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            <a href="{{ route('admin.news.edit', $news) }}">
                                Bewerken
                            </a>

                            <form
                                action="{{ route('admin.news.destroy', $news) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?');"
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