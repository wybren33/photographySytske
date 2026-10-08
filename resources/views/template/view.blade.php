<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $page->title }} - Sytske Puister Fotografie.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{ asset('img/homepage/Logo_Sytske_wit.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,700,0,200">
    <title>{{ $page->title }} | Sytske Puister Fotografie</title>
    <style>
        :root { --ink: #101414; --paper: #f0ede7; --muted: #666b65; --accent: #c39d54; --line: #d8d4ca; }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: 'DM Sans', sans-serif; }
        a { color: inherit; }
        button { font: inherit; }
        .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0; }
        .skip-link { position: absolute; left: 1rem; top: -5rem; z-index: 30; background: var(--accent); padding: .75rem 1rem; font-weight: 700; }
        .skip-link:focus { top: 1rem; }
        .site-header { position: relative; z-index: 10; background: var(--ink); color: white; }
        .nav-bar { display: flex; align-items: center; justify-content: space-between; max-width: 1400px; margin: auto; padding: 1rem clamp(1.25rem, 5vw, 5rem); }
        .logo { display: block; width: clamp(5.5rem, 9vw, 8rem); }
        .logo img { display: block; width: 100%; height: auto; }
        .menu-toggle { display: none; border: 1px solid rgba(255,255,255,.25); background: transparent; color: white; padding: .55rem .7rem; cursor: pointer; }
        .menu-toggle:focus-visible, .nav-link:focus-visible, .gallery-button:focus-visible, .lightbox-close:focus-visible { outline: 2px solid var(--accent); outline-offset: 4px; }
        .nav-list { display: flex; align-items: center; gap: clamp(1rem, 3vw, 2.75rem); margin: 0; padding: 0; list-style: none; }
        .nav-link { position: relative; color: white; font-size: .78rem; font-weight: 700; letter-spacing: .1em; text-decoration: none; text-transform: uppercase; }
        .nav-link::after { position: absolute; right: 0; bottom: -.45rem; left: 0; height: 1px; background: var(--accent); content: ''; transform: scaleX(0); transition: transform .25s ease; }
        .nav-link:hover::after, .nav-link:focus-visible::after { transform: scaleX(1); }
        .page-intro { max-width: 1200px; margin: auto; padding: clamp(4.5rem, 10vw, 8rem) clamp(1.25rem, 5vw, 4rem) 3rem; }
        .eyebrow { margin: 0 0 1rem; color: #9b7737; font-size: .75rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; }
        .page-title { max-width: 850px; margin: 0; font-family: 'Playfair Display', serif; font-size: clamp(3rem, 8vw, 7rem); font-weight: 500; line-height: .95; letter-spacing: -.03em; }
        .page-description { max-width: 580px; margin: 1.5rem 0 0; color: var(--muted); font-size: 1.05rem; line-height: 1.8; }
        .gallery-wrap { max-width: 1400px; margin: auto; padding: 0 clamp(1.25rem, 5vw, 4rem) 6rem; }
        .gallery { column-count: 3; column-gap: clamp(.75rem, 2vw, 1.5rem); }
        .gallery-item { position: relative; break-inside: avoid; margin: 0 0 clamp(.75rem, 2vw, 1.5rem); }
        .gallery-button { display: block; width: 100%; padding: 0; border: 0; background: transparent; cursor: zoom-in; text-align: left; }
        .gallery-image { display: block; width: 100%; height: auto; background: #dad6ce; transition: filter .35s ease, transform .35s ease; }
        .gallery-button:hover .gallery-image { filter: brightness(.82); transform: scale(1.015); }
        .gallery-caption { position: absolute; right: 1rem; bottom: 1rem; left: 1rem; color: white; font-size: .72rem; font-weight: 700; letter-spacing: .12em; opacity: 0; text-shadow: 0 1px 8px rgba(0,0,0,.8); text-transform: uppercase; transition: opacity .3s ease; pointer-events: none; }
        .gallery-button:hover + .gallery-caption, .gallery-button:focus-visible + .gallery-caption { opacity: 1; }
        .empty-gallery { border: 1px dashed #bcb7ac; padding: 4rem 1.5rem; color: var(--muted); text-align: center; }
        .site-footer { display: flex; justify-content: space-between; max-width: 1200px; margin: auto; padding: 2rem clamp(1.25rem, 5vw, 4rem); border-top: 1px solid var(--line); color: var(--muted); font-size: .8rem; }
        .lightbox { position: fixed; z-index: 50; inset: 0; display: none; align-items: center; justify-content: center; padding: 4rem 1.25rem 2rem; background: rgba(10, 13, 13, .94); }
        .lightbox.is-open { display: flex; }
        .lightbox-image { max-width: min(1200px, 95vw); max-height: 85vh; object-fit: contain; }
        .lightbox-close { position: absolute; top: 1.25rem; right: 1.25rem; border: 1px solid rgba(255,255,255,.35); background: transparent; color: white; padding: .5rem .75rem; cursor: pointer; }
        .lightbox-caption { position: absolute; bottom: 1rem; color: #ddd; font-size: .8rem; }
        @media (max-width: 800px) { .gallery { column-count: 2; } }
        @media (max-width: 600px) {
            .menu-toggle { display: inline-flex; align-items: center; }
            .nav-list { position: absolute; top: 100%; right: 1rem; left: 1rem; display: none; flex-direction: column; align-items: stretch; gap: 0; padding: .5rem 1rem; background: var(--ink); box-shadow: 0 12px 30px rgba(0,0,0,.3); }
            .nav-list.is-open { display: flex; }
            .nav-list li { border-bottom: 1px solid rgba(255,255,255,.18); }
            .nav-list li:last-child { border: 0; }
            .nav-link { display: block; padding: 1rem 0; }
            .nav-link::after { display: none; }
            .gallery { column-count: 1; }
            .page-intro { padding-top: 4rem; }
            .site-footer { display: block; }
            .site-footer span { display: block; margin-top: .5rem; }
        }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; } }
    </style>
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to gallery</a>
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
                    <li><a class="nav-link" href="{{ route('example.collection') }}">Voorbeeldcollectie</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main-content">
        <section class="page-intro" aria-labelledby="page-title">
            <p class="eyebrow">Privécollectie</p>
            <h1 id="page-title" class="page-title">{{ $page->title }}</h1>
            @if($page->content)
                <p class="page-description">{{ $page->content }}</p>
            @endif
        </section>

        <section class="gallery-wrap" aria-label="{{ $page->title }} photo gallery">
            @if($page->products->isNotEmpty())
                <div class="gallery">
                    @foreach ($page->products as $image)
                        <figure class="gallery-item">
                            <button class="gallery-button" type="button" data-lightbox-image="{{ asset($image->image) }}" data-lightbox-caption="{{ $image->name }}" aria-label="View {{ $image->name }} fullscreen">
                                <img class="gallery-image" src="{{ route('media.show', $image) }}" alt="{{ $image->name }}" loading="lazy">
                            </button>
                            <figcaption class="gallery-caption">{{ $image->name }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            @else
                <div class="empty-gallery">Deze collectie bevat nog geen foto’s.</div>
            @endif
        </section>
    </main>

    <footer class="site-footer">
        <span>&copy; {{ now()->year }} Sytske Puister Photography</span>
        <span>{{ $page->title }}</span>
    </footer>

    <div class="lightbox" role="dialog" aria-modal="true" aria-labelledby="lightbox-caption">
        <button class="lightbox-close" type="button" aria-label="Close image viewer">Close</button>
        <img class="lightbox-image" src="" alt="">
        <p id="lightbox-caption" class="lightbox-caption"></p>
    </div>

    <script>
        const menuButton = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.nav-list');
        const lightbox = document.querySelector('.lightbox');
        const lightboxImage = document.querySelector('.lightbox-image');
        const lightboxCaption = document.querySelector('.lightbox-caption');
        const closeLightbox = document.querySelector('.lightbox-close');
        let lastFocusedElement;

        menuButton?.addEventListener('click', () => {
            const isOpen = navigation.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
            menuButton.querySelector('.material-symbols-rounded').textContent = isOpen ? 'close' : 'menu';
        });

        document.querySelectorAll('[data-lightbox-image]').forEach((button) => {
            button.addEventListener('click', () => {
                lastFocusedElement = document.activeElement;
                lightboxImage.src = button.dataset.lightboxImage;
                lightboxImage.alt = button.dataset.lightboxCaption;
                lightboxCaption.textContent = button.dataset.lightboxCaption;
                lightbox.classList.add('is-open');
                closeLightbox.focus();
            });
        });

        function hideLightbox() {
            lightbox.classList.remove('is-open');
            lightboxImage.src = '';
            lastFocusedElement?.focus();
        }

        closeLightbox.addEventListener('click', hideLightbox);
        lightbox.addEventListener('click', (event) => {
            if (event.target === lightbox) hideLightbox();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && lightbox.classList.contains('is-open')) hideLightbox();
        });
    </script>
</body>
</html>
