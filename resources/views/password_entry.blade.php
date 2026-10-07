<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toegang tot privécollectie</title>
    <link rel="icon" type="image/png" href="{{ asset('img/homepage/Logo_Sytske_wit.png') }}">
    <style>
        body {
            background-color: #f0ede7;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: min(100% - 2rem, 30rem);
            background-color: #101414;
            color: #fff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 18px 45px rgba(16, 20, 20, 0.2);
        }

        h1 {
            margin-top: 0;
            font-size: 1.7rem;
        }

        p {
            color: #c8c8c0;
            line-height: 1.6;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #666b65;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            background-color: #c39d54;
            color: #101414;
            color: #fff;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e0c27f;
        }

        input:focus, button:focus { outline: 3px solid #e0c27f; outline-offset: 2px; }

        .error { color: #ffb4ab; }
    </style>
</head>

<body>

    <form method="POST" action="{{ route('template.verify', ['pageId' => $page->id]) }}">
        @csrf
        <h1>Toegang tot je privécollectie</h1>
        <p>Voer het wachtwoord in dat je hebt ontvangen om de foto’s te bekijken.</p>
        @error('password')<p class="error" role="alert">{{ $message }}</p>@enderror
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Collectie openen</button>
    </form>

</body>

</html>
