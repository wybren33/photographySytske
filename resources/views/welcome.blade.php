<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        @font-face {
            font-family: 'Custom';
            src: url('fonts/VeganStyle.ttf') format('truetype');
        }
    </style>

    <title>Laravel</title>
</head>

<body style="background-color: #4a4a4a; margin: 0; padding: 0; font-family: 'Open Sans', sans-serif;">
    <header style="background-color: black; display:flex; flex-direction: row; justify-content: space-between;">
        <img style="margin: 0.5rem; margin-left: 4rem; width: 7%;" src="img/homepage/Logo_Sytske_wit.png" alt="">
        <nav style="padding: 2rem;">
            <ul style="display: flex; justify-content: space-around; list-style-type: none; margin: 0; padding: 0; font-size: 1rem;">
                <li style="margin: 0.5rem;"><a style="color: white; text-decoration: none;" href="{{ route('home') }}">Home</a></li>
                <li style="margin: 0.5rem;"><a style="color: white; text-decoration: none;" href="{{ route('home') }}">Bruiloft</a></li>
                <li style="margin: 0.5rem;"><a style="color: white; text-decoration: none;" href="{{ route('home') }}">
                        <span style="font-size: 1rem;" class="material-symbols-outlined">
                            search
                        </span>
                    </a></li>
            </ul>
        </nav>
    </header>

    <main style="display: flex; flex-direction: column; align-items: center;" class="mt-6">
        <h1 style="font-family: 'Custom', sans-serif; font-size: 3rem; color: white; font-weight: 100;">Sytske Puister Photography</h1>
        <div style="display: flex; flex-direction: row; width: 90%;">
            <img style="width: 50%; margin: 0.3rem; border-radius: 8px;" src="img/homepage/Photo1.JPG" alt="">
            <img style="width: 50%; margin: 0.3rem; border-radius: 8px;" src="img/homepage/Photo2.JPG" alt="">
        </div>
        <div style="display: flex; flex-direction: row; width: 90%;">
            <img style="width: 50%; margin: 0.3rem; border-radius: 8px;" src="img/homepage/Photo3.JPG" alt="">
            <img style="width: 50%; margin: 0.3rem; border-radius: 8px;" src="img/homepage/Photo4.JPG" alt="">

        </div>
    </main>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
    </footer>
</body>

</html>