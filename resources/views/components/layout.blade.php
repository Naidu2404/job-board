<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Job Board</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 text-slate-700">
        {{ auth()->user()->name ?? 'Guest'}}
        {{-- we use slots to put data into the layout {{ $slot }} --}}
        {{ $slot }}
    </body>
</html>