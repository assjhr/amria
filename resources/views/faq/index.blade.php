<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Amria</title>
</head>
<body>

    <h1>Veelgestelde vragen</h1>

    @forelse ($categories as $category)
        <section>
            <h2>{{ $category->name }}</h2>

            @forelse ($category->faqs as $faq)
                <article>
                    <h3>{{ $faq->question }}</h3>

                    <p>{{ $faq->answer }}</p>
                </article>
            @empty
                <p>Er zijn nog geen vragen in deze categorie.</p>
            @endforelse
        </section>

        <hr>
    @empty
        <p>Er zijn momenteel geen veelgestelde vragen.</p>
    @endforelse

</body>
</html>pkill -f "artisan serve"