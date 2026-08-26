<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} | Amria</title>
</head>
<body>

    <p>
        <a href="{{ route('news.index') }}">
            ← Terug naar nieuws
        </a>
    </p>

    <article>
        <h1>{{ $news->title }}</h1>

        @if ($news->image)
            <img
                src="{{ asset('storage/' . $news->image) }}"
                alt="{{ $news->title }}"
                width="500"
            >
        @endif

        <p>
            Gepubliceerd op:
            {{ $news->published_at?->format('d/m/Y H:i') }}
        </p>

        @if ($news->user)
            <p>
                Door:
                <a href="{{ route('profiles.show', $news->user) }}">
                    {{ $news->user->name }}
                </a>
            </p>
        @endif

        @if ($news->tags->isNotEmpty())
            <p>
                Tags:
                @foreach ($news->tags as $tag)
                    <span>{{ $tag->name }}</span>
                @endforeach
            </p>
        @endif

        <div>
            {!! nl2br(e($news->content)) !!}
        </div>
    </article>

</body>
</html>