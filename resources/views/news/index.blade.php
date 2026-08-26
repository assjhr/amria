<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws | Amria</title>
</head>
<body>

    <h1>Nieuws</h1>

    @forelse ($newsItems as $news)
        <article>
            @if ($news->image)
                <img
                    src="{{ asset('storage/' . $news->image) }}"
                    alt="{{ $news->title }}"
                    width="300"
                >
            @endif

            <h2>
                <a href="{{ route('news.show', $news) }}">
                    {{ $news->title }}
                </a>
            </h2>

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

            <p>
                {{ \Illuminate\Support\Str::limit($news->content, 200) }}
            </p>

            <p>
                <a href="{{ route('news.show', $news) }}">
                    Lees meer →
                </a>
            </p>
        </article>

        <hr>
    @empty
        <p>Er zijn momenteel geen nieuwsberichten.</p>
    @endforelse

</body>
</html>