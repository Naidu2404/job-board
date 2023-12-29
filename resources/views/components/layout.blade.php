<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Job Board</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        {{-- we use slots to put data into the layout {{ $slot }} --}}
        {{ $slot }}
    </body>
</html>