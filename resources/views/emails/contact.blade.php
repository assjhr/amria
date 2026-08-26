<h1>Nieuw contactbericht via Amria</h1>

<p>
    <strong>Naam:</strong>
    {{ $name }}
</p>

<p>
    <strong>E-mail:</strong>
    {{ $email }}
</p>

<p>
    <strong>Onderwerp:</strong>
    {{ $contactSubject }}
</p>

<hr>

<p>
    <strong>Bericht:</strong>
</p>

<p>
    {!! nl2br(e($messageContent)) !!}
</p>