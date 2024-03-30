<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="container mt-5">
            <h2>Link Shortener</h2>

            <form method="POST" action="#">
                @csrf

                <div class="form-group">
                    <label for="original_url">Original URL:</label>
                    <input type="text" class="form-control" id="original_url" name="original_url" required>
                </div>
                <div class="form-group mt-3">
                    <label for="max_count">Max Count:</label>
                    <input type="number" class="form-control" id="max_count" name="max_count" required>
                </div>
                <div class="form-group mt-3">
                    <label for="expiration_time">Expiration Time:</label>
                    <input type="number" class="form-control" id="expiration_time" name="expiration_time" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Shorten</button>
            </form>
        </div>
    </body>
</html>
