<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bekijk een voorbeeld van een privé foto collectie van Sytske Puister Photography.">
    <link rel="icon" type="image/png" href="{{ asset('img/homepage/Logo_Sytske_wit.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <title>Voorbeeldcollectie | Sytske Puister Fotografie</title>
    <style>
        :root { --ink: #101414; --paper: #f0ede7; --muted: #666b65; --accent: #c39d54; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: 'DM Sans', sans-serif; }
        a { color: inherit; }
        .header { background: var(--ink); padding: 1rem clamp(1.25rem, 5vw, 5rem); }
        .nav { display: flex; align-items: center; justify-content: space-between; max-width: 1200px; margin: auto; }
        .logo { width: 7rem; }
        .logo img { display: block; width: 100%; }
        .back { color: white; font-size: .8rem; font-weight: 700; letter-spacing: .1em; text-decoration: none; text-transform: uppercase; }
        .back:hover { color: var(--accent); }
        .intro { max-width: 1200px; margin: auto; padding: clamp(4rem, 9vw, 7rem) clamp(1.25rem, 5vw, 4rem) 3rem; }
        .eyebrow { color: #9b7737; font-size: .75rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; }
        h1 { max-width: 850px; margin: 1rem 0; font-family: 'Playfair Display', serif; font-size: clamp(3rem, 8vw, 7rem); font-weight: 500; line-height: .95; }
        .intro p { max-width: 620px; color: var(--muted); font-size: 1.05rem; line-height: 1.8; }
        .demo-note { max-width: 620px; margin-top: 2rem; border-left: 3px solid var(--accent); padding: 1rem 1.25rem; background: rgba(195,157,84,.12); color: #4f4a3f; font-size: .9rem; line-height: 1.6; }
        .gallery { display: grid; grid-template-columns: repeat(12, 1fr); grid-auto-rows: 120px; gap: 1.25rem; max-width: 1400px; margin: auto; padding: 0 clamp(1.25rem, 5vw, 4rem) 6rem; }
        figure { position: relative; overflow: hidden; margin: 0; background: #d8d4ca; }
        figure:nth-child(1) { grid-column: span 7; grid-row: span 5; }
        figure:nth-child(2) { grid-column: span 5; grid-row: span 3; margin-top: 4rem; }
        figure:nth-child(3) { grid-column: span 5; grid-row: span 4; }
        figure:nth-child(4) { grid-column: span 7; grid-row: span 4; margin-top: -2rem; }
        img.photo { display: block; width: 100%; height: 100%; object-fit: cover; transition: transform .35s ease, filter .35s ease; }
        figure:hover img.photo { filter: brightness(.84); transform: scale(1.015); }
        figcaption { position: absolute; right: 1rem; bottom: 1rem; left: 1rem; color: white; font-size: .75rem; font-weight: 700; letter-spacing: .12em; text-shadow: 0 1px 8px rgba(0,0,0,.8); text-transform: uppercase; }
        .footer { max-width: 1200px; margin: auto; border-top: 1px solid #d8d4ca; padding: 2rem clamp(1.25rem, 5vw, 4rem); color: var(--muted); font-size: .8rem; }
        @media (max-width: 800px) {
            .gallery { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 180px; }
            figure:nth-child(1), figure:nth-child(4) { grid-column: span 2; }
            figure:nth-child(2), figure:nth-child(3) { grid-column: span 1; margin-top: 0; }
        }
        @media (max-width: 550px) {
            .gallery { display: block; }
            figure { margin: 0 0 1.25rem !important; aspect-ratio: 4 / 3; }
            figure:first-child { aspect-ratio: 3 / 4; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="nav">
            <a class="logo" href="{{ route('home') }}" aria-label="Terug naar home"><img src="{{ asset('img/homepage/Logo_Sytske_wit.png') }}" alt="Sytske Puister Photography"></a>
            <a class="back" href="{{ route('home') }}">&larr; Back to home</a>
        </div>
    </header>
    <main>
        <section class="intro">
            <div class="eyebrow">Voorbeeldcollectie</div>
            <h1>Een privégalerij voor jullie.</h1>
            <p>Een voorbeeld van de ervaring: een zorgvuldig opgebouwde collectie die jullie groep opent via een persoonlijke link en wachtwoord.</p>
            <div class="demo-note"><strong>Voorbeeld.</strong> Deze pagina laat zien hoe een collectie eruitziet. Jullie persoonlijke collectie wordt nooit openbaar vermeld en is beschermd met een eigen wachtwoord.</div>
        </section>
        <section class="gallery" aria-label="Example collection images">
            <figure><img class="photo" src="{{ asset('img/homepage/Photo1.JPG') }}" alt="Voorbeeldfoto van een fotocollectie"><figcaption>Eerste licht</figcaption></figure>
            <figure><img class="photo" src="{{ asset('img/homepage/Photo2.JPG') }}" alt="Voorbeeldfoto van een fotocollectie"><figcaption>Stille plekken</figcaption></figure>
            <figure><img class="photo" src="{{ asset('img/homepage/Photo3.JPG') }}" alt="Voorbeeldfoto van een fotocollectie"><figcaption>Tussendoor</figcaption></figure>
            <figure><img class="photo" src="{{ asset('img/homepage/Photo4.JPG') }}" alt="Voorbeeldfoto van een fotocollectie"><figcaption>Om te onthouden</figcaption></figure>
        </section>
    </main>
    <footer class="footer">&copy; {{ now()->year }} Sytske Puister Photography</footer>
</body>
</html>
