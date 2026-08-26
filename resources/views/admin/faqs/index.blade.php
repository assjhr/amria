<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ-beheer | Amria Admin</title>
</head>
<body>

    <h1>FAQ-beheer</h1>

    <p>
        <a href="{{ route('admin.dashboard') }}">
            ← Terug naar admin dashboard
        </a>
    </p>

    <p>
        <a href="{{ route('admin.faqs.create') }}">
            + Nieuwe FAQ
        </a>
    </p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($faqs->isEmpty())
        <p>Er zijn nog geen FAQ-vragen.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categorie</th>
                    <th>Vraag</th>
                    <th>Antwoord</th>
                    <th>Acties</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->id }}</td>

                        <td>
                            {{ $faq->category->name }}
                        </td>

                        <td>
                            {{ $faq->question }}
                        </td>

                        <td>
                            {{ $faq->answer }}
                        </td>

                        <td>
                            <a href="{{ route('admin.faqs.edit', $faq) }}">
                                Bewerken
                            </a>

                            <form
                                action="{{ route('admin.faqs.destroy', $faq) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Weet je zeker dat je deze FAQ wilt verwijderen?');"
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