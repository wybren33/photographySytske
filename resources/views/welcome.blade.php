<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sytske Puister Fotografie maakt persoonlijke fotocollecties en besloten online galerijen voor families en groepen.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route('home') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Sytske Puister Fotografie">
    <meta property="og:title" content="Sytske Puister Fotografie | Besloten fotocollecties">
    <meta property="og:description" content="Persoonlijke fotocollecties voor genodigden en hun families.">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:image" content="{{ asset('img/homepage/Photo1.JPG') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Sytske Puister Fotografie | Besloten fotocollecties">
    <meta name="twitter:description" content="Persoonlijke fotocollecties voor genodigden en hun families.">
    <meta name="twitter:image" content="{{ asset('img/homepage/Photo1.JPG') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/homepage/Logo_Sytske_wit.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,700,0,200">
    <title>Sytske Puister Fotografie</title>
    <style>
        :root {
            --ink: #101414;
            --paper: #f0ede7;
            --muted: #b8b8b0;
            --line: rgba(255, 255, 255, 0.2);
            --accent: #d4b36a;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: 'DM Sans', sans-serif; }
        a { color: inherit; }
        .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0; }
        .skip-link { position: absolute; left: 1rem; top: -5rem; z-index: 20; background: var(--accent); color: var(--ink); padding: .75rem 1rem; font-weight: 700; }
        .skip-link:focus { top: 1rem; }
        .site-header { position: absolute; z-index: 10; width: 100%; padding: 1.5rem clamp(1.25rem, 5vw, 5rem); color: white; }
        .nav-bar { display: flex; align-items: center; justify-content: space-between; max-width: 1400px; margin: auto; }
        .logo { display: block; width: clamp(5rem, 9vw, 8rem); }
        .logo img { display: block; width: 100%; height: auto; }
        .menu-toggle { display: none; border: 1px solid var(--line); background: rgba(16, 20, 20, .45); color: white; padding: .6rem .75rem; cursor: pointer; }
        .menu-toggle:focus-visible, .nav-link:focus-visible, .button:focus-visible, .story-link:focus-visible { outline: 2px solid var(--accent); outline-offset: 4px; }
        .nav-list { display: flex; align-items: center; gap: clamp(1rem, 3vw, 2.75rem); margin: 0; padding: 0; list-style: none; }
        .nav-link { position: relative; color: white; font-size: .82rem; font-weight: 600; letter-spacing: .08em; text-decoration: none; text-transform: uppercase; }
        .nav-link::after { position: absolute; right: 0; bottom: -.5rem; left: 0; height: 1px; background: var(--accent); content: ''; transform: scaleX(0); transform-origin: right; transition: transform .25s ease; }
        .nav-link:hover::after, .nav-link:focus-visible::after { transform: scaleX(1); transform-origin: left; }
        .hero { position: relative; display: flex; min-height: min(760px, 88vh); align-items: flex-end; padding: clamp(8rem, 18vh, 13rem) clamp(1.25rem, 8vw, 9rem) clamp(4rem, 10vh, 7rem); background: #29302f var(--hero-image) center / cover no-repeat; color: white; isolation: isolate; }
        .hero::before { position: absolute; z-index: -1; inset: 0; background: rgba(8, 12, 12, .34); content: ''; }
        .hero-content { max-width: 720px; }
        .eyebrow { margin: 0 0 1rem; color: var(--accent); font-size: .75rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; }
        .hero h1 { max-width: 700px; margin: 0; font-family: 'Playfair Display', serif; font-size: clamp(3.2rem, 8vw, 7rem); font-weight: 500; line-height: .96; letter-spacing: -.03em; text-shadow: 0 2px 18px rgba(0, 0, 0, .28); }
        .hero-copy { max-width: 470px; margin: 1.5rem 0 0; color: #f0f0ea; font-size: clamp(1rem, 1.5vw, 1.2rem); line-height: 1.7; }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 2rem; }
        .button { display: inline-flex; min-height: 2.9rem; align-items: center; justify-content: center; padding: .8rem 1.3rem; border: 1px solid var(--accent); color: white; font-size: .8rem; font-weight: 700; letter-spacing: .1em; text-decoration: none; text-transform: uppercase; transition: background-color .25s ease, color .25s ease; }
        .button:hover { background: var(--accent); color: var(--ink); }
        .button-light { background: var(--accent); color: var(--ink); }
        .button-light:hover { background: white; border-color: white; }
        .intro { display: grid; grid-template-columns: minmax(0, 1fr) minmax(280px, 1.25fr); gap: clamp(2rem, 7vw, 8rem); max-width: 1200px; margin: auto; padding: clamp(5rem, 10vw, 9rem) clamp(1.25rem, 5vw, 4rem); }
        .intro h2, .gallery-heading h2 { margin: 0; font-family: 'Playfair Display', serif; font-size: clamp(2.2rem, 4vw, 4rem); font-weight: 500; line-height: 1.05; }
        .intro p { margin: 0; color: #555a56; font-size: 1.05rem; line-height: 1.8; }
        .gallery-section { padding: 0 clamp(1.25rem, 5vw, 4rem) clamp(5rem, 10vw, 9rem); }
        .gallery-heading { display: flex; align-items: end; justify-content: space-between; max-width: 1200px; margin: 0 auto 2rem; gap: 2rem; }
        .gallery-heading p { max-width: 300px; margin: 0; color: #666b65; line-height: 1.6; text-align: right; }
        .gallery { display: grid; grid-template-columns: 1.1fr .9fr .9fr; grid-template-rows: 240px 240px; gap: .75rem; max-width: 1200px; margin: auto; }
        .gallery figure { position: relative; overflow: hidden; margin: 0; background: #d8d4cb; }
        .gallery figure:first-child { grid-row: span 2; }
        .gallery img { width: 100%; height: 100%; display: block; object-fit: cover; transition: transform .5s ease; }
        .gallery figure:hover img { transform: scale(1.04); }
        .gallery figcaption { position: absolute; right: 1rem; bottom: 1rem; left: 1rem; color: white; font-size: .72rem; font-weight: 600; letter-spacing: .1em; text-shadow: 0 1px 6px black; text-transform: uppercase; }
        .stories { background: var(--ink); color: white; padding: clamp(4rem, 8vw, 7rem) clamp(1.25rem, 5vw, 4rem); }
        .stories-inner { display: flex; align-items: end; justify-content: space-between; max-width: 1200px; margin: auto; gap: 2rem; }
        .stories h2 { margin: 0; font-family: 'Playfair Display', serif; font-size: clamp(2.4rem, 5vw, 4.8rem); font-weight: 500; }
        .stories-copy { max-width: 360px; color: var(--muted); line-height: 1.7; }
        .story-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)); max-width: 1200px; margin: 3rem auto 0; border-top: 1px solid var(--line); }
        .story-link { display: flex; align-items: center; justify-content: space-between; gap: 1rem; padding: 1.25rem 0; border-bottom: 1px solid var(--line); color: white; font-family: 'Playfair Display', serif; font-size: 1.35rem; text-decoration: none; }
        .story-link span { color: var(--accent); font-family: 'DM Sans', sans-serif; font-size: 1rem; }
        .site-footer { display: flex; justify-content: space-between; max-width: 1200px; margin: auto; padding: 2rem clamp(1.25rem, 5vw, 4rem); color: #676b65; font-size: .8rem; }
        @media (max-width: 700px) {
            .site-header { padding-top: 1rem; }
            .menu-toggle { display: inline-flex; align-items: center; gap: .5rem; }
            .menu-toggle::before { content: 'Menu'; font-family: 'DM Sans', sans-serif; font-size: .75rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; }
            .nav-list { position: absolute; top: 5rem; right: 1.25rem; left: 1.25rem; display: none; flex-direction: column; align-items: stretch; gap: 0; padding: .5rem 1rem; background: var(--ink); box-shadow: 0 12px 30px rgba(0, 0, 0, .3); }
            .nav-list.is-open { display: flex; }
            .nav-list li { border-bottom: 1px solid var(--line); }
            .nav-list li:last-child { border-bottom: 0; }
            .nav-link { display: block; padding: 1rem 0; }
            .nav-link::after { display: none; }
            .hero { min-height: 720px; padding-bottom: 4rem; }
            .intro, .stories-inner { grid-template-columns: 1fr; display: grid; }
            .gallery-heading { display: block; }
            .gallery-heading p { margin-top: 1rem; text-align: left; }
            .gallery { grid-template-columns: 1fr 1fr; grid-template-rows: 260px 180px 180px; }
            .gallery figure:first-child { grid-column: span 2; grid-row: auto; }
            .site-footer { display: block; }
            .site-footer span { display: block; margin-top: .5rem; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
</head>
<body>
    <script type="application/ld+json">@json([
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'Sytske Puister Fotografie',
        'url' => route('home'),
        'image' => asset('img/homepage/Photo1.JPG'),
        'description' => 'Persoonlijke fotocollecties en besloten online galerijen voor families en groepen.'
    ])</script>
    <a class="skip-link" href="#main-content">Skip to content</a>
    <header class="site-header">
        <div class="nav-bar">
            <a class="logo" href="{{ route('home') }}" aria-label="Sytske Puister Photography home">
                <img src="{{ asset('img/homepage/Logo_Sytske_wit.png') }}" alt="Sytske Puister Photography">
            </a>
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-navigation">
                <span class="material-symbols-rounded" aria-hidden="true">menu</span>
                <span class="sr-only">Open navigation</span>
            </button>
            <nav id="main-navigation" aria-label="Main navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link" href="{{ route('example.collection') }}">Example collection</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main-content">
        <section class="hero" style="--hero-image: url('{{ asset('img/homepage/Photo1.JPG') }}');" aria-labelledby="hero-title">
            <div class="hero-content">
                <p class="eyebrow">Besloten fotocollecties</p>
                <h1 id="hero-title">Jullie herinneringen, zorgvuldig bewaard.</h1>
                <p class="hero-copy">Persoonlijke fotocollecties voor genodigden en hun families, gedeeld via een privépagina met wachtwoord.</p>
                <div class="hero-actions">
                    <a class="button button-light" href="{{ route('example.collection') }}">Bekijk voorbeeldcollectie</a>
                    <a class="button" href="#selected-work">Bekijk sfeerbeelden</a>
                </div>
            </div>
        </section>

        <section class="intro" aria-labelledby="intro-title">
            <h2 id="intro-title">Een privéplek voor jullie foto’s.</h2>
            <p>Na jullie shoot ontvangen jullie een persoonlijke link naar de collectie. Daar bekijk je de foto’s in een rustige, zorgvuldig opgebouwde galerij die je kunt delen met de mensen die je zelf kiest.</p>
        </section>

        <section class="gallery-section" id="selected-work" aria-labelledby="gallery-title">
            <div class="gallery-heading">
                <h2 id="gallery-title">Een indruk van het werk</h2>
                <p>Een paar beelden om de sfeer en aandacht voor detail te ervaren.</p>
            </div>
            <div class="gallery">
                <figure><img src="{{ asset('img/homepage/Photo2.JPG') }}" alt="Selected photography work, frame one"><figcaption>Light / 01</figcaption></figure>
                <figure><img src="{{ asset('img/homepage/Photo3.JPG') }}" alt="Selected photography work, frame two"><figcaption>Stillness / 02</figcaption></figure>
                <figure><img src="{{ asset('img/homepage/Photo4.JPG') }}" alt="Selected photography work, frame three"><figcaption>Distance / 03</figcaption></figure>
                <figure><img src="{{ asset('img/homepage/Photo1.JPG') }}" alt="Selected photography work, frame four"><figcaption>Texture / 04</figcaption></figure>
            </div>
        </section>

        <section class="stories" aria-labelledby="stories-title">
            <div class="stories-inner">
                <h2 id="stories-title">Zie wat jullie ontvangen</h2>
                <p class="stories-copy">Bekijk de voorbeeldcollectie en ontdek hoe jullie eigen besloten galerij eruit kan zien.</p>
            </div>
            <div class="story-list">
                <a class="story-link" href="{{ route('example.collection') }}">Voorbeeldcollectie <span aria-hidden="true">&rarr;</span></a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <span>&copy; {{ now()->year }} Sytske Puister Photography</span>
        <span>Gemaakt om rustig te bekijken.</span>
    </footer>

    <script>
        const menuButton = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.nav-list');

        menuButton?.addEventListener('click', () => {
            const isOpen = navigation.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
            menuButton.querySelector('.material-symbols-rounded').textContent = isOpen ? 'close' : 'menu';
        });
    </script>
</body>
</html>
