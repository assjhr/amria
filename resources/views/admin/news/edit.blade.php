<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws bewerken | Amria Admin</title>
</head>
<body>

    <h1>Nieuws bewerken</h1>

    <p>
        <a href="{{ route('admin.news.index') }}">
            ← Terug naar nieuwsbeheer
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
        action="{{ route('admin.news.update', $news) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titel</label><br>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $news->title) }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="image">Nieuwe afbeelding</label><br>

            @if ($news->image)
                <p>Er is momenteel een afbeelding ingesteld.</p>
            @endif

            <input
                type="file"
                id="image"
                name="image"
                accept="image/*"
            >

            <p>Laat leeg als je de huidige afbeelding wilt behouden.</p>
        </div>

        <br>

        <div>
            <label for="content">Inhoud</label><br>

            <textarea
                id="content"
                name="content"
                rows="10"
                cols="60"
                required
            >{{ old('content', $news->content) }}</textarea>
        </div>

        <br>

        <div>
            <label for="published_at">Publicatiedatum</label><br>

            <input
                type="datetime-local"
                id="published_at"
                name="published_at"
                value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}"
                required
            >
        </div>

        <br>

        <button type="submit">
            Wijzigingen opslaan
        </button>
    </form>

</body>
</html>