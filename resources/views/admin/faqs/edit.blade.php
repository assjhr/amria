<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ bewerken | Amria Admin</title>
</head>
<body>

    <h1>FAQ bewerken</h1>

    <p>
        <a href="{{ route('admin.faqs.index') }}">
            ← Terug naar FAQ-beheer
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

    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="faq_category_id">Categorie</label><br>

            <select
                id="faq_category_id"
                name="faq_category_id"
                required
            >
                <option value="">-- Kies een categorie --</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(
                            old('faq_category_id', $faq->faq_category_id)
                            == $category->id
                        )
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label for="question">Vraag</label><br>

            <input
                type="text"
                id="question"
                name="question"
                value="{{ old('question', $faq->question) }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="answer">Antwoord</label><br>

            <textarea
                id="answer"
                name="answer"
                rows="8"
                cols="60"
                required
            >{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <br>

        <button type="submit">
            Wijzigingen opslaan
        </button>
    </form>

</body>
</html>